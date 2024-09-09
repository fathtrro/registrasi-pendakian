<?php

// app/Models/Schedule.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'trail_id',
        'date',
        'quota',
    ];

    /**
     * Mendefinisikan relasi dengan Trail.
     */
    public function trail()
    {
        return $this->belongsTo(Trail::class);
    }

    /**
     * Mendefinisikan relasi dengan Registrations.
     */
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
