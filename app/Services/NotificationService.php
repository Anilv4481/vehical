<?php

namespace App\Services;

use App\Models\Notification;

class NotificationService
{
   
    public static function create(array $data)
    {
        $data = Notification::create($data);
        return $data;
    }

    public static function update(array $data, Notification $notification)
    {
        $data = $notification->update($data);
        return $data;
    }

 
    public static function updateById(array $data, $id)
    {
        $data = Notification::whereId($id)->update($data);
        return $data;
    }

  
    public static function getById($id)
    {
        $data = Notification::find($id);
        return $data;
    }

    public static function delete(Notification $notification)
    {
        $data = $notification->delete();
        return $data;
    }

    public static function deleteById($id)
    {
        $data = Notification::whereId($id)->delete();
        return $data;
    }

   
    public static function status(array $data, $id)
    {
        $data = Notification::where('id', $id)->update($data);
        return $data;
    }

    
    public static function datatable()
    {
        $data = Notification::orderBy('created_at', 'desc');
        return $data;
    }
}
