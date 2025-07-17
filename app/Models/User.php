<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use MongoDB\Laravel\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
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

    /**
     * Get the identifier that will be stored in the JWT token.
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return an array with custom claims to be added to the JWT token.
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
