<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FlatTyreModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'flattyre';
    protected $primaryKey = 'flat_tyre_id';

    protected $fillable = [
       'vehical_type',
       'tube',
       'tyre_size',
       'tyre_photo',
       'vehical_no',
       'location',
       'descrption',

    ];

}
