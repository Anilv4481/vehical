<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\CareRequest;

use App\Models\CareRequestModel;

use App\Services\CareRequestService;

use App\Services\CustomerService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RquestForCareController extends Controller
{
    protected $mls, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $promoService, $utilityService, $customerService;

    public function __construct()
    {

        $this->uploads_image_directory = 'files/carerequest';

        //route

        $this->index_route_name = 'admin.carerequests.index';
        $this->create_route_name = 'admin.carerequests.create';
        $this->detail_route_name = 'admin.carerequests.show';
        $this->edit_route_name = 'admin.carerequests.edit';

        //view files

        $this->index_view = 'admin.carefolder.index';
        $this->create_view = 'admin.carefolder.create';
        $this->edit_view = 'admin.carefolder.edit';

        //service files

        $this->careservice = new CareRequestService();

        $this->customerService = new CustomerService();

        $this->utilityService = new UtilityService();

        $this->mls = new ManagerLanguageService('messages');

    }


    public function index(Request $request)
    {
        $items = $this->careservice->datatable();

        if($request->ajax())
        {
            return view('admin.carefolder.carerequest_table',['careservice'=>$items]);
        } else {
            return view('admin.carefolder.index',['careservice'=>$items]);
        }

    }


    public function create()
    {
        return view($this->create_view);
    }

    public function store(Request $request)
    {
        $input = $request->except(['_token', 'proengsoft_jsvalidation']);
        $battle = $this->careservice->create($input);
        return redirect()->route($this->index_route_name)->with('success',
        $this->mls->messageLanguage('created', 'Request register', 1));
    }


    public function show(CareRequestModel $carerequest)
    {
        return view($this->detail_view,compact('carerequest'));
    }


    public function edit(CareRequestModel $carerequest)
    {

        return view($this->edit_view,compact('carerequest'));
    }


    public function update(Request $request,CareRequestModel $carerequest)
    {
        $input = $request->except(['_method', '_token', 'proengsoft_jsvalidation']);
        $this->careservice->update($input,$carerequest);
        return redirect()->route($this->index_route_name)->with('success',
        $this->mls->messageLanguage('updated', 'Request registertion update', 1));
    }

    public function destroy($id)
    {

        $result=DB::table('carerequest')->where('care_request_id', $id)->delete();

        return redirect()->back()->withSuccess('Data Delete Successfully!');

        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('Request delete'),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('Request delete'),
                'status_name' => 'error'
            ]);
        }

    }

}
