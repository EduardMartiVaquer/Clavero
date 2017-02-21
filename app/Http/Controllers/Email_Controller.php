<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class Email_Controller extends Controller
{
    public function sendMail(Request $request)
    {
        $name = Input::get('name');
        $email = Input::get('email');
        $m = Input::get('message');


        Mail::send('emails.mainEmail', ['name' => $name, 'email' => $email, 'm' => $m], function($message){
            $message->from('info@masnouclav.com', 'Masnou Clav');
            $message->to('mclavero93@gmail.com');
            $message->subject('Mensaje de Masnouclav');
        });

        return redirect('/');
    }
}
