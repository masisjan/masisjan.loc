<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function index()
    {
        if (auth()->user()->type == 'admin'){
            $user_count = User::count();
            $post_count = Post::where('confirm', 'yes')->where('publish', 'yes')->count();
            $event_count = Event::where('confirm', 'yes')->where('publish', 'yes')->count();
            $posts = Post::where('confirm', 'not')->where('publish', 'yes')->latest()->paginate(5);
            $events = Event::where('confirm', 'not')->where('publish', 'yes')->latest()->paginate(5);
            $services = Service::where('confirm', 'not')->where('publish', 'yes')->latest()->paginate(5);
            return view('users.index', compact( 'user_count', 'post_count', 'event_count',
                                                                'posts', 'events', 'services'));
        }else if (auth()->user()->type == 'userPlus'){
            $id = auth()->user()->id;
            $post_count = Post::where('confirm', 'yes')->where('publish', 'yes')->where('user_id', $id)->count();
            $event_count = Event::where('confirm', 'yes')->where('publish', 'yes')->where('user_id', $id)->count();
            $service_count = Service::where('confirm', 'not')->where('publish', 'yes')->where('user_id', $id)->count();
            return view('users.user_plus', compact( 'post_count', 'event_count', 'service_count'));
        }else {
            $service_count = Service::where('confirm', 'not')->where('publish', 'yes')->where('user_id', auth()->user()->id)->count();
            return view('users.user_index', compact( 'service_count'));
        }
    }

    public function all()
    {
        if(auth()->user()->type == 'admin'){
            $abcMenus = Menu::where('category_id', 0)->get()->sortBy('title');
        }else{
            $abcMenus = Menu::where('category_id', 0)->where('type','!=', 'a')->get()->sortBy('title');
        }
        return view('users.all', compact( 'abcMenus'));
    }

    public function setting()
    {
        $abcMenus = Menu::where('category_id', 0)->where('type','!=', 'a')->get()->sortBy('title');
        return view('users.user.setting', compact( 'abcMenus'));
    }

    public function profile($id)
    {
        if(auth()->user()->type == 'admin'){
            $user_id = $id;
            $user = User::find($user_id);
            if($user == null){
                return redirect()->back();
            }
        }else{
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
        }
        $day = "";
        $month = "";
        $year = "";
        if($user->date) {
            $date = $user->date;
            $day = explode(".", $date)[0];
            $month = explode(".", $date)[1];
            $year = explode(".", $date)[2];
        }
        return view('users.user.profile', compact( 'user', 'day', 'month', 'year'));
    }

    public function updateProfile($id, Request $request)
    {
        $user = User::findOrFail($id);
        $day = $request->day;
        $month = $request->month;
        $year = $request->year;
        $date = "";
        if($day[0] != "" && $month[0] != "" && $year[0] != ""){
            $date = $day[0] . "." . $month[0] . "." . $year[0];
        }
        $form = array(
            'name'       =>  $request->name,
            'phone'      =>  $request->phone,
            'address'    =>  $request->address,
            'type'       =>  $request->type,
            'date'       =>  $date,
        );
        $user->update($form);
        return redirect()->back()->with('message', "?????????????????? ???????????????????????? ?????????????????? ????");
    }

    public function password()
    {
        $user = User::find(auth()->user()->id);
        return view('users.user.password', compact( 'user'));
    }

    public function email()
    {
        $user = User::find(auth()->user()->id);
        return view('users.user.email', compact( 'user'));
    }

    public function updatePassword($id, Request $request)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'old_password'    => 'required|min:8|',
            'password'        => 'required|min:8|max:20|confirmed',
        ]);
        if(! password_verify($request->old_password, $user->password)) {
            return back()->with('message', "???????????? ???????????????????? ???????? ??");
        }
        $user->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('users.setting')->with('message', "???????????????????? ???????????????????????? ?????????????????? ??");
    }

    public function updateEmail($id, Request $request)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'old_password'   => 'required|min:8|',
            'email'          => 'required|string|email|max:255|unique:users',
        ]);
        if(! password_verify($request->old_password, $user->password)) {
            return back()->with('message', "???????????? ???????????????????? ???????? ??");
        }
        $data = [
            'subject'    =>  "??????? ?????????? ????????????????????",
            'name'       =>  "MasisJan",
            'email'      =>  auth()->user()->email,
            'id'         =>  $user->id,
            'user_name'  =>  auth()->user()->name,
            'password'   =>  auth()->user()->password,
            'new_email'  =>  $request->email,
        ];

        Mail::send('emails.email-verify', $data, function($message) use ($data) {
            $message->to($data['new_email'])
                ->subject($data['subject']);
        });
        return redirect()->route('users.setting')->with('message', " ?????????? ??????? ???????????? ?????????????????? ?? ?????????????????? ????????????, ?????????????? ???????????? ??????? ?????????? ?????????????????? ??????????");
    }

    public function verifyEmail( Request $request)
    {
        $user = User::where('id', $request->id)->first();
        if($user->password ?? 0 == $request->key) {
            $user->update([
                'email' => $request->email
            ]);
            return redirect()->route('users.setting')->with('message', "??????? ?????????? ???????????????????????? ???????????????? ??");
        }
        return redirect()->route('users.setting')->with('message', "???????? ??????????");
    }

    public function destroy($id)
    {
        if (auth()->user()->id == $id || auth()->user()->type == 'admin') {
            $user = User::findOrFail($id)->delete();
            return redirect()->route('index');
        }
        return redirect()->back();
    }

    public function users()
    {
        $users = User::latest()->paginate(5);
        return view('users.user.index', compact('users'));
    }
}
