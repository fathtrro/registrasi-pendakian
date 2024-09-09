<?php
// app/Models/Registration.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'schedule_id',
        'status',
    ];

    /**
     * Mendefinisikan relasi dengan User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Mendefinisikan relasi dengan Schedule.
     */
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
