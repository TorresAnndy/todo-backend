<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use MongoDB\Laravel\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'rols';
    protected $fillable = [
        'name',
        'description'
    ];

    //relacion padre
    public function users(): HasMany
    {
        return $this->hasMany(User::class, "rol_id", "_id");
    }
}
