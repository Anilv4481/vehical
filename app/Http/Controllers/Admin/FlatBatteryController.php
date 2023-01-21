<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\FlatBatteryRequest;

use App\Models\FlatTyreModel;

use App\Services\FlatBatteryService;

use App\Services\CustomerService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlatBatteryController extends Controller
{
    protected $mls, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $promoService, $utilityService, $customerService;

    public function __construct()
    {

        $this->uploads_image_directory = 'files/flatbatterys';

        //route

        $this->index_route_name = 'admin.flatbatterys.index';
        $this->create_route_name = 'admin.flatbatterys.create';
        $this->detail_route_name = 'admin.flatbatterys.show';
        $this->edit_route_name = 'admin.flatbatterys.edit';

        //view files

        $this->index_view = 'admin.flatbatteryfolder.index';
        $this->create_view = 'admin.flatbatteryfolder.create';
        $this->edit_view = 'admin.flatbatteryfolder.edit';

        //service files

        $this->batteryservices = new FlatBatteryService();

        $this->customerService = new CustomerService();

        $this->utilityService = new UtilityService();

        $this->mls = new ManagerLanguageService('messages');

    }


    public function index(Request $request)
    {
        $items = $this->batteryservices->datatable();

        if($request->ajax())
        {
            return view('admin.flatbatteryfolder.flatbattery_table',['flatbattery'=>$items]);
        } else {
            return view('admin.flatbatteryfolder.index',['flatbattery'=>$items]);
        }

    }


    public function create()
    {
        return view($this->create_view);
    }

    public function store(Request $request)
    {

        $input = $request->except(['_token', 'proengsoft_jsvalidation']);

        $image=$request->file('vehical_pic');
        $filename = time().$image->getClientOriginalName();
        $destinationPath = public_path('/vehical/image/');
        $image->move($destinationPath, $filename);
        $input['vehical_pic']=$filename;

        $image1=$request->file('battery_pic');
        $filename1 = time().$image1->getClientOriginalName();
        $destinationPath1 = public_path('/vehical/image/');
        $image1->move($destinationPath1, $filename1);
        $input['battery_pic']=$filename1;

        $battle = $this->batteryservices->create($input);


        return redirect()->route($this->index_route_name)->with('success',
        $this->mls->messageLanguage('created', 'Battery Details register', 1));
    }


    public function show(FlatBatteryModel $flatbattery)
    {
        return view($this->detail_view,compact('flatbattery'));
    }


    public function edit(FlatBatteryModel $flatbattery)
    {

        return view($this->edit_view,compact('flatbattery'));
    }


    public function update(Request $request,FlatBatteryModel $flatbattery)
    {
        $input = $request->except(['_method', '_token', 'proengsoft_jsvalidation']);

        $image=$request->file('vehical_pic');
        $filename = time().$image->getClientOriginalName();
        $destinationPath = public_path('/vehical/image/');
        $image->move($destinationPath, $filename);
        $input['vehical_pic']=$filename;

        $image1=$request->file('battery_pic');
        $filename1 = time().$image1->getClientOriginalName();
        $destinationPath1 = public_path('/vehical/image/');
        $image1->move($destinationPath1, $filename1);
        $input['battery_pic']=$filename1;

        $this->batteryservices->update($input,$flatbattery);
        return redirect()->route($this->index_route_name)->with('success',
        $this->mls->messageLanguage('updated', 'Battery Details update', 1));
    }

    public function destroy($id)
    {

        $result=DB::table('flatbattery')->where('flat_battery_id', $id)->delete();

        return redirect()->back()->withSuccess('Battery Infomation Delete Successfully!');

        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('Battery Infomation delete'),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('Battery Infomation delete'),
                'status_name' => 'error'
            ]);
        }

    }

}
