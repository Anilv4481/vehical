<?php

namespace App\Services;

use App\Models\PetrolDesielModel;
use Illuminate\Support\Facades\DB;

class PetrolDesielService
{

    public static function create(array $data)
    {

        $data = PetrolDesielModel::create($data);
        return $data;
    }

    public static function update(array $data,PetrolDesielModel $petroldesiel)
    {
        $data = $petroldesiel->update($data);
        return $data;
    }

    public static function updateById(array $data, $id)
    {
        $data = PetrolDesielModel::whereId($id)->update($data);
        return $data;
    }

    public static function getById($id)
    {
        $data = PetrolDesielModel::find($id);
        return $data;
    }

    public static function delete(PetrolDesielModel $petroldesiel)
    {
        $data = $petroldesiel->delete();
        return $data;
    }

    public static function deleteById($id)
    {
        $data = PetrolDesielModel::whereId($id)->delete();
        return $data;
    }

    public static function datatable()
    {
        $data = DB::table('petroldesiel')->orderBy('created_at', 'desc')->get();
        return $data;
    }
}
