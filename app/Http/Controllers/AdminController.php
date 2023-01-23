<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function add()
    {
        $url = url('/admin');
        $title = "List of Admin";
        $data = compact('url','title');
        return view('admin ')->with($data);
    }

    

    public function admin(Request $request)
    {
        echo "<pre>";
        print_r($request->all());

        // insert query
        $admin = new Admin;
        $admin->fname = $request['fname'];
        $admin->lname = $request['lname'];
        $admin->gender = $request['gender'];
        $admin->age = $request['age'];
        $admin->contact_address = $request['contact_address'];
        $admin->admin_email = $request['admin_email'];
        $admin->admin_password = md5($request['admin_password']);
        $admin->save();

        return redirect('/admin/view');
        // ------------
    }
    public function view()
    {
        $admin = Admin::all();
        $data = compact('admin');
        return view('admin-view')->with($data);
    }

    public function delete($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        return redirect('admin-view');
        
    }

    public function edit($id)
    {
        $admin = Admin::find($id);
        if(is_null($admin)){
            // not found
            return redirect('admin');
        }else{
            $title = "Update Admin";
            $url = url('/admin/update') . "/" . $id;
            $data = compact('admin','url','title');
            return view('admin')->with($data);
        }
    }

    public function update($id, Request $request)
    {
        $admin = Admin::find($id);
        $admin->fname = $request['fname'];
        $admin->lname = $request['lname'];
        $admin->gender = $request['gender'];
        $admin->age = $request['age'];
        $admin->contact_address = $request['contact_address'];
        $admin->admin_email = $request['admin_email'];
        $admin->save();
        return redirect('admin');
    }

}
