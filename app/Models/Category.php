<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categorys';
    protected $primaryKey = 'cat_id';

    protected $fillable = [
        'cat_name',
        'cat_image',
        'cat_status'
    ];
}