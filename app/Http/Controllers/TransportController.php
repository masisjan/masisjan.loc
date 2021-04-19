<?php

namespace App\Http\Controllers;


use App\Models\Menu;
use App\Models\My_count;
use App\Models\Stop;
use App\Models\Time;
use App\Models\Transport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TransportController extends Controller
{
    public function index()
    {
        if(auth()->user()->type == 'admin'){
            $transports = Transport::latest()->paginate(5);
        }else{
            return redirect()->back();
        }
        return view('users.transports.index', compact('transports'));
    }

    public function create()
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
        $stops = Stop::where('t_id', $transport->id)->orderByRaw('number * 1 asc') ->get();
        $times = Time::where('id_t', $transport->id)->get();

        if(auth()->user()->type == 'admin') {
            return view('users.transports.show', compact('transport', 'stops', 'times'));
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
        $transports = Transport::where('publish', 'yes')->paginate(10);
        return view('all.transports.index', compact('transports'));
    }

    public function transports_show($id, Request $request)
    {
        $transport = Transport::findOrFail($id);
        $stops = Stop::where('t_id', $transport->id)->orderByRaw('number * 1 asc') ->get();
        $times = Time::where('id_t', $transport->id)->get();
        if($transport->publish == 'yes') {
            $transport->count = $transport->count + 1;
            $transport->save();
            $table_id = $transport->tab_name;
            $table_name = "transports";
            $table_rating = $transport->rating;
            $og_title = $transport->title1 . ' - '. $transport->title1 . " N" . $transport->number;
            $og_description = mb_substr($transport->text, 0, 160, "utf-8") . '...';
            $og_image = asset('image/app/transport.jpg');
            $menu = Menu::updateOrInsert(['table_id' => $table_id])->increment('count');
            if(Auth::check()) {
                $my_count = My_count::updateOrInsert(['user_id' => Auth::id(), 'menu_id' => $table_id])->increment('count');
            }
            return view('all.transports.show', compact('transport', 'table_id', 'id', 'table_name',
                'table_rating', 'og_title', 'og_description', 'og_image', 'stops', 'times'));
        }else
            return redirect()->route('transports');
    }

    //STOPS.....................................................................
    public function stopindex()
    {
        if(auth()->user()->type == 'admin'){
            $stops = Stop::latest()->paginate(5);
        }else{
            return redirect()->back();
        }
        return view('users.transports.stops.index', compact('stops'));
    }

    public function stopcreate()
    {
        $stop = new Stop();
        $transports = Transport::latest()->get();
        $times = Time::latest()->limit(10)->get();
        return view('users.transports.stops.create', compact('stop', 'transports', 'times'));
    }

    public function stopupdate($id, Request $request)
    {
        $stop = Stop::findOrFail($id);

        $form = array(
            'name'               =>  $request->name,
            't_id'               =>  $request->t_id,
            't_name'             =>  $request->t_name,
            'number'             =>  $request->number,
            'value'              =>  $request->value,
            'workdays_id'        =>  $request->workdays_id,
            'holidays_id'        =>  $request->holidays_id,
        );

        $stop->update($form);

        return redirect()->route('users.stops.index')
            ->with('message', "Հաջողությամբ թարմացվել է");
    }

    public function stopedit($id)
    {
        $stop = Stop::findOrFail($id);
        $transports = Transport::latest()->get();
        $times = Time::latest()->limit(10)->get();
        if(auth()->user()->type == 'admin') {
            return view('users.transports.stops.edit', compact('stop', 'transports', 'times'));
        }else{
            return redirect()->back();
        }
    }

    public function stopstore(Request $request)
    {
        $form = array(
            'name'               =>  $request->name,
            't_id'               =>  $request->t_id,
            't_name'             =>  $request->t_name,
            'number'             =>  $request->number,
            'value'              =>  $request->value,
            'workdays_id'        =>  $request->workdays_id,
            'holidays_id'        =>  $request->holidays_id,
        );

        $stop = Stop::create($form);

        return redirect()->route('users.stops.index')
            ->with('message', "Հաջողությամբ ավելացվել է");
    }

    public function stopshow($id)
    {
        $stop = Stop::findOrFail($id);
        if(auth()->user()->type == 'admin') {
            return view('users.transports.stops.show', compact('stop'));
        }else{
            return redirect()->back();
        }
    }

    public function stopdestroy($id)
    {
        if (auth()->user()->type == 'admin') {
            $stop = Stop::findOrFail($id)->delete();
            return redirect()->route('users.stops.index')->with('message', "Հաջողությամբ հեռացվել է");
        }else{
            return redirect()->back();
        }
    }
    //TIMES..................................................................
    public function timeindex()
    {
        if(auth()->user()->type == 'admin'){
            $times = Time::latest()->paginate(5);
        }else{
            return redirect()->back();
        }
        return view('users.transports.times.index', compact('times'));
    }

    public function timecreate()
    {
        $time = new Time();
        $transports = Transport::latest()->get();
        return view('users.transports.times.create', compact('time', 'transports'));
    }

    public function timeupdate($id, Request $request)
    {
        $time = Time::findOrFail($id);
        if($request->day == ""){
            $day = $time->day;
        }else{
            $day = $request->day;
        }
        if($request->name == ""){
            $name = $time->name;
            $id_t = $time->id_t;
        }else{
            $name = substr(strrchr($request->name,','), 1);
            $id_t = preg_match_all("/\d+/", $request->name);
        }

        $form = array(
            'day'                 =>  $day,
            'name'                =>  $name,
            'id_t'                =>  $id_t,
            't01'                 =>  $request->t01,
            't02'                 =>  $request->t02,
            't03'                 =>  $request->t03,
            't04'                 =>  $request->t04,
            't05'                 =>  $request->t05,
            't06'                 =>  $request->t06,
            't07'                 =>  $request->t07,
            't08'                 =>  $request->t08,
            't09'                 =>  $request->t09,
            't10'                 =>  $request->t10,
            't11'                 =>  $request->t11,
            't12'                 =>  $request->t12,
            't13'                 =>  $request->t13,
            't14'                 =>  $request->t14,
            't15'                 =>  $request->t15,
            't16'                 =>  $request->t16,
            't17'                 =>  $request->t17,
            't18'                 =>  $request->t18,
            't19'                 =>  $request->t19,
            't20'                 =>  $request->t20,
            't21'                 =>  $request->t21,
            't22'                 =>  $request->t22,
            't23'                 =>  $request->t23,
            't24'                 =>  $request->t24,
        );

        $time->update($form);

        return redirect()->route('users.times.index')
            ->with('message', "Հաջողությամբ թարմացվել է");
    }

    public function timeedit($id)
    {
        $time = Time::findOrFail($id);
        if(auth()->user()->type == 'admin') {
            $transports = Transport::latest()->get();
            return view('users.transports.times.edit', compact('time', 'transports'));
        }else{
            return redirect()->back();
        }
    }

    public function timestore(Request $request)
    {
        $name = substr(strrchr($request->name,','), 1);
        $id_t = preg_match_all("/\d+/", $request->name);
        $form = array(
            'day'                 =>  $request->day,
            'name'                =>  $name,
            'id_t'                =>  $id_t,
            't01'                 =>  $request->t01,
            't02'                 =>  $request->t02,
            't03'                 =>  $request->t03,
            't04'                 =>  $request->t04,
            't05'                 =>  $request->t05,
            't06'                 =>  $request->t06,
            't07'                 =>  $request->t07,
            't08'                 =>  $request->t08,
            't09'                 =>  $request->t09,
            't10'                 =>  $request->t10,
            't11'                 =>  $request->t11,
            't12'                 =>  $request->t12,
            't13'                 =>  $request->t13,
            't14'                 =>  $request->t14,
            't15'                 =>  $request->t15,
            't16'                 =>  $request->t16,
            't17'                 =>  $request->t17,
            't18'                 =>  $request->t18,
            't19'                 =>  $request->t19,
            't20'                 =>  $request->t20,
            't21'                 =>  $request->t21,
            't22'                 =>  $request->t22,
            't23'                 =>  $request->t23,
            't24'                 =>  $request->t24,
        );

        $time = Time::create($form);

        return redirect()->route('users.times.index')
            ->with('message', "Հաջողությամբ ավելացվել է");
    }

    public function timedestroy($id)
    {
        if (auth()->user()->type == 'admin') {
            $time = Time::findOrFail($id)->delete();
            return redirect()->route('users.times.index')->with('message', "Հաջողությամբ հեռացվել է");
        }else{
            return redirect()->back();
        }
    }
}
