<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use MongoDB\Laravel\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol_id'
    ];

    protected $hidden = [
        'rol_id',
    ];

    //relacin hijo
    public function rol(): BelongsTo
    {
        return $this->belongsTo(Rol::class, 'rol_id', '_id');
    }

    //relacion padre
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, "user_id", "_id");
    }
}
