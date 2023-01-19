<?php

namespace App\Http\Controllers\Api\V1\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginCheckMobileRequest;
use App\Http\Requests\MobileWithOtpRequest;
use App\Services\Api\AuthService;
use App\Services\HelperService;
use App\Services\UserService;
use Illuminate\Http\Request;

class CAuthController extends Controller
{

    protected $helperService, $userService, $apiAuthService;

    public function __construct()
    {
        $this->helperService = new HelperService();
        $this->userService = new UserService();
        $this->apiAuthService = new AuthService();
    }

    /**
     * Authenticate user Check.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authMobileCheck(LoginCheckMobileRequest $request)
    {
        return $this->apiAuthService->sendOtp($request);
    }

    /**
     * Authenticate login user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authWithOtp(MobileWithOtpRequest $request)
    {
        $request->merge(['role' => 'customer']);
        return $this->apiAuthService->verifyOtp($request);
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
}