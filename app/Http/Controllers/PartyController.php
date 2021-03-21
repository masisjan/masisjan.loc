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

class PartyController extends Controller
{
    public function index()
    {
        if(auth()->user()->type == 'admin'){
            $parties = Service::where('tab_name', '9')->latest()->paginate(5);
        }else{
            $parties = Service::where('tab_name', '9')->where('user_id', auth()->user()->id)->latest()->paginate(5);
        }
        return view('users.parties.index', compact('parties'));
    }

    public function create()
    {
        $party = new Service();
        return view('users.parties.create', compact('party'));
    }

    public function update($id, Request $request)
    {
        $party = Service::findOrFail($id);
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
            Storage::disk('public')->delete('uploads/image/parties/' . $party->image);
            $img_file = Image::make($request->file('image'))->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img_file->resizeCanvas(null, 350);
            $image_name = rand(111111, 999999) . '.' . date('Y-m-d-H-i-s') . '.jpg';
            $img_file->save('storage/uploads/image/parties/'. $image_name, 70);
        }else if ($party->image && $request->image_delete !== 'none'){
            $image_name = $party->image;
        }else if ($request->image_delete == 'none'){
            Storage::disk('public')->delete('uploads/image/parties/' . $party->image);
            $image_name = "";
        }else{
            $image_name = "";
        }

        $image_qr = $party->qr_cod;
        if ($party->qr_cod == null) {
            $image_qr = $user_id . 'qr' . date('Y-m-d-H-i-s') . '.svg';
            QrCode::encoding('UTF-8')->format('svg')->size(500)->backgroundColor(218, 165, 32)->generate(url("parties/{$party->id}"), 'storage/uploads/image/qr/' . $image_qr);
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
            'tab_name'               =>  9,
        );

        $party->update($form);

        return redirect()->route('users.parties.index', compact(  'image_name'))
            ->with('message', "Contact has been updated successfully");
    }

    public function edit($id)
    {
        $party = Service::findOrFail($id);
        if(auth()->user()->type == 'admin') {
            return view('users.parties.edit', compact('party'));
        }else{
            if(auth()->user()->id == $party->user_id){
                return view('users.parties.edit', compact('party'));
            }else{
                return redirect()->route('users.parties.index');
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
            $img_file->save('storage/uploads/image/parties/'. $image_name, 70);
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
            'tab_name'               =>  9,
        );

        $party = Service::create($form);

        return redirect()->route('users.parties.index', compact(  'image_name'))
            ->with('message', "Contact has been updated successfully");
    }

    public function show($id)
    {
        $party = Service::findOrFail($id);
        $url = $party->party_url;
        $party_url = parse_url($url, PHP_URL_HOST);

        if(auth()->user()->type == 'admin') {
            return view('users.parties.show', compact('party','party_url'));
        }else{
            if(auth()->user()->id == $party->user_id){
                return view('users.parties.show', compact('party','party_url'));
            }else{
                return redirect()->route('users.parties.index');
            }
        }
    }

    public function destroy($id)
    {
        $party = Service::findOrFail($id);
        if ($party->user_id != Auth::id() || auth()->user()->type != 'admin') {
            return redirect()->back();
        }
        if ($party->image) {
            Storage::disk('public')->delete('uploads/image/parties/' . $party->image);
        }
        $party = Service::findOrFail($id)->delete();
        return redirect()->route('users.parties.index')->with('message', "Contact has been deleted successfully");
    }
//.........................................
    public function parties()
    {
        $parties = Service::where('publish', 'yes')->where('confirm', 'yes')->where('tab_name', '9')->orderBy('rating', 'DESC')->paginate(10);
        $og_title = 'Մասիսջան, Մասիս քաղաքի բոլոր կուսակցությունները մեկ վայրում';
        $og_description = 'Այստեղ կարող եք տեղեկատվություն գտնել Մասիս քաղաքում գործող բոլոր կուսակցությունների մասին․․․';
        return view('all.parties.index', compact('parties', 'og_description', 'og_title'));
    }

    public function parties_show($id, Request $request)
    {
        $party = Service::findOrFail($id);
        if($party->publish == 'yes' && $party->confirm == 'yes') {
            $party->count = $party->count + 1;
            $party->save();
            $url_site = $party->site;
            $site_url = parse_url($url_site, PHP_URL_HOST);
            $table_id = $party->tab_name;
            $table_name = "services";
            $table_rating = $party->rating;
            $og_title = $party->title;
            $og_description = mb_substr($party->text, 0, 160, "utf-8") . '...';
            if($party->image){
                $og_image = asset('storage/uploads/image/parties/' . $party->image);
            }else{
                $og_image = asset('image/app/default-post.jpg');
            }
            $menu = Menu::updateOrInsert(['table_id' => $table_id])->increment('count');
            if(Auth::check()) {
                $my_count = My_count::updateOrInsert(['user_id' => Auth::id()], ['menu_id' => $table_id])->increment('count');
            }
            return view('all.parties.show', compact('party', 'site_url', 'table_id', 'id', 'table_name',
                'table_rating', 'og_title', 'og_description', 'og_image'));
        }else
            return redirect()->route('parties');
    }
}
