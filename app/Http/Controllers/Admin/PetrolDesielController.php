<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\PetrolDesielRequest;

use App\Models\PetrolDesielModel;

use App\Services\PetrolDesielService;

use App\Services\CustomerService;
use App\Services\ManagerLanguageService;
use App\Services\UtilityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetrolDesielController extends Controller
{
    protected $mls, $assign_role, $uploads_image_directory;
    protected $index_view, $create_view, $edit_view, $detail_view, $tabe_view, $product_history_view;
    protected $index_route_name, $create_route_name, $detail_route_name, $edit_route_name;
    protected $promoService, $utilityService, $customerService;

    public function __construct()
    {

        $this->uploads_image_directory = 'files/petroldesiels';

        //route

        $this->index_route_name = 'admin.petroldesiels.index';
        $this->create_route_name = 'admin.petroldesiels.create';
        $this->detail_route_name = 'admin.petroldesiels.show';
        $this->edit_route_name = 'admin.petroldesiels.edit';

        //view files

        $this->index_view = 'admin.petroldesielfolder.index';
        $this->create_view = 'admin.petroldesielfolder.create';
        $this->edit_view = 'admin.petroldesielfolder.edit';

        //service files

        $this->PetDesService = new PetrolDesielService();

        $this->customerService = new CustomerService();

        $this->utilityService = new UtilityService();

        $this->mls = new ManagerLanguageService('messages');

    }


    public function index(Request $request)
    {

        $items = $this->PetDesService->datatable();

        if($request->ajax())
        {
            return view('admin.petroldesielfolder.petroldesiel_table',['petroldesiel'=>$items]);
        } else {
            return view('admin.petroldesielfolder.index',['petroldesiel'=>$items]);
        }

    }


    public function create()
    {
        return view($this->create_view);
    }

    public function store(PetrolDesielRequest $request)
    {
        $input = $request->except(['_token', 'proengsoft_jsvalidation']);

        $image=$request->file('vehical_pic');
        $filename = time().$image->getClientOriginalName();
        $destinationPath = public_path('/vehical/image/');
        $image->move($destinationPath, $filename);
        $input['vehical_pic']=$filename;


        $battle = $this->PetDesService->create($input);



        return redirect()->route($this->index_route_name)->with('success',
        $this->mls->messageLanguage('created', 'Fuel Details register', 1));
    }


    public function show(PetrolDesielModel $petroldesiel)
    {
        return view($this->detail_view,compact('petroldesiel'));
    }


    public function edit(PetrolDesielModel $petroldesiel)
    {

        return view($this->edit_view,compact('petroldesiel'));
    }


    public function update(Request $request,PetrolDesielModel $petroldesiel)
    {
        $input = $request->except(['_method', '_token', 'proengsoft_jsvalidation']);

        $image=$request->file('vehical_pic');
        $filename = time().$image->getClientOriginalName();
        $destinationPath = public_path('/vehical/image/');
        $image->move($destinationPath, $filename);
        $input['vehical_pic']=$filename;

        $this->PetDesService->update($input,$petroldesiel);
        return redirect()->route($this->index_route_name)->with('success',
        $this->mls->messageLanguage('updated', 'Fuel Details update', 1));
    }

    public function destroy($id)
    {

        $result=DB::table('petroldesiel')->where('petroldesiel_id', $id)->delete();

        return redirect()->back()->withSuccess('Fuel Infomation Delete Successfully!');

        if ($result) {
            return response()->json([
                'status' => 1,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('Fuel Infomation delete'),
                'status_name' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'title' => $this->mls->onlyNameLanguage('deleted_title'),
                'message' => $this->mls->onlyNameLanguage('Fuel Infomation delete'),
                'status_name' => 'error'
            ]);
        }

    }

}
