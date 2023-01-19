<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcatgeorys extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'subcategorys';
    protected $primaryKey = 'sub_id';

    protected $fillable = [
        'sub_cat_name',
        'sub_cat_image',
        'cat_id',
    ];

}