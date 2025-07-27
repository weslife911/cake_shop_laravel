<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //
    public function admin_dashboard_view() {
        return view('pages.admin.dashboard');
    }

    public function admin_users_view() {
        $users = User::paginate(5);
        return view('pages.admin.list_users', ["users" => $users]);
    }

    public function admin_user_edit_view($id) {
        $user = User::findOrFail($id);
        return view("pages.admin.edit_user", ["user" => $user]);
    }

    public function admin_edit_user($id, Request $request) {
        $user = User::findOrFail($id);
        $validate = Validator::make($request->all(), [
            "name" => ["required", "string"],
            "role" => ["required","string"],
        ]);

        if($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        } else {
            $user->name = $request->name;
            $user->role = $request->role;
            $user->save();
            flash()->success("User updated successfully");
            return redirect()->route("admin.users");
        }

    }

    public function admin_delete_user_account($id) {
        $user = User::findOrFail($id);
        if($user) {
            $user->delete();
            flash()->success("User deleted successfully");
            return redirect()->route("admin.users");
        }
    }

}
