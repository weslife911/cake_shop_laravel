<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            return $request;
        }
    }
}
