<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PackageRequest;
use App\Models\Package;
use App\Services\PackageService;
use App\Services\CustomerService;
use App\Services\ManagerLanguageService;
use App\Services\UserService;
use App\Services\UtilityService;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    protected $mls, $change_password, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $packageService, $utilityService, $customerService;

    public function __construct()
    {
      
        $this->uploads_image_directory = 'files/packages';
        //route
        $this->index_route_name = 'admin.packages.index';
        $this->create_route_name = 'admin.packages.create';
        $this->detail_route_name = 'admin.packages.show';
        $this->edit_route_name = 'admin.packages.edit';

        //view files
        $this->index_view = 'admin.package.index';
        $this->create_view = 'admin.package.create';
        $this->detail_view = 'admin.package.details';
        $this->tabe_view = 'admin.package.profile';
        $this->edit_view = 'admin.package.edit';
        $this->product_history_view = 'admin.package.product_history';
        $this->change_password = 'admin.admin_profile.change_password';

        //service files
        $this->packageService = new PackageService();
        $this->customerService = new CustomerService();
        $this->utilityService = new UtilityService();

        //mls is used for manage language content based on keys in messages.php
        $this->mls = new ManagerLanguageService('messages');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        if ($request->ajax()) {
            
            $items = $this->packageService->datatable();
            // $items = $this->packageService->search($request, $items);
            return datatables()->eloquent($items)->toJson();
        } else {
            return view($this->index_view);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->create_view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PackageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackageRequest $request)
    {
        $input = $request->except(['_token', 'proengsoft_jsvalidation']);
        
        $package = $this->packageService->create($input);
        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('created', 'package', 1));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $battle
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        return view($this->detail_view, compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $battle
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        

        return view($this->edit_view, compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $battle
     * @return \Illuminate\Http\Response
     */
    public function update(PackageRequest $request, Package $package)
    {
        $input = $request->except(['_method', '_token', 'proengsoft_jsvalidation']);
        $this->packageService->update($input, $package);
        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('updated', 'package', 1));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $battle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        $result = $package->delete();
        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('package'),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('package'),
                'status_name' => 'error'
            ]);
        }
    }

    public function status($id, $status)
    {
        
        $status = ($status == 1) ? 0 : 1;
        $result =  $this->packageService->updateById(['is_active' => $status], $id);
        if ($result) {
            return response()->json([
                'status' => 1,
                'message' => $this->mls->messageLanguage('updated', 'status', 1),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => $this->mls->messageLanguage('not_updated', 'status', 1),
                'status_name' => 'error'
            ]);
        }
    }
}
