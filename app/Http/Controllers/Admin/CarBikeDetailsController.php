<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\CarBikeDetailsRequest;

use App\Models\CarBikeDetailsModel;

use App\Services\CarBikeDetailsService;

use App\Services\CustomerService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarBikeDetailsController extends Controller
{
    protected $mls, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $promoService, $utilityService, $customerService;

    public function __construct()
    {

        $this->uploads_image_directory = 'files/carbikedetails';

        //route

        $this->index_route_name = 'admin.carbikedetails.index';
        $this->create_route_name = 'admin.carbikedetails.create';
        $this->detail_route_name = 'admin.carbikedetails.show';
        $this->edit_route_name = 'admin.carbikedetails.edit';

        //view files

        $this->index_view = 'admin.carbikefolder.index';
        $this->create_view = 'admin.carbikefolder.create';
        $this->edit_view = 'admin.carbikefolder.edit';

        //service files

        $this->carbike = new CarBikeDetailsService();

        $this->customerService = new CustomerService();

        $this->utilityService = new UtilityService();

        $this->mls = new ManagerLanguageService('messages');

    }


    public function index(Request $request)
    {
        $items = $this->carbike->datatable();

        if($request->ajax())
        {
            return view('admin.carbikefolder.carbikedetails',['carbike'=>$items]);
        } else {
            return view('admin.carbikefolder.index',['carbike'=>$items]);
        }

    }


    public function create()
    {
        return view($this->create_view);
    }

    public function store(Request $request)
    {

        $input = $request->except(['_token', 'proengsoft_jsvalidation']);




        $battle = $this->carbike->create($input);


        return redirect()->route($this->index_route_name)->with('success',
        $this->mls->messageLanguage('created', 'vehical shop register', 1));
    }


    public function show(CarBikeDetailsModel $carbikedetail)
    {
        return view($this->detail_view,compact('carbikedetail'));
    }


    public function edit(CarBikeDetailsModel $carbikedetail)
    {

        return view($this->edit_view,compact('carbikedetail'));
    }


    public function update(Request $request,CarBikeDetailsModel $carbikedetail)
    {
        $input = $request->except(['_method', '_token', 'proengsoft_jsvalidation']);



        $this->carbike->update($input,$carbikedetail);
        return redirect()->route($this->index_route_name)->with('success',
        $this->mls->messageLanguage('updated', 'vehical Shop registertion update', 1));
    }

    public function destroy($id)
    {

        $result=DB::table('carbikedetails')->where('car_bike_details_id', $id)->delete();

        return redirect()->back()->withSuccess('Data Delete Successfully!');

        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('vehical shop registration service delete'),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('vehical shop registration service delete'),
                'status_name' => 'error'
            ]);
        }

    }

}
