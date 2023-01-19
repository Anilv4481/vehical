<?php

namespace App\Http\Controllers\Api\V1\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerProfileImageRequest;
use App\Http\Resources\Customer\CustomerResource;
use App\Services\Api\AuthService;
use App\Services\FileService;
use App\Services\HelperService;
use App\Services\UserService;
use App\Services\UtilityService;
use Illuminate\Http\Request;

class CProfileController extends Controller
{

    protected $helperService, $userService, $apiAuthService, $utilityService, $responseMsg;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->helperService = new HelperService();
        $this->userService = new UserService();
        $this->apiAuthService = new AuthService();
        $this->utilityService = new UtilityService();
        //messages
        $this->responseMsg = UtilityService::responseMsg();
    }

    /**
     * Get User Profile
     *
     * @@param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $auth_user = $this->apiAuthService->getAuthUser();
        if ($auth_user) {
            $message = 'Profile Get Successfully';
            $data = new CustomerResource($auth_user);
            return $this->utilityService->is200ResponseWithDataArrKey($message, $data);
        }
        $message = 'Error! profile data not get.';
        return $this->utilityService->is422Response($message);
    }

    /**
     * Update User Profile
     *
     * @return void
     */
    public function updateProfile(Request $request)
    {
        $auth_user = getApiAuthUser();
        $input = $request->all();
        $data = UserService::update($input, $auth_user);
        if ($data) {
            return UtilityService::is200Response($this->responseMsg['success_update_msg']);
        } else {
            return UtilityService::is422Response($this->responseMsg['error_msg']);
        }
    }

    /**
     * Customer profile image update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfileImage(CustomerProfileImageRequest $request)
    {
        $auth_user = getApiAuthUser();
        $input = $request->all();
        $image = FileService::imageUploader($request, 'image', 'files/users/');
        if ($image != null) {
            $input['image'] = $image;
        }
        $data = UserService::update($input, $auth_user);
        if ($data) {
            return UtilityService::is200Response($this->responseMsg['success_update_msg']);
        } else {
            return UtilityService::is422Response($this->responseMsg['error_msg']);
        }
    }
}