<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyPayment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'value',
        'due_date',
        'status',
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
}
