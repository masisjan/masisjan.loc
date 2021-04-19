<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function all()
    {
        if(auth()->user()->type == 'admin'){
            $abcMenus = Menu::where('category_id', 0)->get()->sortBy('title');
        }else{
            $abcMenus = Menu::where('category_id', 0)->where('type','!=', 'a')->get()->sortBy('title');
        }
        return view('users.all', compact( 'abcMenus'));
    }

    public function setting()
    {
        $abcMenus = Menu::where('category_id', 0)->where('type','!=', 'a')->get()->sortBy('title');
        return view('users.user.setting', compact( 'abcMenus'));
    }
}
