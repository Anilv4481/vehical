<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = [
        'rating',
        // 'user_id',
        'consultant_id',
      
       
    ];


    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
