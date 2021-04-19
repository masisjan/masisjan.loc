<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;
    protected $fillable = ['day', 'name', 't01', 't02', 't03', 't04', 't05', 't06', 't07', 't08',
                          't09', 't10', 't11', 't12', 't13', 't14', 't15', 't16', 't17', 'id_t',
                          't18', 't19', 't20', 't21', 't22', 't23', 't24', 't25' ];

    public function stop()
    {
        return $this->belongsTo(Stop::class);
    }
}
