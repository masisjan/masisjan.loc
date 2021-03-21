<?php

namespace App\Http\Controllers;


use App\Models\Menu;
use App\Models\My_count;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PharmacyController extends Controller
{
    public function index()
    {
        if(auth()->user()->type == 'admin'){
            $pharmacies = Service::where('tab_name', '6')->latest()->paginate(5);
        }else{
            $pharmacies = Service::where('tab_name', '6')->where('user_id', auth()->user()->id)->latest()->paginate(5);
        }
        return view('users.pharmacies.index', compact('pharmacies'));
    }

    public function create()
    {
        $pharmacy = new Service();
        return view('users.pharmacies.create', compact('pharmacy'));
    }

    public function update($id, Request $request)
    {
        $pharmacy = Service::findOrFail($id);
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
            Storage::disk('public')->delete('uploads/image/pharmacies/' . $pharmacy->image);
            $img_file = Image::make($request->file('image'))->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img_file->resizeCanvas(null, 350);
            $image_name = rand(111111, 999999) . '.' . date('Y-m-d-H-i-s') . '.jpg';
            $img_file->save('storage/uploads/image/pharmacies/'. $image_name, 70);
        }else if ($pharmacy->image && $request->image_delete !== 'none'){
            $image_name = $pharmacy->image;
        }else if ($request->image_delete == 'none'){
            Storage::disk('public')->delete('uploads/image/pharmacies/' . $pharmacy->image);
            $image_name = "";
        }else{
            $image_name = "";
        }

        $image_qr = $pharmacy->qr_cod;
        if ($pharmacy->qr_cod == null) {
            $image_qr = $user_id . 'qr' . date('Y-m-d-H-i-s') . '.svg';
            QrCode::encoding('UTF-8')->format('svg')->size(500)->backgroundColor(218, 165, 32)->generate(url("pharmacies/{$pharmacy->id}"), 'storage/uploads/image/qr/' . $image_qr);
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
            'tab_name'               =>  6,
        );

        $pharmacy->update($form);

        return redirect()->route('users.pharmacies.index', compact(  'image_name'))
            ->with('message', "Contact has been updated successfully");
    }

    public function edit($id)
    {
        $pharmacy = Service::findOrFail($id);
        if(auth()->user()->type == 'admin') {
            return view('users.pharmacies.edit', compact('pharmacy'));
        }else{
            if(auth()->user()->id == $pharmacy->user_id){
                return view('users.pharmacies.edit', compact('pharmacy'));
            }else{
                return redirect()->route('users.pharmacies.index');
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
            $img_file->save('storage/uploads/image/pharmacies/'. $image_name, 70);
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
            'tab_name'               =>  6,
        );

        $pharmacy = Service::create($form);

        return redirect()->route('users.pharmacies.index', compact(  'image_name'))
            ->with('message', "Contact has been updated successfully");
    }

    public function show($id)
    {
        $pharmacy = Service::findOrFail($id);
        $url = $pharmacy->pharmacy_url;
        $pharmacy_url = parse_url($url, PHP_URL_HOST);

        if(auth()->user()->type == 'admin') {
            return view('users.pharmacies.show', compact('pharmacy','pharmacy_url'));
        }else{
            if(auth()->user()->id == $pharmacy->user_id){
                return view('users.pharmacies.show', compact('pharmacy','pharmacy_url'));
            }else{
                return redirect()->route('users.pharmacies.index');
            }
        }
    }

    public function destroy($id)
    {
        $pharmacy = Service::findOrFail($id);
        if ($pharmacy->user_id != Auth::id() || auth()->user()->type != 'admin') {
            return redirect()->back();
        }
        if ($pharmacy->image) {
            Storage::disk('public')->delete('uploads/image/pharmacies/' . $pharmacy->image);
        }
        $pharmacy = Service::findOrFail($id)->delete();
        return redirect()->route('users.pharmacies.index')->with('message', "Contact has been deleted successfully");
    }
//.........................................
    public function pharmacies()
    {
        $pharmacies = Service::where('publish', 'yes')->where('confirm', 'yes')->where('tab_name', '6')->orderBy('rating', 'DESC')->paginate(10);
        $og_title = 'Մասիսջան, Մասիս քաղաքի բոլոր դեղատները մեկ վայրում';
        $og_description = 'Այստեղ կարող եք տեղեկատվություն գտնել Մասիս քաղաքում գործող բոլոր դեղատների մասին․․․';
        return view('all.pharmacies.index', compact('pharmacies', 'og_description', 'og_title'));
    }

    public function pharmacies_show($id, Request $request)
    {
        $pharmacy = Service::findOrFail($id);
        if($pharmacy->publish == 'yes' && $pharmacy->confirm == 'yes') {
            $pharmacy->count = $pharmacy->count + 1;
            $pharmacy->save();
            $url_site = $pharmacy->site;
            $site_url = parse_url($url_site, PHP_URL_HOST);
            $table_id = $pharmacy->tab_name;
            $table_name = "services";
            $table_rating = $pharmacy->rating;
            $og_title = $pharmacy->title;
            $og_description = mb_substr($pharmacy->text, 0, 160, "utf-8") . '...';
            if($pharmacy->image){
                $og_image = asset('storage/uploads/image/pharmacies/' . $pharmacy->image);
            }else{
                $og_image = asset('image/app/default-post.jpg');
            }
            $menu = Menu::updateOrInsert(['table_id' => $table_id])->increment('count');
            if(Auth::check()) {
                $my_count = My_count::updateOrInsert(['user_id' => Auth::id()], ['menu_id' => $table_id])->increment('count');
            }
            return view('all.pharmacies.show', compact('pharmacy', 'site_url', 'table_id', 'id', 'table_name',
                'table_rating', 'og_title', 'og_description', 'og_image'));
        }else
            return redirect()->route('pharmacies');
    }
}
