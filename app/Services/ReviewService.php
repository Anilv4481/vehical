<?php

namespace App\Services;

use App\Models\Review;

class ReviewService
{
    /**
     * Update the specified resource in storage.
     *
     * @param  array $data
     * @return Review
     */
    public static function create(array $data)
    {
        $data = Review::create($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Array $data - Updated Data
     * @param  Review $promocode
     * @return Review
     */
    public static function update(array $data, Review $review)
    {
        $data = $review->update($data);
        return $data;
    }

    /**
     * UpdateById the specified resource in storage.
     *
     * @param  Array $data - Updated Data
     * @param  $id
     * @return Review
     */
    public static function updateById(array $data, $id)
    {
        $data = Review::whereId($id)->update($data);
        return $data;
    }

    /**
     * Get Data By Id from storage.
     *
     * @param  Int $id
     * @return Review
     */
    public static function getById($id)
    {
        $data = Review::find($id);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Review
     * @return bool
     */
    public static function delete(Review $review)
    {
        $data = $review->delete();
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
        $data = Review::whereId($id)->delete();
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
        $data = Review::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Get data for datatable from storage.
     *
     * @return Review with states, countries
     */
    public static function datatable()
    {
        $data = Review::orderBy('created_at', 'desc');
        return $data;
    }
}
