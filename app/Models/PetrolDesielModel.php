<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PetrolDesielModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'petroldesiel';
    protected $primaryKey = 'petroldesiel_id';

    protected $fillable = [
       'vehical_type',
       'vehical_no',
       'vehical_pic',
       'fuel_type',
       'quanity_fuel',
       'location',
       'descrpition',

    ];

}
