<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Post;
use App\Models\Word;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('publish', 'yes')->latest()->take(6)->get();
        $words = Word::latest()->paginate(10);
        return view('welcome', compact( 'words', 'posts'));
    }
}
