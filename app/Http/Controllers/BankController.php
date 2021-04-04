<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BankController extends Controller
{
    public function index()
    {
        $banks = Service::where('tab_name', '4')->latest()->paginate(5);
        return view('users.banks.index', compact('banks'));
    }

    public function create()
    {
        $bank = new Service();
        return view('users.banks.create', compact('bank'));
    }

    public function update($id, Request $request)
    {
        $bank = Service::findOrFail($id);
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
            Storage::disk('public')->delete('uploads/image/banks/' . $bank->image);
            $img_file = Image::make($request->file('image'))->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img_file->resizeCanvas(null, 350);
            $image_name = rand(111111, 999999) . '.' . date('Y-m-d-H-i-s') . '.jpg';
            $img_file->save('storage/uploads/image/banks/'. $image_name, 70);
        }else if ($bank->image && $request->image_delete !== 'none'){
            $image_name = $bank->image;
        }else if ($request->image_delete == 'none'){
            Storage::disk('public')->delete('uploads/image/banks/' . $bank->image);
            $image_name = "";
        }else{
            $image_name = "";
        }

        $image_qr = $bank->qr_cod;
        if ($bank->qr_cod == null) {
            $image_qr = $user_id . 'qr' . date('Y-m-d-H-i-s') . '.svg';
            QrCode::encoding('UTF-8')->format('svg')->size(500)->backgroundColor(218, 165, 32)->generate(url("banks/{$bank->id}"), 'storage/uploads/image/qr/' . $image_qr);
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
            'tab_name'               =>  4,
        );

        $bank->update($form);

        return redirect()->route('users.banks.index', compact(  'image_name'))
            ->with('message', "Contact has been updated successfully");
    }

    public function edit($id)
    {
        $bank= Service::findOrFail($id);
        return view('users.banks.edit', compact('bank'));
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
            $img_file->save('storage/uploads/image/banks/'. $image_name, 70);
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
            'tab_name'               =>  4,
        );

        $bank = Service::create($form);

        return redirect()->route('users.banks.index', compact(  'image_name'))
            ->with('message', "Contact has been updated successfully");
    }

    public function show($id)
    {
        $bank = Service::findOrFail($id);
        $url = $bank->bank_url;
        $bank_url = parse_url($url, PHP_URL_HOST);

        return view('users.banks.show', compact('bank','bank_url'));
    }

    public function destroy($id)
    {
        $bank = Service::findOrFail($id);
        if ($bank->image) {
            Storage::disk('public')->delete('uploads/image/banks/' . $bank->image);
        }
        $bank = Service::findOrFail($id)->delete();
        return redirect()->route('users.banks.index')->with('message', "Contact has been deleted successfully");
    }
//.........................................
    public function banks()
    {
        $banks = Service::where('publish', 'yes')->where('confirm', 'yes')->where('tab_name', '4')->orderBy('rating', 'DESC')->paginate(10);
        $og_title = 'Մասիսջան, Մասիս քաղաքի բոլոր բանկերը մեկ վայրում';
        $og_description = 'Այստեղ կարող եք տեղեկատվություն գտնել Մասիս քաղաքում գործող բոլոր բանկերի մասին․․․';
        return view('all.banks.index', compact('banks', 'og_title', 'og_description'));
    }

    public function banks_show($id)
    {
        $bank = Service::findOrFail($id);
        if($bank->publish == 'yes' && $bank->confirm == 'yes') {
            $bank->count = $bank->count + 1;
            $bank->save();
            $url_site = $bank->site;
            $site_url = parse_url($url_site, PHP_URL_HOST);
            $table_id = $bank->tab_name;
            $table_name = "banks";
            $table_rating = $bank->rating;
            $og_title = $bank->title;
            $og_description = mb_substr($bank->text, 0, 160, "utf-8") . '...';
            if($bank->image){
                $og_image = asset('storage/uploads/image/banks/' . $bank->image);
            }else{
                $og_image = asset('image/app/default-post.jpg');
            }
            return view('all.banks.show', compact('bank', 'site_url', 'table_id', 'id',
                                                        'table_name', 'table_rating', 'og_title', 'og_description', 'og_image'));
        }else
            return redirect()->route('banks');
    }
}
