<?php

namespace App\Http\Controllers;


use App\Models\Menu;
use App\Models\My_count;
use App\Models\Transport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TransportController extends Controller
{
    public function index(Request $request)
    {
        if(auth()->user()->type == 'admin'){
            $transports = Transport::latest()->paginate(5);
        }else{
            return redirect()->back();
        }
        return view('users.transports.index', compact('transports'));
    }

    public function create(Request $request)
    {
        $transport = new Transport();
        return view('users.transports.create', compact('transport'));
    }

    public function update($id, Request $request)
    {
        $transport = Transport::findOrFail($id);

        $request->validate([
            'title1'       => 'required|min:3|max:30',
            'title2'       => 'required|min:3|max:30',
            'number'       => 'nullable|numeric',
            'value'        => 'nullable|numeric',
            'time'         => 'nullable|numeric',
            'text'         => 'nullable|min:20',
        ]);

        $form = array(
            'title1'                 =>  $request->title1,
            'title2'                 =>  $request->title2,
            'number'                 =>  $request->number,
            'value'                  =>  $request->value,
            'time'                   =>  $request->time,
            'map'                    =>  $request->map,
            'text'                   =>  $request->text,
            'publish'                =>  $request->publish,
        );

        $transport->update($form);

        return redirect()->route('users.transports.index')
            ->with('message', "Հաջողությամբ թարմացվել է");
    }

    public function edit($id)
    {
        $transport = Transport::findOrFail($id);
        if(auth()->user()->type == 'admin') {
            return view('users.transports.edit', compact('transport'));
        }else{
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title1'       => 'required|min:3|max:30',
            'title2'       => 'required|min:3|max:30',
            'number'       => 'nullable|numeric',
            'value'        => 'nullable|numeric',
            'time'         => 'nullable|numeric',
            'text'         => 'nullable|min:20',
        ]);

        $form = array(
            'title1'                 =>  $request->title1,
            'title2'                 =>  $request->title2,
            'number'                 =>  $request->number,
            'value'                  =>  $request->value,
            'time'                   =>  $request->time,
            'map'                    =>  $request->map,
            'text'                   =>  $request->text,
            'publish'                =>  $request->publish,
        );

        $transport = Transport::create($form);

        return redirect()->route('users.transports.index')
            ->with('message', "Հաջողությամբ ավելացվել է");
    }

    public function show($id)
    {
        $transport = Transport::findOrFail($id);

        if(auth()->user()->type == 'admin') {
            return view('users.transports.show', compact('transport'));
        }else{
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        if (auth()->user()->type == 'admin') {
            $transport = Transport::findOrFail($id)->delete();
            return redirect()->route('users.transports.index')->with('message', "Հաջողությամբ հեռացվել է");
        }else{
            return redirect()->back();
        }
    }
//.........................................
    public function transports(Request $request)
    {
        $tab = substr(strrchr($request->fullUrl(),'?'), 1, -1);
        $transports = Transport::where('publish', 'yes')->where('confirm', 'yes')->where('tab_name', $tab)->orderBy('rating', 'DESC')->paginate(10);
        return view('all.transports.index', compact('transports'));
    }

    public function transports_show($id, Request $request)
    {
        $transport = Transport::findOrFail($id);
        if($transport->publish == 'yes' && $transport->confirm == 'yes') {
            $transport->count = $transport->count + 1;
            $transport->save();
            $url_site = $transport->site;
            $site_url = parse_url($url_site, PHP_URL_HOST);
            $table_id = $transport->tab_name;
            $table_name = "transports";
            $table_rating = $transport->rating;
            $og_title = $transport->title;
            $og_description = mb_substr($transport->text, 0, 160, "utf-8") . '...';
            if($transport->image){
                $og_image = asset('storage/uploads/image/transports/' . $transport->image);
            }else{
                $og_image = asset('image/app/default-post.jpg');
            }
            $menu = Menu::updateOrInsert(['table_id' => $table_id])->increment('count');
            if(Auth::check()) {
                $my_count = My_count::updateOrInsert(['user_id' => Auth::id(), 'menu_id' => $table_id])->increment('count');
            }
            return view('all.transports.show', compact('transport', 'site_url', 'table_id', 'id', 'table_name',
                'table_rating', 'og_title', 'og_description', 'og_image'));
        }else
            return redirect()->route('foods');
    }
}
