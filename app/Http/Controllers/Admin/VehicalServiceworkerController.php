<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\VehicalworkerRequest;

use App\Models\VehicalWorker;

use App\Services\vehicalworkerservice;

use App\Services\CustomerService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicalServiceworkerController extends Controller
{
    protected $mls, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $promoService, $utilityService, $customerService;

    public function __construct()
    {
    
        $this->uploads_image_directory = 'files/serviceworkers';

        //route
        
        $this->index_route_name = 'admin.serviceworkers.index';
        $this->create_route_name = 'admin.serviceworkers.create';
        $this->detail_route_name = 'admin.serviceworkers.show';
        $this->edit_route_name = 'admin.serviceworkers.edit';

        //view files

        $this->index_view = 'admin.vehicalserviceworker.index';
        $this->create_view = 'admin.vehicalserviceworker.create';
        $this->edit_view = 'admin.vehicalserviceworker.edit';
       
        //service files 

        $this->vehicalworker = new vehicalworkerservice();

        $this->customerService = new CustomerService();
        
        $this->utilityService = new UtilityService();
        
        $this->mls = new ManagerLanguageService('messages'); 
        
    }

    
    public function index(Request $request)
    {
        $items = $this->vehicalworker->datatable();
        
        if($request->ajax()) 
        {
            return view('admin.vehicalserviceworker.vehicalworker_table',['serviceworker'=>$items]);
        } else {
            return view('admin.vehicalserviceworker.index',['serviceworker'=>$items]);
        }

    }

    
    public function create()
    {
        return view($this->create_view);
    }

    public function store(Request $request)
    {
        $input = $request->except(['_token', 'proengsoft_jsvalidation']); 

        $image=$request->file('service_worker_profile');
        
        $filename = time().$image->getClientOriginalName();
        
        $destinationPath = public_path('/worker/image/');
        
        $image->move($destinationPath, $filename);
        
        $input['service_worker_profile']=$filename;
        
        $battle = $this->vehicalworker->create($input);
        
        return redirect()->route($this->index_route_name)->with('success', 
        
        $this->mls->messageLanguage('created', 'service worker add ', 1)); 
    }

   
    public function show(VehicalWorker $serviceworker)
    {
        return view($this->detail_view,compact('serviceworker'));
    }

   
    public function edit(VehicalWorker $serviceworker)
    {   
        return view($this->edit_view,compact('serviceworker'));
    }


    public function update(VehicalworkerRequest $request,VehicalWorker $serviceworker)
    {
        $input = $request->except(['_method', '_token', 'proengsoft_jsvalidation']);

        if(!empty($request->file('service_worker_profile')))
        {
            $image=$request->file('service_worker_profile');
        
            $filename = time().$image->getClientOriginalName();
            
            $destinationPath = public_path('/worker/image/');
            
            $image->move($destinationPath, $filename);
            
            $input['service_worker_profile']=$filename;
    
            $this->vehicalworker->update($input,$serviceworker);
    
            return redirect()->route($this->index_route_name)->with('success', 
            
            $this->mls->messageLanguage('updated', 'vehical update', 1));
        }
        else
        {
            $this->vehicalworker->update($input,$serviceworker);
    
            return redirect()->route($this->index_route_name)->with('success', 
            
            $this->mls->messageLanguage('updated', 'vehical update', 1));
        }

      
    }

    public function destroy($id)
    {
     
        $result=DB::table('serviceworkers')->where('service_worker_id', $id)->delete();
     
        return redirect()->back()->withSuccess('Data Delete Successfully!');

        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('service worker delete'),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('service worker delete'),
                'status_name' => 'error'
            ]);
        }

    }

}