<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Useraddress extends Model
{
    use HasFactory, SoftDeletes; 
    
    protected $table = 'useraddresss';
    protected $primaryKey = 'address_id';

    protected $fillable = [
       'address'
    ];

}