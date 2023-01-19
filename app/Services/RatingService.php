<?php

namespace App\Services;

use App\Models\Rating;

class RatingService
{
    /**
     * Update the specified resource in storage.
     *
     * @param  array $data
     * @return Rating
     */
    public static function create(array $data)
    {
        $data = Rating::create($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Array $data - Updated Data
     * @param  Rating $promocode
     * @return Rating
     */
    public static function update(array $data, Rating $rating)
    {
        $data = $rating->update($data);
        return $data;
    }

    /**
     * UpdateById the specified resource in storage.
     *
     * @param  Array $data - Updated Data
     * @param  $id
     * @return Rating
     */
    public static function updateById(array $data, $id)
    {
        $data = Rating::whereId($id)->update($data);
        return $data;
    }

    /**
     * Get Data By Id from storage.
     *
     * @param  Int $id
     * @return Rating
     */
    public static function getById($id)
    {
        $data = Rating::find($id);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Rating
     * @return bool
     */
    public static function delete(Rating $rating)
    {
        $data = $rating->delete();
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
        $data = Rating::whereId($id)->delete();
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
        $data = Rating::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Get data for datatable from storage.
     *
     * @return Rating with states, countries
     */
    public static function datatable()
    {
        $data = Rating::orderBy('created_at', 'desc');
        return $data;
    }
}
