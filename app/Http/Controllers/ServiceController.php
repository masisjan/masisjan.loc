<?php

namespace App\Http\Controllers;


use App\Models\Menu;
use App\Models\My_count;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $tab = substr(strrchr($request->fullUrl(),'?'), 1, -1);
        if(auth()->user()->type == 'admin'){
            $services = Service::where('tab_name', $tab)->latest()->paginate(5);
        }else{
            $services = Service::where('tab_name', $tab)->where('user_id', auth()->user()->id)->latest()->paginate(5);
        }
        return view('users.services.index', compact('services', 'tab'));
    }

    public function create(Request $request)
    {
        $tab = substr(strrchr($request->fullUrl(),'?'), 1, -1);
        $service = new Service();
        return view('users.services.create', compact('service', 'tab'));
    }

    public function update($id, Request $request)
    {
        $service = Service::findOrFail($id);
        $user_id = Auth::id();

        $request->validate([
            'image'        => 'mimes:jpeg,png,jpg|max:2048',
            'director'     => 'nullable|min:3|max:90',
            'title'        => 'required|min:5|max:120',
            'address'      => 'required|max:99',
            'phone'        => 'nullable|numeric',
            'email'        => 'nullable|email',
            'site'         => 'nullable|url',
            'fb'           => 'nullable|url',
            'text'         => 'nullable|min:30',
        ]);

//        glxavor nkar@ sarqelu hamar

        $image_name = "";
        if ($request->file('image')) {
            Storage::disk('public')->delete('uploads/image/services/' . $service->image);
            $img_file = Image::make($request->file('image'))->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img_file->resizeCanvas(null, 350);
            $image_name = rand(111111, 999999) . '.' . date('Y-m-d-H-i-s') . '.jpg';
            $img_file->save('storage/uploads/image/services/'. $image_name, 70);
        }else if ($service->image && $request->image_delete !== 'none'){
            $image_name = $service->image;
        }else if ($request->image_delete == 'none'){
            Storage::disk('public')->delete('uploads/image/services/' . $service->image);
            $image_name = "";
        }else{
            $image_name = "";
        }

        $image_qr = $service->qr_cod;
        if ($service->qr_cod == null) {
            $image_qr = $user_id . 'qr' . date('Y-m-d-H-i-s') . '.svg';
            QrCode::encoding('UTF-8')->format('svg')->size(500)->backgroundColor(218, 165, 32)->generate(url("services/{$service->id}"), 'storage/uploads/image/qr/' . $image_qr);
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
        );

        $service->update($form);

        return redirect()->route('users.services.index', $service->tab_name)
            ->with('message', "Հաջողությամբ թարմացվել է");
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $tab = $service->tab_name;
        if(auth()->user()->type == 'admin') {
            return view('users.services.edit', compact('service', 'tab'));
        }else{
            if(auth()->user()->id == $service->user_id){
                return view('users.services.edit', compact('service', 'tab'));
            }else{
                return redirect()->route('users.services.index', $tab);
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
            'phone'        => 'nullable|numeric',
            'email'        => 'nullable|email',
            'site'         => 'nullable|url',
            'fb'           => 'nullable|url',
            'text'         => 'nullable|min:30',
        ]);

        $user_id = Auth::id();
        $tab = substr(strrchr($request->fullUrl(),'?'), 1, -1);

//        glxavor nkar@ sarqelu hamar
        $image_name = "";
        if ($request->file('image')) {
            $img_file = Image::make($request->file('image'))->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img_file->resizeCanvas(null, 350);
            $image_name = rand(111111, 999999) . '.' . date('Y-m-d-H-i-s') . '.jpg';
            $img_file->save('storage/uploads/image/services/'. $image_name, 70);
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
            'tab_name'               =>  $tab,
        );

        $service = Service::create($form);

        return redirect()->route('users.services.index', $tab)
            ->with('message', "Հաջողությամբ ավելացվել է");
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);
        $tab = $service->tab_name;
        $site_url = parse_url($service->site, PHP_URL_HOST);
        $fb_url = "";
        if($service->fb > 0){
            $fb_url = parse_url($service->fb, PHP_URL_HOST);
        }

        if(auth()->user()->type == 'admin') {
            return view('users.services.show', compact('service','site_url', 'fb_url', 'tab'));
        }else{
            if(auth()->user()->id == $service->user_id){
                return view('users.services.show', compact('service','site_url', 'fb_url', 'tab'));
            }else{
                return redirect()->route('users.services.index', $tab);
            }
        }
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $tab = $service->tab_name;
        if ($service->user_id != Auth::id() || auth()->user()->type != 'admin') {
            return redirect()->back();
        }
        if ($service->image) {
            Storage::disk('public')->delete('uploads/image/services/' . $service->image);
        }
        $service = Service::findOrFail($id)->delete();
        return redirect()->route('users.services.index', $tab)->with('message', "Հաջողությամբ հեռացվել է");
    }
//.........................................
    public function services(Request $request)
    {
        $tab = substr(strrchr($request->fullUrl(),'?'), 1, -1);
        $services = Service::where('publish', 'yes')->where('confirm', 'yes')->where('tab_name', $tab)->orderBy('rating', 'DESC')->paginate(10);
        return view('all.services.index', compact('services'));
    }

    public function services_show($id, Request $request)
    {
        $service = Service::findOrFail($id);
        if($service->publish == 'yes' && $service->confirm == 'yes') {
            $service->count = $service->count + 1;
            $service->save();
            $site_url = parse_url($service->site, PHP_URL_HOST);
            $fb_url = parse_url($service->fb, PHP_URL_HOST);
            $table_id = $service->tab_name;
            $table_name = "services";
            $table_rating = $service->rating;
            $og_title = $service->title;
            $og_description = mb_substr($service->text, 0, 160, "utf-8") . '...';
            if($service->image){
                $og_image = asset('storage/uploads/image/services/' . $service->image);
            }else{
                $og_image = asset('image/app/default-post.jpg');
            }
            $menu = Menu::updateOrInsert(['table_id' => $table_id])->increment('count');
            if(Auth::check()) {
                $my_count = My_count::updateOrInsert(['user_id' => Auth::id(), 'menu_id' => $table_id])->increment('count');
            }
            return view('all.services.show', compact('service', 'site_url', 'fb_url', 'table_id', 'id', 'table_name',
                'table_rating', 'og_title', 'og_description', 'og_image'));
        }else
            return redirect()->route('foods');
    }
}
