<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Section extends Model
{
    use HasFactory;
    use Searchable;
    protected $fillable = ['tab_name', 'title',	'image', 'images', 'text', 'publish', 'count', 'cord0', 'cord1' ];

    public function someFunction()
    {
        return 'sections';
    }
}
