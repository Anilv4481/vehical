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

class CustomerRegistrationController extends Controller
{
    protected $mls, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $promoService, $utilityService, $customerService;

    public function __construct()
    {

        $this->uploads_image_directory = 'files/customerregistration';

        //route

        $this->index_route_name = 'admin.customerregistration.index';
        $this->create_route_name = 'admin.customerregistration.create';
        $this->detail_route_name = 'admin.customerregistration.show';
        $this->edit_route_name = 'admin.customerregistration.edit';

        //view files

        $this->index_view = 'admin.customerreg.index';
        $this->create_view = 'admin.customerreg.create';
        $this->edit_view = 'admin.customerreg.edit';

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
            return view('admin.customerreg.customerreg_table',['vehicalshop'=>$items]);
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
