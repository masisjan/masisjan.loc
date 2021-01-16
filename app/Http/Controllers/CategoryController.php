<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(5);
        return view('users.categories.index', compact('categories'));
    }

    public function create()
    {
        $category = new Category();
        return view('users.categories.create', compact('category'));
    }

    public function update($id, Request $request)
    {
        $category = Category::findOrFail($id);
//        $request->validate([
//            'name' => 'required',
//            'date' => 'required',
//            'image' => 'mimes:jpeg,png,jpg',
//            'friend_id' => 'required|exists:friends,id'
//        ]);

        $data = $request->all();
        $category->update($data);
        return redirect()->route('users.categories.index')->with('message', "Contact has been updated successfully");
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('users.categories.edit', compact('category'));
    }

    public function store(Request $request)
    {
//        $request->validate([
//            'name' => 'required',
//            'date' => 'required',
//            'image' => 'required|mimes:jpeg,png,jpg',
//            'friend_id' => 'required|exists:friends,id'
//        ]);

        $data = $request->all();
//        dd($request);
        Category::create($data);

        return redirect()->route('users.categories.index', compact('data'))
            ->with('message', "Contact has been updated successfully");
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id)->delete();
        return redirect()->route('users.categories.index')->with('message', "Contact has been deleted successfully");
    }
}
