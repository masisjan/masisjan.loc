<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = ['tab_name', 'title',	'image', 'address', 'phone', 'email',
        'site', 'fb', 'cord0', 'cord1', 'monday', 'tuesday', 'wednesday', 'director',
        'thursday', 'friday', 'saturday', 'sunday', 'text', 'publish', 'count', 'rating' ];
}
