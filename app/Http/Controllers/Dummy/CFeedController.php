<?php

namespace App\Http\Controllers\Api\V1\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedRequest;
use App\Models\Feed;
use App\Services\Api\AuthService;
use App\Services\Api\ApiFeedService;
use App\Services\HelperService;
use App\Services\FeedService;
use App\Services\UtilityService;
use Illuminate\Http\Request;

class CFeedController extends Controller
{

    protected $helperService, $feedService, $apiAuthService, $utilityService, $apifeedService;
    protected $success_msg, $no_records_msg, $error_msg, $responseMsg;

    public function __construct()
    {
        $this->helperService = new HelperService();
        $this->feedService = new FeedService();
        $this->apifeedService = new ApiFeedService();
        $this->apiAuthService = new AuthService();
        $this->utilityService = new UtilityService();

        //messages
        $this->responseMsg = $this->utilityService->responseMsg();
    }

    /** Get List of Feeds
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->apifeedService->index($this->responseMsg);
    }

    /** Store Feed Data
     *
     * @param Model Feed
     * @return \Illuminate\Http\Response
     */
    public function store(FeedRequest $request)
    {
        return $this->apifeedService->store($request, $this->responseMsg);
    }

    /** Get Details of Specific Feed
     *
     * @param Model Feed
     * @return \Illuminate\Http\Response
     */
    public function show(Feed $feed)
    {
        return $this->apifeedService->show($feed,  $this->responseMsg);
    }
}
