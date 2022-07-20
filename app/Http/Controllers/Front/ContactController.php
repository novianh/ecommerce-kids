<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\InTouch;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function save(Request $request)
    {
        // dd();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        InTouch::create($request->all());
        Mail::send(
            'email.send',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message'),
            ),
            function ($message) use ($request) {
                $message->from($request->email);
                $message->to(User::where('admin_user', 1)->first()->email);
                $message->subject('Get In Touch - Kids Ecommerce');
            }
        );

        return \redirect()->route('user.home');
    }
}
