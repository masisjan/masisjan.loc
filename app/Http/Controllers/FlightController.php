<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\My_count;
use App\Models\Rating;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class FlightController extends Controller
{
    public function index()
    {
        if(auth()->user()->type == 'admin'){
            $flights = Service::where('tab_name', '3')->latest()->paginate(5);
        }else{
            $flights = Service::where('tab_name', '3')->where('user_id', auth()->user()->id)->latest()->paginate(5);
        }
        return view('users.flights.index', compact('flights'));
    }

    public function create()
    {
        $flight = new Service();
        return view('users.flights.create', compact('flight'));
    }

    public function update($id, Request $request)
    {
        $flight = Service::findOrFail($id);
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

        $image_qr = $flight->qr_cod;
        if ($flight->qr_cod == null) {
            $image_qr = $user_id . 'qr' . date('Y-m-d-H-i-s') . '.svg';
            QrCode::encoding('UTF-8')->format('svg')->size(500)->backgroundColor(218, 165, 32)->generate(url("flights/{$flight->id}"), 'storage/uploads/image/qr/' . $image_qr);
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
            'qr_cod'                 =>  $image_qr,
            'user_id'                =>  $user_id,
            'tab_name'               =>  3,
        );

        $flight->update($form);

        return redirect()->route('users.flights.index', compact(  'image_name'))
            ->with('message', "Contact has been updated successfully");
    }

    public function edit($id)
    {
        $flight = Service::findOrFail($id);
        if(auth()->user()->type == 'admin') {
            return view('users.flights.edit', compact('flight'));
        }else{
            if(auth()->user()->id == $flight->user_id){
                return view('users.flights.edit', compact('flight'));
            }else{
                return redirect()->route('users.flights.index');
            }
        }
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
            'tab_name'               =>  3,
        );

        $flight = Service::create($form);

        return redirect()->route('users.flights.index', compact(  'image_name'))
            ->with('message', "Contact has been updated successfully");
    }

    public function show($id)
    {
        $flight = Service::findOrFail($id);
        $url = $flight->flight_url;
        $flight_url = parse_url($url, PHP_URL_HOST);

        if(auth()->user()->type == 'admin') {
            return view('users.flights.show', compact('flight','flight_url'));
        }else{
            if(auth()->user()->id == $flight->user_id){
                return view('users.flights.show', compact('flight','flight_url'));
            }else{
                return redirect()->route('users.flights.index');
            }
        }
    }

    public function destroy($id)
    {
        $flight = Service::findOrFail($id);
        if ($flight->user_id != Auth::id() || auth()->user()->type != 'admin') {
            return redirect()->back();
        }
        if ($flight->image) {
            Storage::disk('public')->delete('uploads/image/flights/' . $flight->image);
        }
        $flight = Service::findOrFail($id)->delete();
        return redirect()->route('users.flights.index')->with('message', "Contact has been deleted successfully");
    }
//.........................................
    public function flights()
    {
        $flights = Service::where('publish', 'yes')->where('confirm', 'yes')->where('tab_name', '3')->orderBy('rating', 'DESC')->paginate(10);
        $og_title = 'Մասիսջան, Մասիս քաղաքի բոլոր ավիատոմսերը մեկ վայրում';
        $og_description = 'Այստեղ կարող եք տեղեկատվություն գտնել Մասիս քաղաքում գործող բոլոր ավիատոմսերի վաճարքի մասին․․․';
        return view('all.flights.index', compact('flights', 'og_description', 'og_title'));
    }

    public function flights_show($id, Request $request)
    {
        $flight = Service::findOrFail($id);
        if($flight->publish == 'yes' && $flight->confirm == 'yes') {
            $flight->count = $flight->count + 1;
            $flight->save();
            $url_site = $flight->site;
            $site_url = parse_url($url_site, PHP_URL_HOST);
            $table_id = $flight->tab_name;
            $table_name = "services";
            $table_rating = $flight->rating;
            $og_title = $flight->title;
            $og_description = mb_substr($flight->text, 0, 160, "utf-8") . '...';
            if($flight->image){
                $og_image = asset('storage/uploads/image/flights/' . $flight->image);
            }else{
                $og_image = asset('image/app/default-post.jpg');
            }
            $menu = Menu::updateOrInsert(['table_id' => $table_id])->increment('count');
            if(Auth::check()) {
                $my_count = My_count::updateOrInsert(['user_id' => Auth::id()], ['menu_id' => $table_id])->increment('count');
            }
            return view('all.flights.show', compact('flight', 'site_url', 'table_id', 'id', 'table_name',
                'table_rating', 'og_title', 'og_description', 'og_image'));
        }else
            return redirect()->route('flights');
    }
}
