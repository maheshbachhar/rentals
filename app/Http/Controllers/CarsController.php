<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cars;
use Twilio\Rest\Client;

class CarsController extends Controller
{
    public function index()
    {
        $this->sendMessage('test','+9779806879263');
    }
    
    public function carsadd(Request $request)
    {
        return view('carsaddform');
    }

    

    public function cars(Request $request)
    {
        echo "<pre>";
        print_r($request->all());

        // insert query
        $cars = new Cars;
        
        $cars->car_number = $request['car_number'];
        $cars->car_model = $request['car_model'];
        $cars->car_status = $request['car_status'];
        $cars->rent_price = $request['rent_price'];
        $cars->driver_id = $request['driver_id'];
        $cars->save();

        return redirect('/cars/view');
        // ------------
    }
    public function carsview()
    {
        $cars = Cars::all();
        $data = compact('cars');
        return view('cars-view')->with($data);
    }

    public function carsdelete($id)
    {
        $cars = Cars::find($id);
        if (!is_null($cars))
        {
            $cars->delete();
        }
        return redirect('cars/view');
        
    }

    public function carsedit($id)
    {
        $cars = Cars::find($id);
        if(is_null($cars))
        {
            // not found
            return redirect('cars/view');
        }
        else
        {
            $url = url('/cars/update') . "/" . $id;
            $data = compact('cars' ,'url');
            return view('carseditform')->with($data);
        }
    }

    public function carsupdate($id, Request $request)
    {
        $cars = Cars::find($id);
        
        $cars->car_number = $request['car_number'];
        $cars->car_model = $request['car_model'];
        $cars->car_status = $request['car_status'];
        $cars->rent_price = $request['rent_price'];
        $cars->driver_id = $request['driver_id'];
        $cars->save();
        return redirect('cars/view');
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
