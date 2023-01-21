<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FlatBatteryModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'flatbattery';
    protected $primaryKey = 'flat_battery_id';

    protected $fillable = [
       'vehical_type',
       'vehical_no',
       'vehical_pic',
       'battery_pic',
       'location',
       'descrption',

    ];

}
