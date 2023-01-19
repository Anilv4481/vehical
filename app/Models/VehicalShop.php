<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicalShop extends Model
{
    use HasFactory, SoftDeletes; 
    
    protected $table = 'vehicalhshops';
    protected $primaryKey = 'vehical_shop_id';

    protected $fillable = [
       'vehical_shop_address',
       'vehical_phone_number',
       'vehical_shop_email_id',
       'vehical_shop_status',
       'vehical_shop_profile',
       'vehical_type',
       'vehical_problem',
       'vehical_desc',
    ];

}