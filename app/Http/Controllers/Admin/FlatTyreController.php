<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\FlatTyreRequest;

use App\Models\FlatTyreModel;

use App\Services\FlatTyreService;

use App\Services\CustomerService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlatTyreController extends Controller
{
    protected $mls, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $promoService, $utilityService, $customerService;

    public function __construct()
    {

        $this->uploads_image_directory = 'files/flattyres';

        //route

        $this->index_route_name = 'admin.flattyres.index';
        $this->create_route_name = 'admin.flattyres.create';
        $this->detail_route_name = 'admin.flattyres.show';
        $this->edit_route_name = 'admin.flattyres.edit';

        //view files

        $this->index_view = 'admin.flattyrefolder.index';
        $this->create_view = 'admin.flattyrefolder.create';
        $this->edit_view = 'admin.flattyrefolder.edit';

        //service files

        $this->tyreservices = new FlatTyreService();

        $this->customerService = new CustomerService();

        $this->utilityService = new UtilityService();

        $this->mls = new ManagerLanguageService('messages');

    }


    public function index(Request $request)
    {
        $items = $this->tyreservices->datatable();

        if($request->ajax())
        {
            return view('admin.flattyrefolder.flatbattery_table',['flattyre'=>$items]);
        } else {
            return view('admin.flattyrefolder.index',['flattyre'=>$items]);
        }

    }


    public function create()
    {
        return view($this->create_view);
    }

    public function store(Request $request)
    {

        $input = $request->except(['_token', 'proengsoft_jsvalidation']);

        $image=$request->file('tyre_photo');
        $filename = time().$image->getClientOriginalName();
        $destinationPath = public_path('/vehical/image/');
        $image->move($destinationPath, $filename);
        $input['tyre_photo']=$filename;

        $battle = $this->tyreservices->create($input);


        return redirect()->route($this->index_route_name)->with('success',
        $this->mls->messageLanguage('created', 'Battery Details register', 1));
    }


    public function show(FlatTyreModel $flattyre)
    {
        return view($this->detail_view,compact('flattyre'));
    }


    public function edit(FlatTyreModel $flattyre)
    {

        return view($this->edit_view,compact('flattyre'));
    }


    public function update(Request $request,FlatTyreModel $flattyre)
    {
        $input = $request->except(['_method', '_token', 'proengsoft_jsvalidation']);

        $image=$request->file('tyre_photo');
        $filename = time().$image->getClientOriginalName();
        $destinationPath = public_path('/vehical/image/');
        $image->move($destinationPath, $filename);
        $input['tyre_photo']=$filename;

        $this->tyreservices->update($input,$flattyre);
        return redirect()->route($this->index_route_name)->with('success',
        $this->mls->messageLanguage('updated', 'Battery Details update', 1));
    }

    public function destroy($id)
    {

        $result=DB::table('flattyre')->where('flat_tyre_id', $id)->delete();

        return redirect()->back()->withSuccess('Flat Tyre Infomation Delete Successfully!');

        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('Tyre Infomation delete'),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('Tyre Infomation delete'),
                'status_name' => 'error'
            ]);
        }

    }

}
