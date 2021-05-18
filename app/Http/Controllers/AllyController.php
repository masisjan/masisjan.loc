<?php

namespace App\Http\Controllers;

use App\Models\Ally;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AllyController extends Controller
{
    public function index()
    {
        $allies = Ally::latest()->paginate(10);
        return view('users.allies.index', compact('allies'));
    }

    public function create()
    {
        $ally = new Ally();
        return view('users.allies.create', compact('ally'));
    }

    public function update($id, Request $request)
    {
        $ally = Ally::findOrFail($id);

        $image_name = "";
        if ($request->file('image')) {
            Storage::disk('public')->delete('uploads/image/user/ally/' . $ally->image);
            $img_file = Image::make($request->file('image'))->resize(250, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_name = date('Y-m-d-H-i-s') . '.png';
            $img_file->save('storage/uploads/image/user/ally/'. $image_name);
        }else if ($ally->image && $request->image_delete !== 'none'){
            $image_name = $ally->image;
        }else if ($request->image_delete == 'none'){
            Storage::disk('public')->delete('uploads/image/user/ally/' . $ally->image);
            $image_name = "";
        }else{
            $image_name = "";
        }

        $form_data = array(
            'title'       =>  $request->title,
            'image'       =>  $image_name,
            'href'        =>  $request->href,
        );

        $ally->update($form_data);
        return redirect()->route('users.allies.index')->with('message', "Contact has been updated successfully");
    }

    public function edit($id)
    {
        $ally = Ally::findOrFail($id);
        return view('users.allies.edit', compact('ally'));
    }

    public function store(Request $request)
    {
        $image_name = "";
        if ($request->file('image')) {
            $img_file = Image::make($request->file('image'))->resize(250, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_name = date('Y-m-d-H-i-s') . '.png';
            $img_file->save('storage/uploads/image/user/ally/'. $image_name);
        }

        $form_data = array(
            'title'     =>  $request->title,
            'image'     =>  $image_name,
            'href'      =>  $request->href,
        );

        Ally::create($form_data);
        return redirect()->route('users.allies.index')
            ->with('message', "Contact has been updated successfully");
    }

    public function show($id)
    {
        $ally = Ally::findOrFail($id);
        return view('users.allies.show', compact('ally'));
    }

    public function destroy($id)
    {
        $ally = Ally::findOrFail($id);
        Storage::disk('public')->delete('uploads/image/user/ally/' . $ally->image);
        $ally = Ally::findOrFail($id)->delete();
        return redirect()->route('users.allies.index')->with('message', "Contact has been deleted successfully");
    }
}
