<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'plan_id',
    ];

    /**
     * Get the user
     *
     * @return User
     */
    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }

    /**
     * Get the plan
     *
     * @return Plan
     */
    public function plan()
    {
        return $this->hasOne(DataPlan::class, 'plan_id', 'id');
    }
}
