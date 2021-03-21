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

class FoodController extends Controller
{
    public function index()
    {
        if(auth()->user()->type == 'admin'){
            $foods = Service::where('tab_name', '10')->latest()->paginate(5);
        }else{
            $foods = Service::where('tab_name', '10')->where('user_id', auth()->user()->id)->latest()->paginate(5);
        }
        return view('users.foods.index', compact('foods'));
    }

    public function create()
    {
        $food = new Service();
        return view('users.foods.create', compact('food'));
    }

    public function update($id, Request $request)
    {
        $food = Service::findOrFail($id);
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
            Storage::disk('public')->delete('uploads/image/foods/' . $food->image);
            $img_file = Image::make($request->file('image'))->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img_file->resizeCanvas(null, 350);
            $image_name = rand(111111, 999999) . '.' . date('Y-m-d-H-i-s') . '.jpg';
            $img_file->save('storage/uploads/image/foods/'. $image_name, 70);
        }else if ($food->image && $request->image_delete !== 'none'){
            $image_name = $food->image;
        }else if ($request->image_delete == 'none'){
            Storage::disk('public')->delete('uploads/image/foods/' . $food->image);
            $image_name = "";
        }else{
            $image_name = "";
        }

        $image_qr = $food->qr_cod;
        if ($food->qr_cod == null) {
            $image_qr = $user_id . 'qr' . date('Y-m-d-H-i-s') . '.svg';
            QrCode::encoding('UTF-8')->format('svg')->size(500)->backgroundColor(218, 165, 32)->generate(url("foods/{$food->id}"), 'storage/uploads/image/qr/' . $image_qr);
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
            'tab_name'               =>  10,
        );

        $food->update($form);

        return redirect()->route('users.foods.index', compact(  'image_name'))
            ->with('message', "Contact has been updated successfully");
    }

    public function edit($id)
    {
        $food = Service::findOrFail($id);
        if(auth()->user()->type == 'admin') {
            return view('users.foods.edit', compact('food'));
        }else{
            if(auth()->user()->id == $food->user_id){
                return view('users.foods.edit', compact('food'));
            }else{
                return redirect()->route('users.foods.index');
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
            $img_file->save('storage/uploads/image/foods/'. $image_name, 70);
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
            'tab_name'               =>  10,
        );

        $food = Service::create($form);

        return redirect()->route('users.foods.index', compact(  'image_name'))
            ->with('message', "Contact has been updated successfully");
    }

    public function show($id)
    {
        $food = Service::findOrFail($id);
        $url = $food->food_url;
        $food_url = parse_url($url, PHP_URL_HOST);

        if(auth()->user()->type == 'admin') {
            return view('users.foods.show', compact('food','food_url'));
        }else{
            if(auth()->user()->id == $food->user_id){
                return view('users.foods.show', compact('food','food_url'));
            }else{
                return redirect()->route('users.foods.index');
            }
        }
    }

    public function destroy($id)
    {
        $food = Service::findOrFail($id);
        if ($food->user_id != Auth::id() || auth()->user()->type != 'admin') {
            return redirect()->back();
        }
        if ($food->image) {
            Storage::disk('public')->delete('uploads/image/foods/' . $food->image);
        }
        $food = Service::findOrFail($id)->delete();
        return redirect()->route('users.foods.index')->with('message', "Contact has been deleted successfully");
    }
//.........................................
    public function foods()
    {
        $foods = Service::where('publish', 'yes')->where('confirm', 'yes')->where('tab_name', '10')->orderBy('rating', 'DESC')->paginate(10);
        $og_title = 'Մասիսջան, Մասիս քաղաքի բոլոր արագ սննդի կետերը մեկ վայրում';
        $og_description = 'Այստեղ կարող եք տեղեկատվություն գտնել Մասիս քաղաքում գործող բոլոր արագ սննդի կետերի մասին․․․';
        return view('all.foods.index', compact('foods', 'og_description', 'og_title'));
    }

    public function foods_show($id, Request $request)
    {
        $food = Service::findOrFail($id);
        if($food->publish == 'yes' && $food->confirm == 'yes') {
            $food->count = $food->count + 1;
            $food->save();
            $url_site = $food->site;
            $site_url = parse_url($url_site, PHP_URL_HOST);
            $table_id = $food->tab_name;
            $table_name = "services";
            $table_rating = $food->rating;
            $og_title = $food->title;
            $og_description = mb_substr($food->text, 0, 160, "utf-8") . '...';
            if($food->image){
                $og_image = asset('storage/uploads/image/foods/' . $food->image);
            }else{
                $og_image = asset('image/app/default-post.jpg');
            }
            $menu = Menu::updateOrInsert(['table_id' => $table_id])->increment('count');
            if(Auth::check()) {
                $my_count = My_count::updateOrInsert(['user_id' => Auth::id()], ['menu_id' => $table_id])->increment('count');
            }
            return view('all.foods.show', compact('food', 'site_url', 'table_id', 'id', 'table_name',
                'table_rating', 'og_title', 'og_description', 'og_image'));
        }else
            return redirect()->route('foods');
    }
}
