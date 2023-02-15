<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Twilio\Rest\Client;

class CustomerController extends Controller
{
    public function index()
    {
        $this->sendMessage('test','+9779806879263');
    }
    
    public function customeradd(Request $request)
    {
        
        return view('customeraddform');
    }

    

    public function customer(Request $request)
    {
        echo "<pre>";
        print_r($request->all());

        // insert query
        $customer = new Customer;
        $customer->fname = $request['fname'];
        $customer->lname = $request['lname'];
        $customer->gender = $request['gender'];
        $customer->age = $request['age'];
        $customer->contact_address = $request['contact_address'];
        $customer->customer_email = $request['customer_email'];
        $customer->customer_password = md5($request['customer_password']);
        $customer->save();

        return redirect('/customer/view');
        // ------------
    }
    public function customerview()
    {
        $customer = Customer::all();
        $data = compact('customer');
        return view('customer-view')->with($data);
    }

    public function customerdelete($id)
    {
        $customer = Customer::find($id);
        if (!is_null($customer))
        {
            $customer->delete();
        }
        return redirect('customer/view');
        
    }

    public function customeredit($id)
    {
        $customer = Customer::find($id);
        if(is_null($customer))
        {
            // not found
            return redirect('customer/view');
        }
        else
        {
            $url = url('/customer/update') . "/" . $id;
            $data = compact('customer' ,'url');
            return view('customereditform')->with($data);
        }
    }

    public function customerupdate($id, Request $request)
    {
        $customer = Customer::find($id);
        $customer->fname = $request['fname'];
        $customer->lname = $request['lname'];
        $customer->gender = $request['gender'];
        $customer->age = $request['age'];
        $customer->contact_address = $request['contact_address'];
        $customer->customer_email = $request['customer_email'];
        $customer->save();
        return redirect('customer/view');
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
