<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CareRequestModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'carerequest';
    protected $primaryKey = 'care_request_id';

    protected $fillable = [
       'service_type',
       'tube',
       'vehical',
    ];

}
