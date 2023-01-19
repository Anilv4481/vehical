<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicalService extends Model
{
    use HasFactory, SoftDeletes; 
    
    protected $table = 'vehicalservices';
    protected $primaryKey = 'vehicalservice_id';

    protected $fillable = [
       'vehicalservice_name',
       'vehical_image',
    ];

}