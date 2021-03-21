<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class My_count extends Model
{
    use HasFactory;
    protected $fillable = [ 'user_id', 'menu_id', 'count' ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
