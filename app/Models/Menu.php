<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'icon', 'text', 'href', 'count', 'category_id'];

    public function subcategory(){
        return $this->hasMany(Menu::class,'category_id');
    }
}
