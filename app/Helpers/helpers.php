<?php

use App\Models\Setting;
use App\Models\User;
use App\Services\PlanAmenityService;
use App\Services\UtilityService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Facades\JWTAuth;

function getUserName($name, $email = '', $mobile_no = '')
{
    if (!isset($name)) {
        if ($name == null) {
            $name = 'Guest';
        }
    } else {
        if ($name == null) {
            $name = 'Guest';
        }
    }

    if (!isset($email)) {
        if ($email == null) {
            $email = 'NA';
        }
    } else {
        if ($email == null) {
            $email = 'NA';
        }
    }

    if (!isset($mobile_no)) {
        if ($mobile_no == null) {
            $mobile_no = 'NA';
        }
    } else {
        if ($mobile_no == null) {
            $mobile_no = 'NA';
        }
    }

    return `<div>` . $name . `<br>(Mobile No: ` . $mobile_no . `) <br> (Email: ` . $email . `)</div>`;
}

/** Get Role Names As String
 * @param mixed $key
 * @param Keys 'admin' => 'Admin',
 * @param Keys 'customer' => 'Customer',
 * @return string
 */
function roleName($key)
{
    $role = [
        'admin' => 'Niraj',
        'customer' => 'Customer',
    ];
    return $role[$key];
}

function roleId($key)
{
    $role = [
        'admin' => 1,
        'customer' => 2,
    ];
    return $role[$key];
}

function langNameArray($key)
{
    $lang_array = array('en' => 'English', 'gr' => 'German');
    return $lang_array[$key];
}

function incorrectKeyJsonMsg()
{
    $responseMsg = UtilityService::responseMsg();
    return UtilityService::is422Response($responseMsg['incorrect_key']);
}

function getApiAuthUser()
{
    return JWTAuth::parseToken()->authenticate();
}

function getWebAuthUser()
{
    return Auth::user();
}

function url_exists($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return ($code == 200);
}

function checkUserRole(User $user, $role_name)
{
    if ($user->hasRole($role_name)) {
        return true;
    } else {
        return false;
    }
}


function getSpecificUsersByRole($role_name)
{
    return User::whereHas('roles', function ($q) use ($role_name) {
        $q->where("name", $role_name);
    });
}

function incrementKeyByModelId(Model $model, String $column_name)
{
    return $model->increment($column_name);
}

function incrementKeyByModelIdWithVal(Model $model, String $column_name, $value)
{
    return $model->increment($column_name, $value);
}

function decrementKeyByModelId(Model $model, String $column_name)
{
    return $model->decrement($column_name);
}

function decrementKeyByModelIdWithVal(Model $model, String $column_name, $value)
{
    return $model->decrement($column_name, $value);
}

/**
 * @param Dynamic $type
 * @param $type 0, DATE_FORMAT="M d, Y",
 * @param $type 1, TIME_FORMAT="h:i A"
 * @param $type 2, DATETIME_FORMAT="d M Y, h:i A"
 * @param $type 'format', User-Defined Format
 */
function get_default_format($datetime, $type = 0, $format = null)
{
    if ($type == 'format' && isset($format)) {
        $format_date = Carbon::parse($datetime)->format($format);
    } else if ($type = 2) { //DateTime
        $format_date = Carbon::parse($datetime)->format(env('DATETIME_FORMAT'));
    } else if ($type == 1) {  // time Time
        $format_date = Carbon::parse($datetime)->format(env('TIME_FORMAT'));
    } else { // date Date
        $format_date = Carbon::parse($datetime)->format(env('DATE_FORMAT'));
    }
    return $format_date;
}

function createJsonFile($json_content)
{
    if (isset($json_content)) {
        if ($json_content->count()) {
            try {
                Storage::disk('local')->put('public\global_page_content\global_page_content.json', json_encode($json_content));
                return true;
            } catch (Exception $e) {
                Log::error('Json File Not created');
            }
        }
    }
}

function getJsonFile()
{
    $path = Storage::disk('local')->path('public/global_page_content/global_page_content.json');
    return json_decode(file_get_contents($path), true);
    if (url_exists($path)) {
        return json_decode(file_get_contents($path), true);
    }
}

function createJsonIfNotExists()
{
    $path = Storage::disk('local')->path('public/global_page_content/global_page_content.json');
    if (!url_exists($path)) {
        return createJsonFile(Setting::pluck('value', 'slug'));
    }
}