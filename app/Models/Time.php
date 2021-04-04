<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;
    protected $fillable = ['01', '02',	'03', '04', '05', '06', '07', '08',
                          '09', '10', '11', '12', '13', '14', '15', '16', '17',
                          '18', '19', '20', '21', '22', '23', '24', '25' ];

    public function stop()
    {
        return $this->belongsTo(Stop::class);
    }
}
