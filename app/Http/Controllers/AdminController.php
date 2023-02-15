<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Twilio\Rest\Client;

class AdminController extends Controller
{
    public function index()
    {
        $this->sendMessage('test','+9779806879263');
    }
    
    public function adminadd(Request $request)
    {
        
        return view('adminaddform');
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
    public function adminview()
    {
        $admin = Admin::all();
        $data = compact('admin');
        return view('admin-view')->with($data);
    }

    public function admindelete($id)
    {
        $admin = Admin::find($id);
        if (!is_null($admin))
        {
            $admin->delete();
        }
        return redirect('admin/view');
        
    }

    public function adminedit($id)
    {
        $admin = Admin::find($id);
        if(is_null($admin))
        {
            // not found
            return redirect('admin/view');
        }
        else
        {
            $url = url('/admin/update') . "/" . $id;
            $data = compact('admin' ,'url');
            return view('admineditform')->with($data);
        }
    }

    public function adminupdate($id, Request $request)
    {
        $admin = Admin::find($id);
        $admin->fname = $request['fname'];
        $admin->lname = $request['lname'];
        $admin->gender = $request['gender'];
        $admin->age = $request['age'];
        $admin->contact_address = $request['contact_address'];
        $admin->admin_email = $request['admin_email'];
        $admin->save();
        return redirect('admin/view');
    }

    public function dashboard()
    {
        return view('dashboard');
    }


    private function sendMessage($message, $recipients)
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients, 
                ['from' => $twilio_number, 'body' => $message] );
    }

}
