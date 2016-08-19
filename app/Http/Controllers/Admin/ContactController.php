<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ContactMailRequest;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showMailForm()
    {
        return view('admin.contact.mailform');
    }

    public function sendMailInfo(ContactMailRequest $request)
    {
        
        $data = $request->only('name', 'email', 'phone');
        $data['messageLines'] = explode("\n",$request->get('message') );

        Mail::send('admin.contact.mail',$data,function ($message) use ($data) {
            $message->subject('Blog Contact From : TWTMALL ')
                ->to('takooctopus@hotmail.com')
                ->replyTo($data['email']);
        });
        return back()
            ->withSuccess(" It has been sent. :)");
    }
}
