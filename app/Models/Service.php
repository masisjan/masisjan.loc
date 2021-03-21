<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['tab_name', 'title',	'image', 'address', 'phone', 'email', 'user_id', 'confirm',
        'site', 'fb', 'cord0', 'cord1', 'monday', 'tuesday', 'wednesday', 'director', 'qr_cod',
        'thursday', 'friday', 'saturday', 'sunday', 'text', 'publish', 'count', 'rating' ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
