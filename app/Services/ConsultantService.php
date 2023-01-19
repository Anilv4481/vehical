<?php

namespace App\Services;

use App\Models\User;

class ConsultantService
{
    /**
     * Update the specified resource in storage.
     *
     * @param  array $data
     * @return User
     */
    public static function create(array $data)
    {
        $data = User::create($data);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Array $data - Updated Data
     * @param  User $battle
     * @return User
     */
    public static function update(array $data, User $consultant)
    {
        $data = $consultant->update($data);
        return $data;
    }

    /**
     * UpdateById the specified resource in storage.
     *
     * @param  Array $data - Updated Data
     * @param  $id
     * @return User
     */
    public static function updateById(array $data, $id)
    {
        $data = User::whereId($id)->update($data);
        return $data;
    }

    /**
     * Get Data By Id from storage.
     *
     * @param  Int $id
     * @return ConsultantReg
     */
    public static function getById($id)
    {
        $data = User::find($id);
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\User
     * @return bool
     */
    public static function delete(User $battle)
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
        $data = User::whereId($id)->delete();
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
        $data = User::where('id', $id)->update($data);
        return $data;
    }

    /**
     * Get data for datatable from storage.
     *
     * @return Battle with states, countries
     */
    public static function datatable()
    {
        $data = User::where('user_type','1')->orderBy('created_at', 'desc');
        return $data;
    }
}
