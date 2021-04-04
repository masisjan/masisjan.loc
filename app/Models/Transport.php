<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;
    protected $fillable = ['tab_name', 'title1', 'title2', 'number', 'value', 'time', 'map', 'text', 'publish' ];

    public function stop()
    {
        return $this->belongsTo(Stop::class);
    }
}
