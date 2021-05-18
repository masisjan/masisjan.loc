<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Page extends Model
{
    use HasFactory;
    use Searchable;
    protected $fillable = ['tab_name', 'title',	'image', 'address', 'phone', 'email',
        'site', 'fb', 'cord0', 'cord1', 'monday', 'tuesday', 'wednesday', 'director', 'qr_cod',
        'thursday', 'friday', 'saturday', 'sunday', 'text', 'publish', 'count', 'rating' ];

    public function someFunction()
    {
        return 'pages';
    }
}
