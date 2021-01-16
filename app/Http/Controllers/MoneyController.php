<?php

namespace App\Http\Controllers;

use App\Models\Money;
use Illuminate\Http\Request;

class MoneyController extends Controller
{
    public function index()
    {
        $money = Money::all();
        return view('users.money.index', compact('money'));
    }

    public function create()
    {
        $money = new Money();
        return view('users.money.create', compact('money'));
    }

    public function update($id, Request $request)
    {
        $money = Money::findOrFail($id);
//        $request->validate([
//            'name' => 'required',
//            'date' => 'required',
//            'image' => 'mimes:jpeg,png,jpg',
//            'friend_id' => 'required|exists:friends,id'
//        ]);

        $data = $request->all();
        $money->update($data);
        return redirect()->route('users.money.index')->with('message', "Contact has been updated successfully");
    }

    public function edit($id)
    {
        $money = Money::findOrFail($id);
        return view('users.money.edit', compact('money'));
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
        Money::create($data);

        return redirect()->route('users.money.index', compact('data'))
            ->with('message', "Contact has been updated successfully");
    }

    public function destroy($id)
    {
        $money = Money::findOrFail($id)->delete();
        return redirect()->route('users.money.index')->with('message', "Contact has been deleted successfully");
    }
}
