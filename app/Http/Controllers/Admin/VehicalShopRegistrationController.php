<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\ShopRegistrationrequest;

use App\Models\VehicalShopRegistration;

use App\Services\vehicalShoRegister;

use App\Services\CustomerService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicalShopRegistrationController extends Controller
{
    protected $mls, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $promoService, $utilityService, $customerService;

    public function __construct()
    {

        $this->uploads_image_directory = 'files/shopregistrations';

        //route

        $this->index_route_name = 'admin.shopregistrations.index';
        $this->create_route_name = 'admin.shopregistrations.create';
        $this->detail_route_name = 'admin.shopregistrations.show';
        $this->edit_route_name = 'admin.shopregistrations.edit';

        //view files

        $this->index_view = 'admin.shopregistration.index';
        $this->create_view = 'admin.shopregistration.create';
        $this->edit_view = 'admin.shopregistration.edit';

        //service files

        $this->vehicalshop = new vehicalShoRegister();

        $this->customerService = new CustomerService();

        $this->utilityService = new UtilityService();

        $this->mls = new ManagerLanguageService('messages');

    }


    public function index(Request $request)
    {
        $items = $this->vehicalshop->datatable();

        if($request->ajax())
        {
            return view('admin.shopregistration.shopregistrations_table',['vehicalshop'=>$items]);
        } else {
            return view('admin.shopregistration.index',['vehicalshop'=>$items]);
        }

    }


    public function create()
    {
        return view($this->create_view);
    }

    public function store(Request $request)
    {

        $input = $request->except(['_token', 'proengsoft_jsvalidation']);


        $image=$request->file('company_work_place_photo');
        $filename = time().$image->getClientOriginalName();
        $destinationPath = public_path('/vehical/image/');
        $image->move($destinationPath, $filename);
        $input['company_work_place_photo']=$filename;

        $image1=$request->file('company_profile_image');
        $filename1 = time().$image1->getClientOriginalName();
        $destinationPath1 = public_path('/vehical/image/');
        $image1->move($destinationPath1, $filename1);
        $input['company_profile_image']=$filename1;

        $battle = $this->vehicalshop->create($input);


        return redirect()->route($this->index_route_name)->with('success',
        $this->mls->messageLanguage('created', 'vehical shop register', 1));
    }


    public function show(VehicalShopRegistration $shopregistration)
    {
        return view($this->detail_view,compact('shopregistration'));
    }


    public function edit(VehicalShopRegistration $shopregistration)
    {

        return view($this->edit_view,compact('shopregistration'));
    }


    public function update(Request $request,VehicalShopRegistration $shopregistration)
    {
        $input = $request->except(['_method', '_token', 'proengsoft_jsvalidation']);

        $image=$request->file('company_work_place_photo');
        $filename = time().$image->getClientOriginalName();
        $destinationPath = public_path('/vehical/image/');
        $image->move($destinationPath, $filename);
        $input['company_work_place_photo']=$filename;

        $image=$request->file('company_profile_image');
        $filename1 = time().$image->getClientOriginalName();
        $destinationPath1 = public_path('/vehical/image/');
        $image->move($destinationPath1, $filename1);
        $input['company_profile_image']=$filename1;

        $this->vehicalshop->update($input,$shopregistration);
        return redirect()->route($this->index_route_name)->with('success',
        $this->mls->messageLanguage('updated', 'vehical Shop registertion update', 1));
    }

    public function destroy($id)
    {

        $result=DB::table('shopregistrations')->where('shop_registration_id', $id)->delete();

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
