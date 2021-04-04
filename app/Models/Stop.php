<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stop extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'value',	't_name', 'number', 't_id', 'workdays_id', 'holidays_id'];

    public function transport()
    {
        return $this->belongsTo(Transport::class);
    }
    public function time()
    {
        return $this->belongsTo(Time::class);
    }
}
