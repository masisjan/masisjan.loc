<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'icon', 'text', 'href', 'count', 'category_id', 'table_id', 'type'];

    public function subcategory(){
        return $this->hasMany(Menu::class,'category_id');
    }

    public function my_count()
    {
        return $this->hasMany(My_count::class, 'menu_id');
    }
}
