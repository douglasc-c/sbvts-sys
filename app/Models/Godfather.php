<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Godfather extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'godfather_id',
        'user_id',
    ];

    /**
     * Get the user
     *
     * @return User
     */
    public function godfather()
    {
        return $this->hasOne(Godfather::class, 'godfather_id', 'id');
    }

    /**
     * Get the user
     *
     * @return User
     */
    public function user()
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }
}
