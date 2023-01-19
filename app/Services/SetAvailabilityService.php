<?php

namespace App\Services;

use App\Models\SetAvailability;

class SetAvailabilityService
{
    /**
     * Update the specified resource in storage.
     *
     * @param  array $data
     * @return SetAvailability
     */
    public static function create(array $data)
    {
        $data = SetAvailability::create($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Array $data - Updated Data
     * @param  SetAvailability $battle
     * @return SetAvailability
     */
    public static function update(array $data, SetAvailability $battle)
    {
        $data = $battle->update($data);
        return $data;
    }

    /**
     * UpdateById the specified resource in storage.
     *
     * @param  Array $data - Updated Data
     * @param  $id
     * @return SetAvailability
     */
    public static function updateById(array $data, $id)
    {
        $data = SetAvailability::whereId($id)->update($data);
        return $data;
    }

    /**
     * Get Data By Id from storage.
     *
     * @param  Int $id
     * @return SetAvailability
     */
    public static function getById($id)
    {
        $data = SetAvailability::find($id);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Battle
     * @return bool
     */
    public static function delete(SetAvailability $battle)
    {
        $data = $battle->delete();
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
        $data = SetAvailability::whereId($id)->delete();
        return $data;
    }

    /**
     * update data in storage.
     *
     * @param  Array $data - Updated Data
     * @param  Int $id - Battle Id
     * @return bool
     */
    public static function status(array $data, $id)
    {
        $data = SetAvailability::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Get data for datatable from storage.
     *
     * @return Battle with states, countries
     */
    public static function datatable($id)
    {
        $data = SetAvailability::where('consultant',$id)->orderBy('created_at', 'desc');
        return $data;
    }
}
