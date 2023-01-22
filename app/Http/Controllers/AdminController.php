<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function admin(Request $request)
    {
        echo "<pre>";
        print_r($request->all());

        $admin = new Admin;
        $admin->fname = $request['fname'];
        $admin->lname = $request['lname'];
        $admin->gender = $request['gender'];
        $admin->age = $request['age'];
        $admin->contact_add = $request['contact_add'];
        $admin->admin_email = $request['admin_email'];
        $admin->admin_pass = md5($request['admin_pass']);
        $admin->save();
    }

}
