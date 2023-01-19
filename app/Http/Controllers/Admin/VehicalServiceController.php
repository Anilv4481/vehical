<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\VehicalServiceRequest;

use App\Models\VehicalService;

use App\Services\vehicalservices;

use App\Services\CustomerService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicalServiceController extends Controller
{
    protected $mls, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $promoService, $utilityService, $customerService;

    public function __construct()
    {
    
        $this->uploads_image_directory = 'files/vehicalservices';

        //route
        
        $this->index_route_name = 'admin.vehicalservices.index';
        $this->create_route_name = 'admin.vehicalservices.create';
        $this->detail_route_name = 'admin.vehicalservices.show';
        $this->edit_route_name = 'admin.vehicalservices.edit';

        //view files

        $this->index_view = 'admin.vehicalservice.index';
        $this->create_view = 'admin.vehicalservice.create';
        $this->edit_view = 'admin.vehicalservice.edit';
       
        //service files 

        $this->vehicalser = new vehicalservices();

        $this->customerService = new CustomerService();
        
        $this->utilityService = new UtilityService();

        $this->mls = new ManagerLanguageService('messages'); 
        
    }

    
    public function index(Request $request)
    {
        $items = $this->vehicalser->datatable();
        
        if($request->ajax()) 
        {
            return view('admin.vehicalservice.vehicalservice_table',['vehicalservice'=>$items]);
        } else {
            return view('admin.vehicalservice.index',['vehicalservice'=>$items]);
        }

    }

    
    public function create()
    {
        return view($this->create_view);
    }

    public function store(VehicalServiceRequest $request)
    {
        $input = $request->except(['_token', 'proengsoft_jsvalidation']); 
        $image=$request->file('vehical_image');
        $filename = time().$image->getClientOriginalName();
        $destinationPath = public_path('/vehical/image/');
        $image->move($destinationPath, $filename);
        $input['vehical_image']=$filename;
        $battle = $this->vehicalser->create($input);
        return redirect()->route($this->index_route_name)->with('success', 
        $this->mls->messageLanguage('created', 'vehical add', 1)); 
    }

   
    public function show(VehicalService $vehicalservice)
    {
        return view($this->detail_view,compact('vehicalservice'));
    }

   
    public function edit(VehicalService $vehicalservice)
    {   
        return view($this->edit_view,compact('vehicalservice'));
    }


    public function update(VehicalServiceRequest $request,VehicalService $vehicalservice)
    {
        $input = $request->except(['_method', '_token', 'proengsoft_jsvalidation']);

        $image=$request->file('vehical_image');
        $filename = time().$image->getClientOriginalName();
        $destinationPath = public_path('/vehical/image/');
        $image->move($destinationPath, $filename);
        $input['vehical_image']=$filename;

        $this->vehicalser->update($input,$vehicalservice);
        return redirect()->route($this->index_route_name)->with('success', 
        $this->mls->messageLanguage('updated', 'vehical update', 1));
    }

    public function destroy($id)
    {
     
        $result=DB::table('vehicalservices')->where('vehicalservice_id', $id)->delete();
     
        return redirect()->back()->withSuccess('Data Delete Successfully!');

        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('vehical service delete'),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('vehical service delete'),
                'status_name' => 'error'
            ]);
        }

    }

}