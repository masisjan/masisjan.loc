<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\My_count;
use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SectionController extends Controller
{
    public function index(Request $request)
    {
        $tab = substr(strrchr($request->fullUrl(),'?'), 1, -1);
        $sections = Section::where('tab_name', $tab)->latest()->paginate(5);
        return view('users.sections.index', compact('sections', 'tab'));
    }

    public function create(Request $request)
    {
        $tab = substr(strrchr($request->fullUrl(),'?'), 1, -1);
        $section = new Section();
        return view('users.sections.create', compact('section', 'tab'));
    }

    public function update($id, Request $request)
    {
        $section = Section::findOrFail($id);
        $user_id = Auth::id();

        $request->validate([
            'image'        => 'mimes:jpeg,png,jpg|max:2048',
            'title'        => 'required|min:5|max:120',
            'text'         => 'nullable|min:30',
        ]);

//        glxavor nkar@ sarqelu hamar

        $image_name = "";
        if ($request->file('image')) {
            Storage::disk('public')->delete('uploads/image/sections/' . $section->image);
            $img_file = Image::make($request->file('image'))->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img_file->resizeCanvas(null, 350);
            $img_file->insert('image/app/watermark.png');
            $image_name = rand(111111, 999999) . '.' . date('Y-m-d-H-i-s') . '.jpg';
            $img_file->save('storage/uploads/image/sections/'. $image_name, 70);
        }else if ($section->image && $request->image_delete !== 'none'){
            $image_name = $section->image;
        }else if ($request->image_delete == 'none'){
            Storage::disk('public')->delete('uploads/image/sections/' . $section->image);
            $image_name = "";
        }else{
            $image_name = "";
        }

        $img_arr_string = "";
        if ($request->file('images')) {
            $images = explode(',', $section->images);
            foreach ($images as $img) {
                Storage::disk('public')->delete('uploads/image/sections/' .  $img);
            }
            $img_arr = array();
            foreach ($request->File('images') as $img) {
                $imgs_file = Image::make($img)->resize(700, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $imgs_file->resizeCanvas(null, 350);
                $imgs_file->insert('image/app/watermark.png');
                $imgs_name = rand(111111, 999999) . '.jpg';
                $imgs_file->save('storage/uploads/image/sections/'. $imgs_name, 60);
                array_push($img_arr, "$imgs_name");
            }
            $img_arr_string = implode(",", $img_arr);
        }else if ($section->images && $request->images_delete !== 'none'){
            $img_arr_string = $section->images;
        }else if ($request->images_delete == 'none'){
            $images = explode(',', $section->images);
            foreach ($images as $img) {
                Storage::disk('public')->delete('uploads/image/sections/' .  $img);
            }
            $img_arr_string = "";
        }else{
            $img_arr_string = "";
        }

        $form = array(
            'title'                  =>  $request->title,
            'image'                  =>  $image_name,
            'images'                 =>  $img_arr_string,
            'cord0'                  =>  $request->cord0,
            'cord1'                  =>  $request->cord1,
            'text'                   =>  $request->text,
            'publish'                =>  $request->publish,
        );

        $section->update($form);
        return redirect()->route('users.sections.index', $section->tab_name)
            ->with('message', "Հաջողությամբ թարմացվել է");
    }

    public function edit($id)
    {
        $section = Section::findOrFail($id);
        $images = explode(',', $section->images);
        $tab = $section->tab_name;
        return view('users.sections.edit', compact('section', 'tab', 'images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'        => 'mimes:jpeg,png,jpg|max:2048',
            'title'        => 'required|min:5|max:120',
            'text'         => 'nullable|min:30',
        ]);

        $tab = substr(strrchr($request->fullUrl(),'?'), 1, -1);

//        glxavor nkar@ sarqelu hamar
        $image_name = "";
        if ($request->file('image')) {
            $img_file = Image::make($request->file('image'))->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img_file->resizeCanvas(null, 350);
            $img_file->insert('image/app/watermark.png');
            $image_name = rand(111111, 999999) . '.' . date('Y-m-d-H-i-s') . '.jpg';
            $img_file->save('storage/uploads/image/sections/'. $image_name, 70);
        }

        $img_arr_string = "";
        if ($request->file('images')) {
            $img_arr = array();
            foreach ($request->File('images') as $img) {

                $imgs_file = Image::make($img)->resize(700, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $imgs_file->resizeCanvas(null, 350);
                $imgs_file->insert('image/app/watermark.png');
                $imgs_name = rand(111111, 999999) . '.jpg';
                $imgs_file->save('storage/uploads/image/sections/'. $imgs_name, 60);
                array_push($img_arr, "$imgs_name");
            }
            $img_arr_string = implode(",", $img_arr);
        }

        $form = array(
            'title'                  =>  $request->title,
            'image'                  =>  $image_name,
            'images'                 =>  $img_arr_string,
            'cord0'                  =>  $request->cord0,
            'cord1'                  =>  $request->cord1,
            'text'                   =>  $request->text,
            'publish'                =>  $request->publish,
            'tab_name'               =>  $tab,
        );

        $section = Section::create($form);

        return redirect()->route('users.sections.index', $tab)
            ->with('message', "Հաջողությամբ ավելացվել է");
    }

    public function show($id)
    {
        $section = Section::findOrFail($id);
        $images = explode(',', $section->images);
        $tab = $section->tab_name;

        return view('users.sections.show', compact('section','tab','images'));
    }

    public function destroy($id)
    {
        $section = Section::findOrFail($id);
        $tab = $section->tab_name;
        if ($section->image) {
            Storage::disk('public')->delete('uploads/image/sections/' . $section->image);
        }
        if ($section->images) {
            $images = explode(',', $section->images);
            foreach ($images as $img) {
                Storage::disk('public')->delete('uploads/image/sections/' .  $img);
            }
        }
        $section = Section::findOrFail($id)->delete();
        return redirect()->route('users.sections.index', $tab)->with('message', "Հաջողությամբ հեռացվել է");
    }
//.........................................
    public function sections(Request $request)
    {
        $tab = substr(strrchr($request->fullUrl(),'?'), 1, -1);
        $sections = Section::where('publish', 'yes')->where('tab_name', $tab)->paginate(10);
        return view('all.sections.index', compact('sections'));
    }

    public function sections_show($id, Request $request)
    {
        $section = Section::findOrFail($id);
        if($section->publish == 'yes') {
            $section->count = $section->count + 1;
            $section->save();
            $images = explode(',', $section->images);
            $table_id = $section->tab_name;
            $table_name = "sections";
            $og_title = $section->title;
            $og_description = mb_substr($section->text, 0, 160, "utf-8") . '...';
            if($section->image){
                $og_image = asset('storage/uploads/image/sections/' . $section->image);
            }else{
                $og_image = asset('image/app/default-section.jpg');
            }
            $menu = Menu::updateOrInsert(['table_id' => $table_id])->increment('count');
            if(Auth::check()) {
                $my_count = My_count::updateOrInsert(['user_id' => Auth::id(), 'menu_id' => $table_id])->increment('count');
            }
            return view('all.sections.show', compact('section','table_id', 'id', 'images',
                                                            'table_name', 'og_title', 'og_description', 'og_image'));
        }else
            return redirect()->back();
    }
}
