<?php

// app/Models/Trail.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trail extends Model
{
    use HasFactory;

    protected $fillable = [
        'mountain_id',
        'name',
        'description',
    ];

    /**
     * Mendefinisikan relasi dengan Mountain.
     */
    public function mountain()
    {
        return $this->belongsTo(Mountain::class);
    }

    /**
     * Mendefinisikan relasi dengan Schedules.
     */
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
