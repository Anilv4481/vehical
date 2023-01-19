<?php

namespace App\Services;

use App\Models\VehicalShop;
use Illuminate\Support\Facades\DB;

class vehicalshopservice
{
 
    public static function create(array $data)
    {
        $data = VehicalShop::create($data);
        return $data;
    }
  
    public static function update(array $data,VehicalShop $vehicalshop)
    {
        $data = $vehicalshop->update($data);
        return $data;
    }

    public static function updateById(array $data, $id)
    {
        $data = VehicalShop::whereId($id)->update($data);
        return $data;
    }
 
    public static function getById($id)
    {
        $data = VehicalShop::find($id);
        return $data;
    }
   
    public static function delete(VehicalShop $vehicalshop)
    {
        $data = $vehicalshop->delete();
        return $data;
    }
   
    public static function deleteById($id)
    {
        $data = VehicalShop::whereId($id)->delete();
        return $data;
    }

    public static function datatable()
    {
        $data = DB::table('vehicalhshops')->orderBy('created_at', 'desc')->get();
        return $data;
    }
}