<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::latest()->paginate(10);
        return view('users.menus.index', compact('menus'));
    }

    public function create()
    {
        $menu = new Menu();
        $parentCategories = Menu::where('category_id',0)->get();
        return view('users.menus.create', compact('menu', 'parentCategories'));
    }

    public function update($id, Request $request)
    {
        $menu = Menu::findOrFail($id);
//        $request->validate([
//            'name' => 'required',
//            'date' => 'required',
//            'image' => 'mimes:jpeg,png,jpg',
//            'friend_id' => 'required|exists:friends,id'
//        ]);

        $image_new_name = "";
        if ($request->file('image')) {
            Storage::disk('public')->delete('uploads/image/user/menu' . '/' . $menu->image);
            $image_new_name = date('Y-m-d-H-i-s') . '.' . $request->file('image')->getClientOriginalExtension();
            $image_path = $request->file('image')->storeAs('uploads/image/user/menu', $image_new_name, 'public');
        }

        if (!$request->file('image')) {
            $image_new_name = $menu->image;
        }

        if(is_numeric($request->category_id)){
            $category_id = $request->category_id;
        }else{
            $category_id = $menu->category_id;
        }

        $form_data = array(
            'title'                  =>  $request->title,
            'image'                  =>  $image_new_name,
            'icon'                   =>  $request->icon,
            'text'                   =>  $request->text,
            'href'                   =>  $request->href,
            'type'                   =>  $request->type,
            'table_id'               =>  $request->table_id,
            'category_id'            =>  $category_id,
        );

        $menu->update($form_data);
        return redirect()->route('users.menus.index')->with('message', "Contact has been updated successfully");
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $cat_id = $menu->category_id;
        $parent_cat = Menu::where('id', $cat_id)->first();
        $parentCategories = Menu::where('category_id',0)->get();
        return view('users.menus.edit', compact('menu', 'parentCategories', 'parent_cat'));
    }

    public function store(Request $request)
    {
//        $request->validate([
//            'name' => 'required',
//            'date' => 'required',
//            'image' => 'required|mimes:jpeg,png,jpg',
//            'friend_id' => 'required|exists:friends,id'
//        ]);

        $image_new_name = "";
        $image_path = "";
        if ($request->file('image')) {
            $image_new_name = date('Y-m-d-H-i-s') . '.' . $request->file('image')->getClientOriginalExtension();
            $image_path = $request->file('image')->storeAs('uploads/image/user/menu', $image_new_name, 'public');
        }

        if($request->category_id === null){
            $category_id = 0;
        }else{
            $category_id = $request->category_id;
        }

        $form_data = array(
            'title'                  =>  $request->title,
            'image'                  =>  $image_new_name,
            'icon'                   =>  $request->icon,
            'text'                   =>  $request->text,
            'href'                   =>  $request->href,
            'type'                   =>  $request->type,
            'table_id'               =>  $request->table_id,
            'category_id'            =>  $category_id,
        );

        Menu::create($form_data);

        return redirect()->route('users.menus.index', compact('image_path','image_new_name'))
            ->with('message', "Contact has been updated successfully");
    }

    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        $cat_id = $menu->category_id;
        $parent_cat = Menu::where('id', $cat_id)->first();
        return view('users.menus.show', compact('menu', 'parent_cat'));
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        Storage::disk('public')->delete('uploads/image/user/menu/' . $menu->image);
        $menu = Menu::findOrFail($id)->delete();
        return redirect()->route('users.menus.index')->with('message', "Contact has been deleted successfully");
    }
}
