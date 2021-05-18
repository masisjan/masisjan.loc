<?php

namespace App\Http\Controllers;

use App\Models\Ally;
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
        $words = Word::latest()->paginate(10);
        $allies = Ally::inRandomOrder()->get();
        $og_title = 'masisjan, Մասիս քաղաքի տեղեկատվական և լրատվական կայք';
        $og_description = 'Մասիս քաղաքի տեղեկատվական և լրատվական կայք է, որը գործում է սկսած 2018 թվականից';
        return view('welcome', compact( 'words', 'og_description', 'og_title', 'allies'));
    }

    public function menu()
    {
        $allMenus = Menu::where('table_id','>', 0)->get()->sortByDesc('count');
        $abcMenus = Menu::where('category_id', 0)->get()->sortBy('title');
        $hotMenus = Menu::where('type', 'k')->get()->sortByDesc('count');
        $myMenus = My_count::where('user_id', Auth::id())->get()->sortByDesc('count');
        return view('all.menu', compact( 'allMenus', 'myMenus', 'abcMenus', 'hotMenus'));
    }
}
