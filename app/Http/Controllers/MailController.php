<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function create()
    {
        return view('email');
    }

    public function tablichkaEmail(Request $request)
    {

        $data = [
            'subject' => "Պատրաստել ցուցանակ",
            'name' => "MasisJan",
            'email' => "077114557@mail.ru",
            'text' => $request->title,
            'qr' => $request->image_qr,
            'user_name' => auth()->user()->name,
            'user_email' => auth()->user()->email,
            'user_tel' => auth()->user()->tel,
        ];

        Mail::send('emails.email-template', $data, function($message) use ($data) {
            $message->to($data['email'])
                ->subject($data['subject']);
        });
        return back()->with(['message' => 'Պատվերը հաջողությամբ ուղարկվել է, ընկերությունը Ձեզ հետ կկապնվի']);
    }

}
