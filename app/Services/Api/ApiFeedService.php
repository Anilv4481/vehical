<?php

namespace App\Services\Api;

use App\Http\Resources\Feed\FeedAllDataResource;
use App\Http\Resources\Feed\FeedCollection;
use App\Models\Feed;
use App\Models\FeedFile;
use App\Services\FeedService;
use App\Services\HelperService;
use App\Services\UtilityService;
use Illuminate\Http\Request;

class ApiFeedService
{
    /** Get List of premade plans
     *
     * @param  Array $responseMsg
     * @return \Illuminate\Http\Response
     */
    public static function index(array $responseMsg)
    {
        $data = FeedService::getActiveDescSortedList();

        if ($data->count()) {
            $data = new FeedCollection($data->paginate(10));
            return UtilityService::is200ResponseWithData($responseMsg['success_msg'], $data);
        } else if ($data->count() <= 0) {
            $data = (object)[];
            return UtilityService::is200ResponseWithDataArrKey($responseMsg['no_records_msg'], $data);
        } else {
            return UtilityService::is422Response($responseMsg['error_msg']);
        }
    }

    /** Get Details premade plan
     *
     * @param Model Feed
     * @param  Array $responseMsg
     * @return \Illuminate\Http\Response
     */
    public static function store(Request $request, array $responseMsg)
    {
        $input = $request->except(['files']);
        $feed = FeedService::create($input);

        if ($request->hasFile('files')) {
            $files_image = HelperService::multipleImageUploader($request, 'files', '/storage/files/feeds/');

            for ($i = 0; $i < count($files_image); $i++) {
                $feed_image[$i]['feed_id'] = $feed->id;
                $feed_image[$i]['file_type'] = $request->file_type;
                $feed_image[$i]['file_ext'] = $request->file_type;
                $feed_image[$i]['name'] = $files_image[$i];
                $feed_image[$i]['is_active'] = 1;
            }
            FeedFile::insert($feed_image);
        }
        if ($feed) {
            return UtilityService::is200Response($responseMsg['success_add_msg']);
        } else {
            return UtilityService::is422Response($responseMsg['error_msg']);
        }
    }



    /** Get Details premade plan
     *
     * @param Model Feed
     * @param  Array $responseMsg
     * @return \Illuminate\Http\Response
     */
    public static function show(Feed $premade_plan, array $responseMsg)
    {
        $data = $premade_plan;
        if ($data) {
            $data = new FeedAllDataResource($data);
            return UtilityService::is200ResponseWithData($responseMsg['success_msg'], $data);
        } else if (!$data) {
            $data = (object)[];
            return UtilityService::is200ResponseWithDataArrKey($responseMsg['no_records_msg'], $data);
        } else {
            return UtilityService::is422Response($responseMsg['error_msg']);
        }
    }
}
