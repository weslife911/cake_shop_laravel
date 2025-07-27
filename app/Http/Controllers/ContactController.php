<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\UserMail;

class ContactController extends Controller
{
    //
    public function contact_view() {
        return view("pages.common.contact");
    }

    function sendMail(Request $request) {
        $validate = Validator::make($request->all(), [
            "name" => ["required", "string", "max:255"],
            "email" => ["required", "string"],
            "message" => ["required", "string"],
        ]);

        if($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        } else {
            $mail_data = [
                "title" => 'Mail to Admin',
                "name" => $request->name,
                "email" => $request->email,
                "message"=> $request->message,
            ];
            $mail = Mail::to($request->email)->send(new UserMail(
                $mail_data
            ));
            if($mail) {
                flash()->success("Email sent successfully");
                return redirect()->route("home");
            } else {
                flash()->error("Encountered error while sending email");
            }
        }
    }
}
