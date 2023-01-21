<?php

namespace App\Services;

use App\Models\FlatBatteryModel;
use Illuminate\Support\Facades\DB;

class FlatBatteryService
{

    public static function create(array $data)
    {

        $data = FlatBatteryModel::create($data);
        return $data;
    }

    public static function update(array $data,FlatBatteryModel $flatbattery)
    {
        $data = $flatbattery->update($data);
        return $data;
    }

    public static function updateById(array $data, $id)
    {
        $data = FlatBatteryModel::whereId($id)->update($data);
        return $data;
    }

    public static function getById($id)
    {
        $data = FlatBatteryModel::find($id);
        return $data;
    }

    public static function delete(FlatBatteryModel $flatbattery)
    {
        $data = $flatbattery->delete();
        return $data;
    }

    public static function deleteById($id)
    {
        $data = FlatBatteryModel::whereId($id)->delete();
        return $data;
    }

    public static function datatable()
    {
        $data = DB::table('flatbattery')->orderBy('created_at', 'desc')->get();
        return $data;
    }
}
