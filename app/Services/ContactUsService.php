<?php

namespace App\Services;

use App\Models\ContactUs;

class ContactUsService
{
    /**
     * Update the specified resource in storage.
     *
     * @param  array $data
     * @return ContactUs
     */
    public static function create(array $data)
    {
        $data = ContactUs::create($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Array $data - Updated Data
     * @param  ContactUs $promocode
     * @return ContactUs
     */
    public static function update(array $data, ContactUs $contactu)
    {
        $data = $contactu->update($data);
        return $data;
    }

    /**
     * UpdateById the specified resource in storage.
     *
     * @param  Array $data - Updated Data
     * @param  $id
     * @return ContactUs
     */
    public static function updateById(array $data, $id)
    {
        $data = ContactUs::whereId($id)->update($data);
        return $data;
    }

    /**
     * Get Data By Id from storage.
     *
     * @param  Int $id
     * @return ContactUs
     */
    public static function getById($id)
    {
        $data = ContactUs::find($id);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\ContactUs
     * @return bool
     */
    public static function delete(ContactUs $contactu)
    {
        $data = $contactu->delete();
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
        $data = ContactUs::whereId($id)->delete();
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
        $data = ContactUs::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Get data for datatable from storage.
     *
     * @return ContactUs with states, countries
     */
    public static function datatable()
    {
        $data = ContactUs::orderBy('created_at', 'desc');
        return $data;
    }
}
