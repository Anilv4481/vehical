<?php

namespace App\Services;

use App\Models\Promocode;

class PromocodeService
{
    /**
     * Update the specified resource in storage.
     *
     * @param  array $data
     * @return Promocode
     */
    public static function create(array $data)
    {
        $data = Promocode::create($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Array $data - Updated Data
     * @param  Promocode $promocode
     * @return Promocode
     */
    public static function update(array $data, Promocode $promocode)
    {
        $data = $promocode->update($data);
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
        $data = Promocode::whereId($id)->update($data);
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
        $data = Promocode::find($id);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Promocode
     * @return bool
     */
    public static function delete(Promocode $promocode)
    {
        $data = $promocode->delete();
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
        $data = Promocode::whereId($id)->delete();
        return $data;
    }

    /**
     * update data in storage.
     *
     * @param  Array $data - Updated Data
     * @param  Int $id - Promocode Id
     * @return bool
     */
    public static function status(array $data, $id)
    {
        $data = Promocode::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Get data for datatable from storage.
     *
     * @return Promocode with states, countries
     */
    public static function datatable()
    {
        $data = Promocode::orderBy('created_at', 'desc');
        return $data;
    }
}
