<?php

namespace App\Services;

use App\Models\VehicalWorker;
use Illuminate\Support\Facades\DB;

class vehicalworkerservice
{
 
    public static function create(array $data)
    {
        $data = VehicalWorker::create($data);
        return $data;
    }
  
    public static function update(array $data,VehicalWorker $serviceworker)
    {
        $data = $serviceworker->update($data);
        return $data;
    }

    public static function updateById(array $data, $id)
    {
        $data = VehicalWorker::whereId($id)->update($data);
        return $data;
    }
 
    public static function getById($id)
    {
        $data = VehicalWorker::find($id);
        return $data;
    }
   
    public static function delete(VehicalWorker $serviceworker)
    {
        $data = $serviceworker->delete();
        return $data;
    }
   
    public static function deleteById($id)
    {
        $data = VehicalWorker::whereId($id)->delete();
        return $data;
    }

    public static function datatable()
    {
        $data = DB::table('serviceworkers')->orderBy('created_at', 'desc')->get();
        return $data;
    }
}