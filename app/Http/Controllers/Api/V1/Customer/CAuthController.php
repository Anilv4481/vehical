<?php

namespace App\Http\Controllers\Api\V1\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiLoginRequest;
use App\Http\Requests\ApiConsultantLoginRequest;
use App\Http\Requests\ApiRegisterRequest;
use App\Http\Requests\Admin\PetDetailRequest;

use App\Http\Requests\Admin\DoctorSpeRequest;

use App\Http\Requests\Admin\TrainerImageRequest;

use App\Http\Requests\Admin\TrainerCapacityRequest;

use App\Http\Requests\Admin\TrainerApptslotRequest;

use App\Http\Requests\Admin\DoctorAvaRequest;

use App\Http\Requests\Admin\DoctorAppslotRequest;

use App\Http\Requests\Admin\DoctorAppoinmentRequest;

use App\Http\Requests\Admin\DoctorImageRequest;

use App\Http\Requests\Admin\DoctorCapacityRequest;

use App\Http\Requests\Admin\DoctorRequest;

use App\Http\Requests\Admin\ClinicServiceRequest;

use App\Http\Requests\Admin\HostelProfileRequest;

use App\Http\Requests\Admin\HostelAvaRequest;



use App\Http\Requests\Admin\HostelSerRequest;


// api request
use App\Http\Requests\Admin\CareRequest;
use App\Http\Requests\Admin\CarBikeDetailsRequest;
use App\Http\Requests\Admin\ShopRegistrationrequest;
use App\Http\Requests\Admin\VehicalServiceRequest;
use App\Http\Requests\Admin\PetrolDesielRequest;
use App\Http\Requests\Admin\FlatTyreRequest;
use App\Http\Requests\Admin\FlatBatteryRequest;
use App\Http\Requests\Admin\VehicalShopRequest;
use App\Http\Requests\Admin\VehicalworkerRequest;




use App\Http\Requests\Admin\DoctorServiceRequest;
use App\Http\Requests\Admin\ManagehostelserviceRequest;
use App\Http\Requests\Admin\HostelServiceRequest;
use App\Http\Requests\ApiChangePasswordRequest;
use App\Http\Requests\ApiConsultantRequest;
use App\Http\Requests\Admin\ContactUsRequest;
use App\Services\Api\AuthService;
use App\Models\User;
use App\Services\HelperService;
use App\Services\UserService;
use App\Services\ConsultantService;
use App\Services\WalletService;
use Illuminate\Http\Request;

class CAuthController extends Controller
{

    protected $helperService, $userService, $apiAuthService,$walletService;

    public function __construct()
    {
        $this->helperService = new HelperService();
        $this->userService = new UserService();
        $this->apiAuthService = new AuthService();
    }



    public function login(ApiLoginRequest $request)
    {
        return $this->apiAuthService->login($request);
    }


    public function register(ApiRegisterRequest $request)
    {
        $request->merge(['role' => 'Customer']);
        return $this->apiAuthService->register($request);
    }



    // post doctor

    public function adddoctor(DoctorRequest $request)
    {
        return $this->apiAuthService->adddoctor($request);
    }

    // add hostel appoinment

    public function addhostelappoinment(HostelAppoinmentRequest $request)
    {
        return $this->apiAuthService->addhostelappoinment($request);
    }


    // get hostel profile

    public function gethostelprofile()
    {
        return $this->apiAuthService->gethostelprofile();
    }

    // get hostel appoinment

    public function gethostelappoinment()
    {
        return $this->apiAuthService->gethostelappoinment();
    }

    // add doctor availbilty

    public function docavailbilty(DoctorAvaRequest $request)
    {
        return $this->apiAuthService->docavailbilty($request);
    }



    // delete doctor availbilty

    public function deletedocavailbilty($id)
    {
        return $this->apiAuthService->deletedocavailbilty($id);
    }

    // update doctor availbilty

    public function updatedocavailbilty(Request $request,$id)
    {
        return $this->apiAuthService->updatedocavailbilty($request,$id);
    }


    //Get All Category

    public function get_category()
    {
        return $this->apiAuthService->get_category();
    }

    // get All Subcategory

    public function get_subcategory()
    {
        return $this->apiAuthService->get_subcategory();
    }

    public function get_package(Request $request)
    {
        return $this->apiAuthService->get_package($request);
    }

     /**
     * Logout user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function logout(Request $request)
    {
        return $this->apiAuthService->logout($request);
    }

    // CUstomer Request Add And Delete Api

    public function carerequestapi(CareRequest $request)
    {
        return $this->apiAuthService->carerequestapi($request);
    }
    public function carerequestapidel($id)
    {
        return $this->apiAuthService->carerequestapidel($id);
    }
    public function carerequestapilist()
    {
        return $this->apiAuthService->carerequestapilist();
    }

    // Car And Bike Add And Delete Api
    public function carbikeapi(CarBikeDetailsRequest $request)
    {
        return $this->apiAuthService->carbikeapi($request);
    }
    public function carbikeapidel($id)
    {
        return $this->apiAuthService->carbikeapidel($id);
    }
    public function carbikeapilist()
    {
        return $this->apiAuthService->carbikelist();
    }

    // Shop Registration Add And Delte Api

                        //add
    public function shopregapi(ShopRegistrationrequest $request)
    {
        return $this->apiAuthService->shopregapi($request);
    }
                        //del
    public function shopregapidel($id)
    {
        return $this->apiAuthService->shopregapidel($id);
    }
                        //list
    public function shopregapilist()
    {
        return $this->apiAuthService->shopreglist();
    }

    // Service worker Add And Delete Api
                        //add
    public function serviceworkersapi(VehicalworkerRequest $request)
    {
        return $this->apiAuthService->vehicalworkerservice($request);
    }
                        //del
    public function serviceworkersapidel($id)
    {
        return $this->apiAuthService->vehicalworkerservicedel($id);
    }
    //                     //list
    public function serviceworkersapilist()
    {
        return $this->apiAuthService->vehicalworkerservicelist();
    }

    // Petrol Desiel Add And Delete Api
    public function petroldesielapi(PetrolDesielRequest $request)
    {
        return $this->apiAuthService->petroldesielservice($request);
    }
    public function petroldesielapidel($id)
    {
        return $this->apiAuthService->petroldesielserviceDel($id);
    }
    public function petroldesielapilist()
    {
        return $this->apiAuthService->petroldesielservicelist();
    }

    // Flate Tyre Add And Delete And List Api
    public function flattyresapi(FlatTyreRequest $request)
    {
        return $this->apiAuthService->FlatTyreService($request);
    }
    public function flattyresapidel($id)
    {
        return $this->apiAuthService->FlatTyreServiceDel($id);
    }
    public function flattyresapilist()
    {
        return $this->apiAuthService->FlatTyreServicelist();
    }


// Flate Battery Add And Delete And List Api

    public function flatbatterysapi(FlatBatteryRequest $request)
    {
        return $this->apiAuthService->FlatBatteryService($request);
    }
    public function flatbatterysapidel($id)
    {
        return $this->apiAuthService->FlatBatteryServiceDel($id);
    }
    public function flatbatterysapilist()
    {
        return $this->apiAuthService->FlatBatteryServicelist();
    }


// Vehical Service Add And Delete And List Api

    public function vehicalservicesapi(VehicalShopRequest $request)
    {
        return $this->apiAuthService->vehicalservices($request);
    }
    public function vehicalservicesapidel($id)
    {
        return $this->apiAuthService->vehicalservicesdel($id);
    }
    public function vehicalservicesapilist()
    {
        return $this->apiAuthService->vehicalserviceslist();
    }


// Flate Battery Add And Delete And List Api

    public function vehicalshopsapi(VehicalShopRequest $request)
    {
        return $this->apiAuthService->vehicalshopservice($request);
    }
    public function vehicalshopsapidel($id)
    {
        return $this->apiAuthService->vehicalshopservicedel($id);
    }
    public function vehicalshopsapilist()
    {
        return $this->apiAuthService->vehicalshopservicelist();
    }
}
