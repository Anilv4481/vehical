<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SetAvailability extends Model
{
    use HasFactory, SoftDeletes;
    public $table = 'set_availablitys';
    protected $fillable = [
        'date',
        'start_time',
        'end_time',
        'consultant',
    ];
}