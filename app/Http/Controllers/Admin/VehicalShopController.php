<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\VehicalShopRequest;

use App\Models\VehicalShop;

use App\Services\vehicalshopservice;

use App\Services\CustomerService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicalShopController extends Controller
{
    protected $mls, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $promoService, $utilityService, $customerService;

    public function __construct()
    {
    
        $this->uploads_image_directory = 'files/vehicalshops';

        //route
        
        $this->index_route_name = 'admin.vehicalshops.index';
        $this->create_route_name = 'admin.vehicalshops.create';
        $this->detail_route_name = 'admin.vehicalshops.show';
        $this->edit_route_name = 'admin.vehicalshops.edit';

        //view files

        $this->index_view = 'admin.vehicalshop.index';
        $this->create_view = 'admin.vehicalshop.create';
        $this->edit_view = 'admin.vehicalshop.edit';
       
        //service files 

        $this->vehicalshop = new vehicalshopservice();
        $this->customerService = new CustomerService();
        $this->utilityService = new UtilityService();
        $this->mls = new ManagerLanguageService('messages'); 
        
    }

    
    public function index(Request $request)
    {
        $items = $this->vehicalshop->datatable();
        
        if($request->ajax()) 
        {
            return view('admin.vehicalshop.vehicalshop_table',['vehicalshop'=>$items]);
        } else {
            return view('admin.vehicalshop.index',['vehicalshop'=>$items]);
        }

    }

    
    public function create()
    {
        return view($this->create_view);
    }

    public function store(VehicalShopRequest $request)
    {
        $input = $request->except(['_token', 'proengsoft_jsvalidation']); 

        $image=$request->file('vehical_shop_profile');
        
        $filename = time().$image->getClientOriginalName();
        
        $destinationPath = public_path('/vehical/image/');
        
        $image->move($destinationPath, $filename);
        
        $input['vehical_shop_profile']=$filename;
        
        $battle = $this->vehicalshop->create($input);
        
        return redirect()->route($this->index_route_name)->with('success', 
        
        $this->mls->messageLanguage('created', 'vehical add', 1)); 
    }

   
    public function show(VehicalShop $vehicalshop)
    {
        return view($this->detail_view,compact('vehicalshop'));
    }

   
    public function edit(VehicalShop $vehicalshop)
    {   
        return view($this->edit_view,compact('vehicalshop'));
    }


    public function update(VehicalShopRequest $request,VehicalShop $vehicalshop)
    {
        $input = $request->except(['_method', '_token', 'proengsoft_jsvalidation']);

        $image=$request->file('vehical_shop_profile');
        
        $filename = time().$image->getClientOriginalName();
        
        $destinationPath = public_path('/vehical/image/');
        
        $image->move($destinationPath, $filename);
        
        $input['vehical_shop_profile']=$filename;

        $this->vehicalshop->update($input,$vehicalshop);

        return redirect()->route($this->index_route_name)->with('success', 
        
        $this->mls->messageLanguage('updated', 'vehical update', 1));
    }

    public function destroy($id)
    {
     
        $result=DB::table('vehicalhshops')->where('vehical_shop_id', $id)->delete();
     
        return redirect()->back()->withSuccess('Data Delete Successfully!');

        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('vehical shop delete'),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('vehical shop delete'),
                'status_name' => 'error'
            ]);
        }

    }

}