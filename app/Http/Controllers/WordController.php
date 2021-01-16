<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    public function index()
    {
        $words = Word::latest()->paginate(10);
        return view('users.words.index', compact('words'));
    }

    public function create()
    {
        $word = new Word();
        return view('users.words.create', compact('word'));
    }

    public function update($id, Request $request)
    {
        $word = Word::findOrFail($id);
//        $request->validate([
//            'name' => 'required',
//            'date' => 'required',
//            'image' => 'mimes:jpeg,png,jpg',
//            'friend_id' => 'required|exists:friends,id'
//        ]);

        $data = $request->all();
        $word->update($data);
        return redirect()->route('users.words.index')->with('message', "Contact has been updated successfully");
    }

    public function edit($id)
    {
        $word = Word::findOrFail($id);
        return view('users.words.edit', compact('word'));
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
        Word::create($data);

        return redirect()->route('users.words.index', compact('data'))
            ->with('message', "Contact has been updated successfully");
    }

    public function show($id)
    {
        $word = Word::findOrFail($id);
        return view('users.words.show', compact('word'));
    }

    public function destroy($id)
    {
        $word = Word::findOrFail($id)->delete();
        return redirect()->route('users.words.index')->with('message', "Contact has been deleted successfully");
    }
}
