<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicalShopRegistration extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'shopregistrations';
    protected $primaryKey = 'shop_registration_id';

    protected $fillable = [
       'company_name',
       'company_gst_no',
       'company_owner_name',
       'company_address',
       'company_email',
       'company_mobile',
       'company_year_of_exp',
       'company_aboutus',
       'company_password',
       'company_c_password',
       'company_work_place_photo',
       'company_profile_image',
       'company_location',
    ];

}
