<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Page;
use App\Models\Post;
use App\Models\Rating;
use App\Models\Section;
use App\Models\Service;
use App\Models\Stop;
use App\Models\Transport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function show(Request $request)
    {
        $t_name = trim($_POST['t_name']);
        $t_id = trim($_POST['t_id']);
        $oks = Stop::where('t_id', $t_id)->where('t_name', $t_name)->orderBy('number')->get();
        $tex = "";
        foreach($oks as $ok){
            $text = " " . $ok->name . " " . $ok->number . ", ";
            $tex = $tex . $text;
        }
        echo $tex;
    }

    public function search(Request $request)
    {
        $service = Service::where('publish', 'yes')->where('confirm', 'yes')->where('title', 'LIKE', '%' . $request->search .'%')->orderBy('id', 'DESC')->limit(10)->get();
        $page = Page::where('publish', 'yes')->where('title', 'LIKE', '%' . $request->search .'%')->orderBy('id', 'DESC')->limit(10)->get();
        $section = Section::where('publish', 'yes')->where('title', 'LIKE', '%' . $request->search .'%')->orderBy('id', 'DESC')->limit(10)->get();
//        $transport = Transport::where('publish', 'yes')->where('title', 'LIKE', '%' . $request->search .'%')->orderBy('id', 'DESC')->get();
        $event = Event::where('publish', 'yes')->where('confirm', 'yes')->where('title', 'LIKE', '%' . $request->search .'%')->orderBy('id', 'DESC')->limit(10)->get();
        $post = Post::where('publish', 'yes')->where('confirm', 'yes')->where('title', 'LIKE', '%' . $request->search .'%')->orderBy('id', 'DESC')->limit(10)->get();
        $orders = $service->union($page)->union($section)->union($event)->union($post);
        return view('all.search', compact('orders'));
    }
}
