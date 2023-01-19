<?php

namespace App\Services;

use App\Models\CarBikeDetailsModel;
use Illuminate\Support\Facades\DB;

class CarBikeDetailsService
{

    public static function create(array $data)
    {

        $data = CarBikeDetailsModel::create($data);
        return $data;
    }

    public static function update(array $data, CarBikeDetailsModel $carbikedetail)
    {
        $data = $carbikedetail->update($data);
        return $data;
    }

    public static function updateById(array $data, $id)
    {
        $data = CarBikeDetailsModel::whereId($id)->update($data);
        return $data;
    }

    public static function getById($id)
    {
        $data = CarBikeDetailsModel::find($id);
        return $data;
    }

    public static function delete(CarBikeDetailsModel $carbikedetail)
    {
        $data = $carbikedetail->delete();
        return $data;
    }

    public static function deleteById($id)
    {
        $data = CarBikeDetailsModel::whereId($id)->delete();
        return $data;
    }

    public static function datatable()
    {
        $data = DB::table('carbikedetails')->orderBy('created_at', 'desc')->get();
        return $data;
    }
}
