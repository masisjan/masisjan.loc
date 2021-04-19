<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\My_count;
use App\Models\Post;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('publish', 'yes')->latest()->take(6)->get();
        $words = Word::latest()->paginate(10);
        $og_title = 'masisjan, Մասիս քաղաքի տեղեկատվական և լրատվական կայք';
        $og_description = 'Մասիս քաղաքի տեղեկատվական և լրատվական կայք է, որը գործում է սկսած 2018 թվականից';
        return view('welcome', compact( 'words', 'posts', 'og_description', 'og_title'));
    }

    public function menu()
    {
        $allMenus = Menu::where('table_id','>', 0)->get()->sortByDesc('count');
        $abcMenus = Menu::where('category_id', 0)->get()->sortBy('title');
        $myMenus = My_count::where('user_id', Auth::id())->get()->sortByDesc('count');
        return view('all.menu', compact( 'allMenus', 'myMenus', 'abcMenus'));
    }
}
