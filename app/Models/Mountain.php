<?php

// app/Models/Mountain.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mountain extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'height',
    ];

    /**
     * Mendefinisikan relasi dengan Trails.
     */
    public function trails()
    {
        return $this->hasMany(Trail::class);
    }
}
