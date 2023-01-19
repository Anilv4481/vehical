<?php

namespace App\Services;

use App\Models\VehicalShopRegistration;
use Illuminate\Support\Facades\DB;

class vehicalShoRegister
{

    public static function create(array $data)
    {

        $data = VehicalShopRegistration::create($data);
        return $data;
    }

    public static function update(array $data,VehicalShopRegistration $shopregistration)
    {
        $data = $shopregistration->update($data);
        return $data;
    }

    public static function updateById(array $data, $id)
    {
        $data = VehicalShopRegistration::whereId($id)->update($data);
        return $data;
    }

    public static function getById($id)
    {
        $data = VehicalShopRegistration::find($id);
        return $data;
    }

    public static function delete(VehicalShopRegistration $shopregistration)
    {
        $data = $shopregistration->delete();
        return $data;
    }

    public static function deleteById($id)
    {
        $data = VehicalShopRegistration::whereId($id)->delete();
        return $data;
    }

    public static function datatable()
    {
        $data = DB::table('shopregistrations')->orderBy('created_at', 'desc')->get();
        return $data;
    }
}
