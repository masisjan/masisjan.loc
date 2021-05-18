<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\My_count;
use App\Models\Page;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $tab = substr(strrchr($request->fullUrl(),'?'), 1, -1);
        $pages = Page::where('tab_name', $tab)->latest()->paginate(5);
        return view('users.pages.index', compact('pages', 'tab'));
    }

    public function create(Request $request)
    {
        $tab = substr(strrchr($request->fullUrl(),'?'), 1, -1);
        $page = new Page();
        return view('users.pages.create', compact('page', 'tab'));
    }

    public function update($id, Request $request)
    {
        $page = Page::findOrFail($id);
        $user_id = Auth::id();

        $request->validate([
            'image'        => 'mimes:jpeg,png,jpg|max:2048',
            'director'     => 'nullable|min:3|max:90',
            'title'        => 'required|min:5|max:120',
            'address'      => 'required|max:99',
            'email'        => 'nullable|email',
            'site'         => 'nullable|url',
            'fb'           => 'nullable|url',
            'text'         => 'nullable|min:30',
        ]);

//        glxavor nkar@ sarqelu hamar

        $image_name = "";
        if ($request->file('image')) {
            Storage::disk('public')->delete('uploads/image/pages/' . $page->image);
            $img_file = Image::make($request->file('image'))->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img_file->resizeCanvas(null, 350);
            $img_file->insert('image/app/watermark.png');
            $image_name = rand(111111, 999999) . '.' . date('Y-m-d-H-i-s') . '.jpg';
            $img_file->save('storage/uploads/image/pages/'. $image_name, 70);
        }else if ($page->image && $request->image_delete !== 'none'){
            $image_name = $page->image;
        }else if ($request->image_delete == 'none'){
            Storage::disk('public')->delete('uploads/image/pages/' . $page->image);
            $image_name = "";
        }else{
            $image_name = "";
        }

        $image_qr = $page->qr_cod;
        if ($page->qr_cod == null) {
            $image_qr = $user_id . 'qr' . date('Y-m-d-H-i-s') . '.svg';
            QrCode::encoding('UTF-8')->format('svg')->size(500)->backgroundColor(218, 165, 32)->generate(url("pages/{$page->id}"), 'storage/uploads/image/qr/' . $image_qr);
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
        );

        $page->update($form);
        return redirect()->route('users.pages.index', $page->tab_name)
            ->with('message', "Հաջողությամբ թարմացվել է");
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        $tab = $page->tab_name;
        return view('users.pages.edit', compact('page', 'tab'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'        => 'mimes:jpeg,png,jpg|max:2048',
            'director'     => 'nullable|min:3|max:90',
            'title'        => 'required|min:5|max:120',
            'address'      => 'required|max:99',
            'email'        => 'nullable|email',
            'site'         => 'nullable|url',
            'fb'           => 'nullable|url',
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
            $img_file->save('storage/uploads/image/pages/'. $image_name, 70);
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
            'tab_name'               =>  $tab,
        );

        $page = Page::create($form);

        return redirect()->route('users.pages.index', $tab)
            ->with('message', "Հաջողությամբ ավելացվել է");
    }

    public function show($id)
    {
        $page = Page::findOrFail($id);
        $tab = $page->tab_name;
        $site_url = parse_url($page->site, PHP_URL_HOST);
        $fb_url = "";
        if($page->fb > 0){
            $fb_url = parse_url($page->fb, PHP_URL_HOST);
        }

        return view('users.pages.show', compact('page','site_url', 'fb_url', 'tab'));
    }

    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $tab = $page->tab_name;
        if ($page->image) {
            Storage::disk('public')->delete('uploads/image/pages/' . $page->image);
        }
        $page = Page::findOrFail($id)->delete();
        return redirect()->route('users.pages.index', $tab)->with('message', "Հաջողությամբ հեռացվել է");
    }
//.........................................
    public function pages(Request $request)
    {
        $tab = substr(strrchr($request->fullUrl(),'?'), 1, -1);
        $pages = Page::where('publish', 'yes')->where('tab_name', $tab)->orderBy('rating', 'DESC')->paginate(10);
        return view('all.pages.index', compact('pages'));
    }

    public function pages_show($id, Request $request)
    {
        $page = Page::findOrFail($id);
        if($page->publish == 'yes') {
            $page->count = $page->count + 1;
            $page->save();
            $site_url = parse_url($page->site, PHP_URL_HOST);
            $fb_url = parse_url($page->fb, PHP_URL_HOST);
            $table_id = $page->tab_name;
            $table_name = "pages";
            $table_rating = $page->rating;
            $og_title = $page->title;
            $og_description = mb_substr($page->text, 0, 160, "utf-8") . '...';
            if($page->image){
                $og_image = asset('storage/uploads/image/pages/' . $page->image);
            }else{
                $og_image = asset('image/app/default-post.jpg');
            }
            $menu = Menu::updateOrInsert(['table_id' => $table_id])->increment('count');
            if(Auth::check()) {
                $my_count = My_count::updateOrInsert(['user_id' => Auth::id(), 'menu_id' => $table_id])->increment('count');
            }
            return view('all.pages.show', compact('page', 'site_url', 'fb_url', 'table_id', 'id', 'table_name',
                'table_rating', 'og_title', 'og_description', 'og_image'));
        }else
            return redirect()->back();
    }
}
