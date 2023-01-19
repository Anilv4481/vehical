<?php

namespace App\Services;

use App\Models\Petdetails;
use Illuminate\Support\Facades\DB;

class PetDetailsService
{
     /**
     * Update the specified resource in storage.
     *
     * @param  array $data
     * @return Promocode
     */ 

    public static function create(array $data)
    {
        $data = Petdetails::create($data);
        return $data;
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  Array $data - Updated Data
     * @param  Promocode $promocode
     * @return Promocode
     */ 

    public static function update(array $data, Petdetails $petdetails)
    {
        $data = $petdetails->update($data);
        return $data;
    }

     /**
     * UpdateById the specified resource in storage.
     *
     * @param  Array $data - Updated Data
     * @param  $id
     * @return Promocode
     */ 

    public static function updateById(array $data, $id)
    {
        $data = Petdetails::whereId($id)->update($data);
        return $data;
    }


    /**
     * Get Data By Id from storage.
     *
     * @param  Int $id
     * @return Promocode
     */ 

    public static function getById($id)
    {
        $data = Petdetails::find($id);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Promocode
     * @return bool
     */
    public static function delete(Petdetails $petdetails)
    {
        $data = $petdetails->delete();
        return $data;
    }


    /**
     * RemoveById the specified resource from storage.
     *
     * @param  $id
     * @return bool
     */
    public static function deleteById($id)
    {
        $data = Petdetails::whereId($id)->delete();
        return $data;
    }

    /**
     * update data in storage.
     *
     * @param  Array $data - Updated Data
     * @param  Int $id - Promocode Id
     * @return bool
     */
  
    /**
     * Get data for datatable from storage.
     *
     * @return Promocode with states, countries
     */
    public static function datatable()
    {
        $data = DB::table('petdetails')->orderBy('created_at', 'desc')->get();
        return $data;
    }
}
