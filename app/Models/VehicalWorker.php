<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicalWorker extends Model
{
    use HasFactory, SoftDeletes; 
    
    protected $table = 'serviceworkers';
    protected $primaryKey = 'service_worker_id';

    protected $fillable = [
       'service_worker_name',
       'service_worker_status',
       'service_worker_profile',
       'service_worker_active',
       'service_worker_phone',
       'longitude',
       'latitude',
       'service_worker_email_id',
       'service_worker_shop_name',
       'service_worker_last_location',
    ];

}