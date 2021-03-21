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

class TaxiController extends Controller
{
    public function index()
    {
        if(auth()->user()->type == 'admin'){
            $taxis = Service::where('tab_name', '5')->latest()->paginate(5);
        }else{
            $taxis = Service::where('tab_name', '5')->where('user_id', auth()->user()->id)->latest()->paginate(5);
        }
        return view('users.taxis.index', compact('taxis'));
    }

    public function create()
    {
        $taxi = new Service();
        return view('users.taxis.create', compact('taxi'));
    }

    public function update($id, Request $request)
    {
        $taxi = Service::findOrFail($id);
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
            Storage::disk('public')->delete('uploads/image/taxis/' . $taxi->image);
            $img_file = Image::make($request->file('image'))->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img_file->resizeCanvas(null, 350);
            $image_name = rand(111111, 999999) . '.' . date('Y-m-d-H-i-s') . '.jpg';
            $img_file->save('storage/uploads/image/taxis/'. $image_name, 70);
        }else if ($taxi->image && $request->image_delete !== 'none'){
            $image_name = $taxi->image;
        }else if ($request->image_delete == 'none'){
            Storage::disk('public')->delete('uploads/image/taxis/' . $taxi->image);
            $image_name = "";
        }else{
            $image_name = "";
        }

        $image_qr = $taxi->qr_cod;
        if ($taxi->qr_cod == null) {
            $image_qr = $user_id . 'qr' . date('Y-m-d-H-i-s') . '.svg';
            QrCode::encoding('UTF-8')->format('svg')->size(500)->backgroundColor(218, 165, 32)->generate(url("taxis/{$taxi->id}"), 'storage/uploads/image/qr/' . $image_qr);
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
            'tab_name'               =>  5,
        );

        $taxi->update($form);

        return redirect()->route('users.taxis.index', compact(  'image_name'))
            ->with('message', "Contact has been updated successfully");
    }

    public function edit($id)
    {
        $taxi = Service::findOrFail($id);
        if(auth()->user()->type == 'admin') {
            return view('users.taxis.edit', compact('taxi'));
        }else{
            if(auth()->user()->id == $taxi->user_id){
                return view('users.taxis.edit', compact('taxi'));
            }else{
                return redirect()->route('users.taxis.index');
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
            $img_file->save('storage/uploads/image/taxis/'. $image_name, 70);
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
            'tab_name'               =>  5,
        );

        $taxi = Service::create($form);

        return redirect()->route('users.taxis.index', compact(  'image_name'))
            ->with('message', "Contact has been updated successfully");
    }

    public function show($id)
    {
        $taxi = Service::findOrFail($id);
        $url = $taxi->taxi_url;
        $taxi_url = parse_url($url, PHP_URL_HOST);

        if(auth()->user()->type == 'admin') {
            return view('users.taxis.show', compact('taxi','taxi_url'));
        }else{
            if(auth()->user()->id == $taxi->user_id){
                return view('users.taxis.show', compact('taxi','taxi_url'));
            }else{
                return redirect()->route('users.taxis.index');
            }
        }
    }

    public function destroy($id)
    {
        $taxi = Service::findOrFail($id);
        if ($taxi->user_id != Auth::id() || auth()->user()->type != 'admin') {
            return redirect()->back();
        }
        if ($taxi->image) {
            Storage::disk('public')->delete('uploads/image/taxis/' . $taxi->image);
        }
        $taxi = Service::findOrFail($id)->delete();
        return redirect()->route('users.taxis.index')->with('message', "Contact has been deleted successfully");
    }
//.........................................
    public function taxis()
    {
        $taxis = Service::where('publish', 'yes')->where('confirm', 'yes')->where('tab_name', '5')->orderBy('rating', 'DESC')->paginate(10);
        $og_title = 'Մասիսջան, Մասիս քաղաքի բոլոր տաքսիները մեկ վայրում';
        $og_description = 'Այստեղ կարող եք տեղեկատվություն գտնել Մասիս քաղաքում գործող բոլոր տաքսիների մասին․․․';
        return view('all.taxis.index', compact('taxis', 'og_description', 'og_title'));
    }

    public function taxis_show($id, Request $request)
    {
        $taxi = Service::findOrFail($id);
        if($taxi->publish == 'yes' && $taxi->confirm == 'yes') {
            $taxi->count = $taxi->count + 1;
            $taxi->save();
            $url_site = $taxi->site;
            $site_url = parse_url($url_site, PHP_URL_HOST);
            $table_id = $taxi->tab_name;
            $table_name = "services";
            $table_rating = $taxi->rating;
            $og_title = $taxi->title;
            $og_description = mb_substr($taxi->text, 0, 160, "utf-8") . '...';
            if($taxi->image){
                $og_image = asset('storage/uploads/image/taxis/' . $taxi->image);
            }else{
                $og_image = asset('image/app/default-post.jpg');
            }
            $menu = Menu::updateOrInsert(['table_id' => $table_id])->increment('count');
            if(Auth::check()) {
                $my_count = My_count::updateOrInsert(['user_id' => Auth::id()], ['menu_id' => $table_id])->increment('count');
            }
            return view('all.taxis.show', compact('taxi', 'site_url', 'table_id', 'id', 'table_name',
                'table_rating', 'og_title', 'og_description', 'og_image'));
        }else
            return redirect()->route('taxis');
    }
}
