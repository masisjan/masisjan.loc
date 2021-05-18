<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdController extends Controller
{
    public function index()
    {
        if(auth()->user()->type == 'admin'){
            $ads = Ad::latest()->paginate(5);
        }else{
            $ads = Ad::where('user_id', auth()->user()->id)->latest()->paginate(5);
        }
        return view('users.ads.index', compact('ads'));
    }

    public function create()
    {
        $ad = new Ad();
        return view('users.ads.create', compact('ad'));
    }

    public function update($id, Request $request)
    {
        $ad = Ad::findOrFail($id);
        $user_id = Auth::id();

        $request->validate([
            'image'        => 'mimes:jpeg,png,jpg,gif|max:2048',
            'href'         => 'nullable|url',
        ]);

//        glxavor nkar@ sarqelu hamar

        $image_name = "";
        if ($request->file('image')) {
            Storage::disk('public')->delete('uploads/image/ads/' . $ad->image);
            $img_file = Image::make($request->file('image'))->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img_file->resizeCanvas(240, null);
            $image_name = rand(111111, 999999) . '.' . date('Y-m-d-H-i-s') . '.jpg';
            $img_file->save('storage/uploads/image/ads/'. $image_name, 70);
        }else if ($ad->image && $request->image_delete !== 'none'){
            $image_name = $ad->image;
        }else if ($request->image_delete == 'none'){
            Storage::disk('public')->delete('uploads/image/ads/' . $ad->image);
            $image_name = "";
        }else{
            $image_name = "";
        }

        $form = array(
            'image'                  =>  $image_name,
            'href'                   =>  $request->href,
            'user_id'                =>  $user_id,
        );

        $ad->update($form);

        return redirect()->route('users.ads.index', compact(  'image_name'))
            ->with('message', "Հաջողությամբ թարմացվել է");
    }

    public function edit($id)
    {
        $ad= Ad::findOrFail($id);
        if(auth()->user()->type == 'admin' || auth()->user()->id == $ad->user_id) {
        return view('users.ads.edit', compact('ad'));
        }else{
            return redirect()->route('users.ads.index');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'        => 'mimes:jpeg,png,jpg,gif|max:2048',
            'href'         => 'nullable|url',
        ]);

        $user_id = Auth::id();

//        glxavor nkar@ sarqelu hamar
        $image_name = "";
        if ($request->file('image')) {
            $img_file = Image::make($request->file('image'))->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img_file->resizeCanvas(240, null);
            $image_name = rand(111111, 999999) . '.' . date('Y-m-d-H-i-s') . '.jpg';
            $img_file->save('storage/uploads/image/ads/'. $image_name, 70);
        }

        $form = array(
            'image'                  =>  $image_name,
            'href'                   =>  $request->href,
            'user_id'                =>  $user_id,
        );

        $ad = Ad::create($form);

        return redirect()->route('users.ads.index', compact(  'image_name'))
            ->with('message', "Հաջողությամբ ավելացվել է");
    }

    public function show($id)
    {
        $ad = Ad::findOrFail($id);
        if(auth()->user()->type == 'admin' || auth()->user()->id == $ad->user_id) {
            return view('users.ads.show', compact('ad'));
        }else{
            return redirect()->route('users.ads.index');
        }
    }

    public function destroy($id)
    {
        $ad = Ad::findOrFail($id);
        if ($ad->user_id != Auth::id() || auth()->user()->type != 'admin') {
            return redirect()->back();
        }
        if ($ad->image) {
            Storage::disk('public')->delete('uploads/image/ads/' . $ad->image);
        }
        $ad = Ad::findOrFail($id)->delete();
        return redirect()->route('users.ads.index')->with('message', "Հաջողությամբ հեռացվել է");
    }

}
