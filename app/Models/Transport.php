<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Transport extends Model
{
    use HasFactory;
    use Searchable;
    protected $fillable = ['tab_name', 'title1', 'title2', 'number', 'value', 'time', 'map', 'text', 'publish' ];

    public function stop()
    {
        return $this->hasMany(Stop::class);
    }

    public function someFunction()
    {
        return 'transports';
    }
}
