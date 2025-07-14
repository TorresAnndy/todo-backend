<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Rol extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'rols';
    protected $fillable = [
        'name'
    ];
}
