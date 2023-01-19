<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarBikeDetailsModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'carbikedetails';
    protected $primaryKey = 'car_bike_details_id';

    protected $fillable = [
       'vehical_company_name',
       'vehical_name',
       'vehical_registration_no',
       ];

}
