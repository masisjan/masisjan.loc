<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FlightController extends Controller
{
    public function index()
    {
        $flights = Flight::latest()->paginate(5);
        return view('users.flights.index', compact('flights'));
    }

    public function create()
    {
        $flight = new Flight();
        return view('users.flights.create', compact('flight'));
    }

    public function update($id, Request $request)
    {
        $flight = Flight::findOrFail($id);
        $user_id = Auth::id();

        $request->validate([
            'image'        => 'mimes:jpeg,png,jpg|max:2048',
            'director'     => 'nullable|min:3|max:90',
            'title'        => 'required|min:5|max:120',
            'address'      => 'required|max:99',
            'phone'        => 'numeric',
            'email'        => 'nullable|email',
            'site'         => 'nullable|url',
            'fb'           => 'nullable|url',
            'text'         => 'nullable|min:30',
        ]);

//        glxavor nkar@ sarqelu hamar

        $image_name = "";
        if ($request->file('image')) {
            Storage::disk('public')->delete('uploads/image/flights/' . $flight->image);
            $img_file = Image::make($request->file('image'))->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img_file->resizeCanvas(null, 350);
            $image_name = rand(111111, 999999) . '.' . date('Y-m-d-H-i-s') . '.jpg';
            $img_file->save('storage/uploads/image/flights/'. $image_name, 70);
        }else if ($flight->image && $request->image_delete !== 'none'){
            $image_name = $flight->image;
        }else if ($request->image_delete == 'none'){
            Storage::disk('public')->delete('uploads/image/flights/' . $flight->image);
            $image_name = "";
        }else{
            $image_name = "";
        }


        $form = array(
            'title'                  =>  $request->title,
            'image'                  =>  $image_name,
            'director'               =>  $request->director,
            'address'                =>  $request->address,
            'phone'                  =>  $request->phone,
            'email'                  =>  $request->email,
            'site'                   =>  $request->site,
            'fb'                     =>  $request->fb,
            'cord0'                  =>  $request->cord0,
            'cord1'                  =>  $request->cord1,
            'monday'                 =>  $request->monday,
            'tuesday'                =>  $request->tuesday,
            'wednesday'              =>  $request->wednesday,
            'thursday'               =>  $request->thursday,
            'friday'                 =>  $request->friday,
            'saturday'               =>  $request->saturday,
            'sunday'                 =>  $request->sunday,
            'text'                   =>  $request->text,
            'publish'                =>  $request->publish,
            'user_id'                =>  $user_id,
        );

        $flight->update($form);

        return redirect()->route('users.flights.index', compact(  'image_name'))
            ->with('message', "Contact has been updated successfully");
    }

    public function edit($id)
    {
        $flight= Flight::findOrFail($id);
        return view('users.flights.edit', compact('flight'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'        => 'mimes:jpeg,png,jpg|max:2048',
            'director'     => 'nullable|min:3|max:90',
            'title'        => 'required|min:5|max:120',
            'address'      => 'required|max:99',
            'phone'        => 'numeric',
            'email'        => 'nullable|email',
            'site'         => 'nullable|url',
            'fb'           => 'nullable|url',
            'text'         => 'nullable|min:30',
        ]);

        $user_id = Auth::id();

//        glxavor nkar@ sarqelu hamar
        $image_name = "";
        if ($request->file('image')) {
            $img_file = Image::make($request->file('image'))->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img_file->resizeCanvas(null, 350);
            $image_name = rand(111111, 999999) . '.' . date('Y-m-d-H-i-s') . '.jpg';
            $img_file->save('storage/uploads/image/flights/'. $image_name, 70);
        }

        $form = array(
            'title'                  =>  $request->title,
            'image'                  =>  $image_name,
            'director'               =>  $request->director,
            'address'                =>  $request->address,
            'phone'                  =>  $request->phone,
            'email'                  =>  $request->email,
            'site'                   =>  $request->site,
            'fb'                     =>  $request->fb,
            'cord0'                  =>  $request->cord0,
            'cord1'                  =>  $request->cord1,
            'monday'                 =>  $request->monday,
            'tuesday'                =>  $request->tuesday,
            'wednesday'              =>  $request->wednesday,
            'thursday'               =>  $request->thursday,
            'friday'                 =>  $request->friday,
            'saturday'               =>  $request->saturday,
            'sunday'                 =>  $request->sunday,
            'text'                   =>  $request->text,
            'publish'                =>  $request->publish,
            'user_id'                =>  $user_id,
        );

        $flight = Flight::create($form);

        return redirect()->route('users.flights.index', compact(  'image_name'))
            ->with('message', "Contact has been updated successfully");
    }

    public function show($id)
    {
        $flight = Flight::findOrFail($id);
        $url = $flight->flight_url;
        $flight_url = parse_url($url, PHP_URL_HOST);

        return view('users.flights.show', compact('flight','flight_url'));
    }

    public function destroy($id)
    {
        $flight = Flight::findOrFail($id);
        if ($flight->image) {
            Storage::disk('public')->delete('uploads/image/flights/' . $flight->image);
        }
        $flight = Flight::findOrFail($id)->delete();
        return redirect()->route('users.flights.index')->with('message', "Contact has been deleted successfully");
    }
//.........................................
    public function flights()
    {
        $flights = Flight::where('publish', 'yes')->orderBy('rating', 'DESC')->paginate(10);
        $og_title = 'Մասիսջան, Մասիս քաղաքի բոլոր ավիատոմսերի վաճարքի կետերը մեկ վայրում';
        $og_description = 'Այստեղ կարող եք տեղեկատվություն գտնել Մասիս քաղաքում գործող բոլոր ավիատոմսերի վաճարքի կետերի մասին․․․';
        return view('all.flights.index', compact('flights', 'og_description', 'og_title'));
    }

    public function flights_show($id)
    {
        $flight = Flight::findOrFail($id);
        if($flight->publish == 'yes') {
            $flight->count = $flight->count + 1;
            $flight->save();
            $url_site = $flight->site;
            $site_url = parse_url($url_site, PHP_URL_HOST);
            $table_id = $flight->tab_name;
            $table_name = "flights";
            $table_rating = $flight->rating;
            $og_title = $flight->title;
            $og_description = mb_substr($flight->text, 0, 160, "utf-8") . '...';
            if($flight->image){
                $og_image = asset('storage/uploads/image/flights/' . $flight->image);
            }else{
                $og_image = asset('image/app/default-post.jpg');
            }
            return view('all.flights.show', compact('flight', 'site_url', 'table_id', 'id',
                                                            'table_name', 'table_rating', 'og_title', 'og_description', 'og_image'));
        }else
            return redirect()->route('flights');
    }
}
