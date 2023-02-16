<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use Twilio\Rest\Client;

class DriverController extends Controller
{
    public function index()
    {
        $this->sendMessage('test','+9779806879263');
    }
    
    public function driveradd(Request $request)
    {
        
        return view('driveraddform');
    }

    

    public function driver(Request $request)
    {
        echo "<pre>";
        print_r($request->all());

        // insert query
        $driver = new Driver;
        $driver->driver_name = $request['driver_name'];
        $driver->commission = $request['commission'];
        $driver->save();

        return redirect('/driver/view');
        // ------------
    }
    public function driverview()
    {
        $driver = Driver::all();
        $data = compact('driver');
        return view('driver-view')->with($data);
    }

    public function driverdelete($id)
    {
        $driver = Driver::find($id);
        if (!is_null($driver))
        {
            $driver->delete();
        }
        return redirect('driver/view');
        
    }

    public function driveredit($id)
    {
        $driver = Driver::find($id);
        if(is_null($driver))
        {
            // not found
            return redirect('driver/view');
        }
        else
        {
            $url = url('/driver/update') . "/" . $id;
            $data = compact('driver' ,'url');
            return view('drivereditform')->with($data);
        }
    }

    public function driverupdate($id, Request $request)
    {
        $driver = Driver::find($id);
        $driver->driver_name = $request['driver_name'];
        $driver->commission = $request['commission'];
        $driver->save();
        return redirect('driver/view');
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
