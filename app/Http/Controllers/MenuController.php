<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::latest()->paginate(10);
        return view('admins.menus.index', compact('menus'));
    }

    public function create()
    {
        $menus = Menu::orderBy('name')->get();
        $menu = new Menu();
        return view('admins.menus.create', compact('menu','menus'));
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
            Storage::disk('public')->delete('uploads/image/admin/menu' . '/' . $menu->image);
            $image_new_name = date('Y-m-d-H-i-s') . '.' . $request->file('image')->getClientOriginalExtension();
            $image_path = $request->file('image')->storeAs('uploads/image/admin/menu', $image_new_name, 'public');
        }

        if (!$request->file('image')) {
            $image_new_name = $menu->image;
        }

        $form_data = array(
            'title'                  =>  $request->title,
            'image'                  =>  $image_new_name,
            'icon'                   =>  $request->icon,
            'text'                   =>  $request->text,
            'href'                   =>  $request->href,
            'parent_id'              =>  $request->parent_id,
        );

        $menu->update($form_data);
        return redirect()->route('admins.menus.index')->with('message', "Contact has been updated successfully");
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admins.menus.edit', compact('menu'));
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
            $image_path = $request->file('image')->storeAs('uploads/image/admin/menu', $image_new_name, 'public');
        }

        $form_data = array(
            'title'                  =>  $request->title,
            'image'                  =>  $image_new_name,
            'icon'                   =>  $request->icon,
            'text'                   =>  $request->text,
            'href'                   =>  $request->href,
            'parent_id'              =>  $request->parent_id,
        );

        Menu::create($form_data);

        return redirect()->route('admins.menus.index', compact('image_path','image_new_name'))
            ->with('message', "Contact has been updated successfully");
    }

    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        return view('admins.menus.show', compact('menu'));
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        Storage::disk('public')->delete('uploads/image/admin/menu/' . $menu->image);
        $menu = Menu::findOrFail($id)->delete();
        return redirect()->route('admins.menus.index')->with('message', "Contact has been deleted successfully");
    }
}
