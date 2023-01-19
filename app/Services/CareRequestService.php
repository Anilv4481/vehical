<?php

namespace App\Services;

use App\Models\CareRequestModel;
use Illuminate\Support\Facades\DB;

class CareRequestService
{

    public static function create(array $data)
    {

        $data = CareRequestModel::create($data);
        return $data;
    }

    public static function update(array $data, CareRequestModel $carerequest)
    {
        $data = $carerequest->update($data);
        return $data;
    }

    public static function updateById(array $data, $id)
    {
        $data = CareRequestModel::whereId($id)->update($data);
        return $data;
    }

    public static function getById($id)
    {
        $data = CareRequestModel::find($id);
        return $data;
    }

    public static function delete(CareRequestModel $carerequest)
    {
        $data = $careservice->delete();
        return $data;
    }

    public static function deleteById($id)
    {
        $data = CareRequestModel::whereId($id)->delete();
        return $data;
    }

    public static function datatable()
    {
        $data = DB::table('carerequest')->orderBy('created_at', 'desc')->get();
        return $data;
    }
}
