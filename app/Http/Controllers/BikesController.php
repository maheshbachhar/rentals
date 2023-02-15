<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bikes;
use Twilio\Rest\Client;

class BikesController extends Controller
{
    public function index()
    {
        $this->sendMessage('test','+9779806879263');
    }
    
    public function bikesadd(Request $request)
    {
        
        return view('bikesaddform');
    }

    

    public function bikes(Request $request)
    {
        echo "<pre>";
        print_r($request->all());

        // insert query
        $bikes = new Bikes;
        
        $bikes->bike_number = $request['bike_number'];
        $bikes->bike_model = $request['bike_model'];
        $bikes->bike_status = $request['bike_status'];
        $bikes->rent_price = $request['rent_price'];
        $bikes->driver_id = $request['driver_id'];
        $bikes->save();

        return redirect('/bikes/view');
        // ------------
    }
    public function bikesview()
    {
        $bikes = Bikes::all();
        $data = compact('bikes');
        return view('bikes-view')->with($data);
    }

    public function bikesdelete($id)
    {
        $bikes = Bikes::find($id);
        if (!is_null($bikes))
        {
            $bikes->delete();
        }
        return redirect('bikes/view');
        
    }

    public function bikesedit($id)
    {
        $bikes = Bikes::find($id);
        if(is_null($bikes))
        {
            // not found
            return redirect('bikes/view');
        }
        else
        {
            $url = url('/bikes/update') . "/" . $id;
            $data = compact('bikes' ,'url');
            return view('bikeseditform')->with($data);
        }
    }

    public function bikesupdate($id, Request $request)
    {
        $bikes = Bikes::find($id);
        
        $bikes->bike_number = $request['bike_number'];
        $bikes->bike_model = $request['bike_model'];
        $bikes->bike_status = $request['bike_status'];
        $bikes->rent_price = $request['rent_price'];
        $bikes->driver_id = $request['driver_id'];
        $bikes->save();
        return redirect('bikes/view');
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
