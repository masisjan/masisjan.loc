<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(5);
        return view('users.events.index', compact('events'));
    }

    public function create()
    {
        $event = new Event();
        return view('users.events.create', compact('event'));
    }

    public function update($id, Request $request)
    {
        $event = Event::findOrFail($id);
        $user_id = Auth::id();

        $request->validate([
            'image'       => 'mimes:jpeg,png,jpg|max:2048',
            'title'       => 'required|max:120',
            'text'        => 'nullable|min:99',
            'word'        => 'nullable|min:10|max:120',
            'images'      => 'array|max:2',
            'images.*'    => 'mimes:jpeg,png,jpg|max:2048',
        ]);

//        glxavor nkar@ sarqelu hamar

        $image_name = "";
        if ($request->file('image')) {
            Storage::disk('public')->delete('uploads/image/events/' . $event->image);
            $img_file = Image::make($request->file('image'))->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img_file->resizeCanvas(null, 350);
            $image_name = date('Y-m-d-H-i-s') . '.jpg';
            $img_file->save('storage/uploads/image/events/'. $image_name, 60);
        }else if ($event->image && $request->image_delete !== 'none'){
            $image_name = $event->image;
        }else if ($request->image_delete == 'none'){
            Storage::disk('public')->delete('uploads/image/events/' . $event->image);
            $image_name = "";
        }else{
            $image_name = "";
        }

        //        nkarner@ sarqelu hamar pord

        $img_arr_string = "";
        if ($request->file('images')) {
            $images = explode(',', $event->images);
            foreach ($images as $img) {
                Storage::disk('public')->delete('uploads/image/events/' .  $img);
            }
            $img_arr = array();
            foreach ($request->File('images') as $img) {
                $imgs_file = Image::make($img)->resize(700, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $imgs_file->resizeCanvas(null, 350);
                $imgs_name = rand(111111, 999999) . '.jpg';
                $imgs_file->save('storage/uploads/image/events/'. $imgs_name, 60);
                array_push($img_arr, "$imgs_name");
            }
            $img_arr_string = implode(",", $img_arr);
        }else if ($event->images && $request->images_delete !== 'none'){
            $img_arr_string = $event->images;
        }else if ($request->images_delete == 'none'){
            $images = explode(',', $event->images);
            foreach ($images as $img) {
                Storage::disk('public')->delete('uploads/image/events/' .  $img);
            }
            $img_arr_string = "";
        }else{
            $img_arr_string = "";
        }

        $short_text = mb_substr($request->text, 0, 160, "utf-8") . '...';


        $form_data = array(
            'image'                  =>  $image_name,
            'title'                  =>  $request->title,
            'text'                   =>  $request->text,
            'images'                 =>  $img_arr_string,
            'short_text'             =>  $short_text,
            'text_video'             =>  $request->text_video,
            'video'                  =>  $request->video,
            'word'                   =>  $request->word,
            'publish'                =>  $request->publish,
            'user_id'                =>  $user_id,
        );

        $event->update($form_data);

        return redirect()->route('users.events.index', compact(  'image_name', 'img_arr_string','short_text'))
            ->with('message', "Contact has been updated successfully");
    }

    public function edit($id)
    {
        $event= Event::findOrFail($id);
        $images = explode(',', $event->images);

        return view('users.events.edit', compact('event', 'images', 'allcategories', 'catEvents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'        => 'mimes:jpeg,png,jpg|max:2048',
            'title'        => 'required|min:10|max:120',
            'text'         => 'nullable|min:99',
            'organizer'    => 'nullable|max:99',
            'date_start'   => 'nullable|max:99',
            'date_end'     => 'nullable|max:99',
            'value'        => 'nullable|max:30',
        ]);


        $user_id = Auth::id();

//        glxavor nkar@ sarqelu hamar
        $image_name = "";
        if ($request->file('image')) {
            $img_file = Image::make($request->file('image'))->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img_file->resizeCanvas(null, 350);
            $image_name = date('Y-m-d-H-i-s') . '.jpg';
            $img_file->save('storage/uploads/image/events/'. $image_name, 60);
        }

        $short_text = mb_substr($request->text, 0, 160, "utf-8") . '...';

        $form_data = array(
            'image'                  =>  $image_name,
            'title'                  =>  $request->title,
            'text'                   =>  $request->text,
            'short_text'             =>  $short_text,
            'organizer'              =>  $request->organizer,
            'date_start'             =>  $request->date_start,
            'date_end '              =>  $request->date_end,
            'value'                  =>  $request->value,
            'cord0'                  =>  $request->cord0,
            'cord1'                  =>  $request->cord1,
            'publish'                =>  $request->publish,
            'user_id'                =>  $user_id,
        );

        $event = Event::create($form_data);

        return redirect()->route('users.events.index', compact(  'image_name'))
            ->with('message', "Contact has been updated successfully");
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        $images = explode(',', $event->images);
        $url = $event->event_url;
        $event_url = parse_url($url, PHP_URL_HOST);

        return view('users.events.show', compact('event','images', 'event_url'));
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        if ($event->image) {
            Storage::disk('public')->delete('uploads/image/events/' . $event->image);
        }
        if ($event->images) {
            $images = explode(',', $event->images);
            foreach ($images as $img) {
                Storage::disk('public')->delete('uploads/image/events/' .  $img);
            }
        }
        $event = Event::findOrFail($id)->delete();
        return redirect()->route('users.events.index')->with('message', "Contact has been deleted successfully");
    }
//.........................................
    public function news()
    {
        $events = Event::where('publish', 'yes')->latest()->paginate(10);
        return view('all.news.index', compact('events'));
    }

    public function news_show($id)
    {
        $event = Event::findOrFail($id);
        $images = explode(',', $event->images);
        $url = $event->event_url;
        $event_url = parse_url($url, PHP_URL_HOST);
        $events = Event::where('publish', 'yes')->latest()->take(6)->get();
        $event->count = $event->count +1;
        $event->save();
        if($event->publish == 'yes')
            return view('all.news.show', compact('event', 'images', 'event_url','events'));
        else
            return redirect()->route('news');
    }
}
