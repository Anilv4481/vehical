<?php

namespace App\Services;

use App\Models\FlatTyreModel;
use Illuminate\Support\Facades\DB;

class FlatTyreService
{

    public static function create(array $data)
    {

        $data = FlatTyreModel::create($data);
        return $data;
    }

    public static function update(array $data,FlatTyreModel $flattyre)
    {
        $data = $flattyre->update($data);
        return $data;
    }

    public static function updateById(array $data, $id)
    {
        $data = FlatTyreModel::whereId($id)->update($data);
        return $data;
    }

    public static function getById($id)
    {
        $data = FlatTyreModel::find($id);
        return $data;
    }

    public static function delete(FlatTyreModel $flattyre)
    {
        $data = $flattyre->delete();
        return $data;
    }

    public static function deleteById($id)
    {
        $data = FlatTyreModel::whereId($id)->delete();
        return $data;
    }

    public static function datatable()
    {
        $data = DB::table('flattyre')->orderBy('created_at', 'desc')->get();
        return $data;
    }
}
