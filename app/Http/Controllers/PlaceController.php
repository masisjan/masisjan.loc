<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::latest()->paginate(10);
        return view('users.places.index', compact('places'));
    }

    public function create()
    {
        $place = new Place();
        return view('users.places.create', compact('place'));
    }

    public function update($id, Request $request)
    {
        $place = Place::findOrFail($id);
//        $request->validate([
//            'name' => 'required',
//            'date' => 'required',
//            'image' => 'mimes:jpeg,png,jpg',
//            'friend_id' => 'required|exists:friends,id'
//        ]);

        $image_new_name = "";
        if ($request->file('image')) {
            Storage::disk('public')->delete('uploads/image/user/place' . '/' . $place->image);
            $image_new_name = date('Y-m-d-H-i-s') . '.' . $request->file('image')->getClientOriginalExtension();
            $image_path = $request->file('image')->storeAs('uploads/image/user/place', $image_new_name, 'public');
        }

        if (!$request->file('image')) {
            $image_new_name = $place->image;
        }

        $form_data = array(
            'title'                  =>  $request->title,
            'image'                  =>  $image_new_name,
        );

        $place->update($form_data);
        return redirect()->route('users.places.index')->with('message', "Contact has been updated successfully");
    }

    public function edit($id)
    {
        $place = Place::findOrFail($id);

        return view('users.places.edit', compact('place'));
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
            $image_path = $request->file('image')->storeAs('uploads/image/user/place', $image_new_name, 'public');
        }

        $form_data = array(
            'title'                  =>  $request->title,
            'image'                  =>  $image_new_name,
        );

        Place::create($form_data);

        return redirect()->route('users.places.index', compact('image_path','image_new_name'))
            ->with('message', "Contact has been updated successfully");
    }

    public function show($id)
    {
        $place = Place::findOrFail($id);
        return view('users.places.show', compact('place'));
    }

    public function destroy($id)
    {
        $place = Place::findOrFail($id);
        Storage::disk('public')->delete('uploads/image/user/place/' . $place->image);
        $place = Place::findOrFail($id)->delete();
        return redirect()->route('users.places.index')->with('message', "Contact has been deleted successfully");
    }

    public function places_show()
    {
//        $place = Place::findOrFail($id);
        $place = Place::inRandomOrder()->first();
        $og_title = $place->title;
        $og_description = 'Մասիս քաղաքի պատահական վայրերից մեկը';
        $og_image = asset('storage/uploads/image/user/place/' . $place->image);
        return view('all.places.show', compact('place', 'og_description', 'og_image', 'og_title'));
    }
}
