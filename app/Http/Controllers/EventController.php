<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
            'image'        => 'mimes:jpeg,png,jpg|max:2048',
            'title'        => 'required|min:10|max:120',
            'text'         => 'nullable|min:99',
            'organizer'    => 'nullable|max:99',
            'date_start'   => 'nullable|max:99',
            'date_end'     => 'nullable|max:99',
            'value'        => 'nullable|max:30',
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

        $short_text = mb_substr($request->text, 0, 160, "utf-8") . '...';

        $form = array(
            'image'                  =>  $image_name,
            'title'                  =>  $request->title,
            'text'                   =>  $request->text,
            'short_text'             =>  $short_text,
            'organizer'              =>  $request->organizer,
            'date_start'             =>  $request->date_start,
            'date_end'               =>  $request->date_end,
            'value'                  =>  $request->value,
            'cord0'                  =>  $request->cord0,
            'cord1'                  =>  $request->cord1,
            'publish'                =>  $request->publish,
            'user_id'                =>  $user_id,
        );

        $event->update($form);

        return redirect()->route('users.events.index', compact(  'image_name', 'short_text'))
            ->with('message', "Contact has been updated successfully");
    }

    public function edit($id)
    {
        $event= Event::findOrFail($id);
        return view('users.events.edit', compact('event'));
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

        $form = array(
            'image'                  =>  $image_name,
            'title'                  =>  $request->title,
            'text'                   =>  $request->text,
            'short_text'             =>  $short_text,
            'organizer'              =>  $request->organizer,
            'date_start'             =>  $request->date_start,
            'date_end'               =>  $request->date_end,
            'value'                  =>  $request->value,
            'cord0'                  =>  $request->cord0,
            'cord1'                  =>  $request->cord1,
            'publish'                =>  $request->publish,
            'user_id'                =>  $user_id,
        );

        $event = Event::create($form);

        return redirect()->route('users.events.index', compact(  'image_name'))
            ->with('message', "Contact has been updated successfully");
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        $images = explode(',', $event->images);

        return view('users.events.show', compact('event','images', 'event_url'));
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        if ($event->image) {
            Storage::disk('public')->delete('uploads/image/events/' . $event->image);
        }
        $event = Event::findOrFail($id)->delete();
        return redirect()->route('users.events.index')->with('message', "Contact has been deleted successfully");
    }
//.........................................
    public function events()
    {
        $events = Event::where('publish', 'yes')->latest()->paginate(10);
        $og_title = 'Մասիսջան, Մասիս քաղաքի բոլոր միջոցառումները մեկ վայրում';
        $og_description = 'Այստեղ կարող եք տեղեկատվություն գտնել Մասիս քաղաքի միջոցառումների մասին․․․';
        return view('all.events.index', compact('events', 'og_description', 'og_title'));
    }

    public function events_show($id)
    {
        $event = Event::findOrFail($id);
        if($event->publish == 'yes') {
            $event->count = $event->count + 1;
            $event->save();
            $og_title = $event->title;
            $og_description = mb_substr($event->text, 0, 160, "utf-8") . '...';
            if($event->image){
                $og_image = asset('storage/uploads/image/events/' . $event->image);
            }else{
                $og_image = asset('image/app/default-post.jpg');
            }
            return view('all.events.show', compact('event', 'og_title', 'og_description', 'og_image'));
        }else
            return redirect()->route('events');
    }
}
