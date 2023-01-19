<?php

namespace App\Services;

use App\Models\Package;

class PackageService
{
    /**
     * Update the specified resource in storage.
     *
     * @param  array $data
     * @return Package
     */
    public static function create(array $data)
    {
        $data = Package::create($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Array $data - Updated Data
     * @param  Package $battle
     * @return Package
     */
    public static function update(array $data, Package $package)
    {
        $data = $package->update($data);
        return $data;
    }

    /**
     * UpdateById the specified resource in storage.
     *
     * @param  Array $data - Updated Data
     * @param  $id
     * @return Package
     */
    public static function updateById(array $data, $id)
    {
        $data = Package::whereId($id)->update($data);
        return $data;
    }

    /**
     * Get Data By Id from storage.
     *
     * @param  Int $id
     * @return Package
     */
    public static function getById($id)
    {
        $data = Package::find($id);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\Package
     * @return bool
     */
    public static function delete(Package $package)
    {
        $data = $package->delete();
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
        $data = Package::whereId($id)->delete();
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
        $data = Package::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Get data for datatable from storage.
     *
     * @return Package with states, countries
     */
    public static function datatable()
    {
        $data = Package::orderBy('created_at', 'desc');
        return $data;
    }
}
