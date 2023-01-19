<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ConsultantRequest;
use App\Models\ConsultantReg;
use App\Models\User;
use App\Services\ConsultantService;

use App\Services\ManagerLanguageService;
use App\Services\UserService;
use App\Services\UtilityService;
use Illuminate\Http\Request;

class ConsultantController extends Controller
{
    protected $mls, $change_password, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $consultantService, $utilityService, $customerService;

    public function __construct()
    {
        //Permissions
        // $this->middleware('permission:battle-list|battle-create|battle-edit|battle-delete', ['only' => ['index', 'store']]);
        // $this->middleware('permission:battle-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:battle-edit', ['only' => ['edit', 'update', 'status']]);
        // $this->middleware('permission:battle-delete', ['only' => ['destroy']]);

        //Data
        $this->uploads_image_directory = 'files/battles';
        //route
        $this->index_route_name = 'admin.consultants.index';
        $this->create_route_name = 'admin.consultants.create';
        $this->detail_route_name = 'admin.consultants.show';
        $this->edit_route_name = 'admin.consultants.edit';

        //view files
        $this->index_view = 'admin.consultant.index';
        $this->create_view = 'admin.consultant.create';
        $this->detail_view = 'admin.consultant.details';
        $this->tabe_view = 'admin.consultant.profile';
        $this->edit_view = 'admin.consultant.edit';
        $this->product_history_view = 'admin.consultant.product_history';
        $this->change_password = 'admin.admin_profile.change_password';

        //service files
        $this->consultantService = new ConsultantService();
        
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
            $items = $this->consultantService->datatable();
            // $items = $this->battleService->search($request, $items);
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
     * @param  BattleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConsultantRequest $request)
    {
        $input = $request->except(['_token', 'proengsoft_jsvalidation']);
        
        $battle = $this->consultantService->create($input);
        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('created', 'consultant', 1));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Battle  $battle
     * @return \Illuminate\Http\Response
     */
    public function show(User $consultant)
    {
        return view($this->detail_view, compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $battle
     * @return \Illuminate\Http\Response
     */
    public function edit(User $battle)
    {
        return view($this->edit_view, compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Battle  $battle
     * @return \Illuminate\Http\Response
     */
    public function update(ConsultantRequest $request, User $consultant)
    {
        $input = $request->except(['_method', '_token', 'proengsoft_jsvalidation']);
        $this->consultantService->update($input, $consultant);
        return redirect()->route($this->index_route_name)
            ->with('success', $this->mls->messageLanguage('updated', 'consultant_reg', 1));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Battle  $battle
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $consultant)
    {
        $result = $consultant->delete();
        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('consultant_reg'),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('consultant_reg'),
                'status_name' => 'error'
            ]);
        }
    }

    public function status($id, $status)
    {
        $status = ($status == 1) ? 0 : 1;
        $result =  $this->consultantService->updateById(['is_active' => $status], $id);
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


    public function emailapprove($id,$status)
    {
       
        $update=array('email_status' => $status);
        $result = UserService::status($update, $id);
        return redirect()->back()->withSuccess('Email Status Update Successfully!');
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

    public function phoneapprove($id,$status)
    {
       
        $update=array('phone_status' => $status);
        $result = UserService::status($update, $id);
        return redirect()->back()->withSuccess('Phone Status Update Successfully!');
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


    public function approve($id,$status)
    {
      echo"sdjvgj";
      die;
        $update=array('status' => $status);
        $result = UserService::status($update, $id);
        return redirect()->back()->withSuccess('Status Update Successfully!');
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
