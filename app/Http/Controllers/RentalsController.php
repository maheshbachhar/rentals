<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rentals;
use Twilio\Rest\Client;

class RentalsController extends Controller
{
    public function index()
    {
        $this->sendMessage('test','+9779806879263');
    }
    
    public function rentalsadd(Request $request)
    {
        
        return view('rentalsaddform');
    }

    

    public function rentals(Request $request)
    {
        echo "<pre>";
        print_r($request->all());

        // insert query
        $rentals = new Rentals;
        $rentals->rental_number = $request['rental_number'];
        $rentals->rent_date = $request['rent_date'];
        $rentals->arrive_date = $request['arrive_date'];
        $rentals->destination = $request['destination'];
        $rentals->return_date = $request['return_date'];
        $rentals->payment = $request['payment'];
        $rentals->save();

        return redirect('/rentals/view');
        // ------------
    }
    public function rentalsview()
    {
        $rentals = Rentals::all();
        $data = compact('rentals');
        return view('rentals-view')->with($data);
    }

    public function rentalsdelete($id)
    {
        $rentals = Rentals::find($id);
        if (!is_null($rentals))
        {
            $rentals->delete();
        }
        return redirect('rentals/view');
        
    }

    public function rentalsedit($id)
    {
        $rentals = Rentals::find($id);
        if(is_null($rentals))
        {
            // not found
            return redirect('rentals/view');
        }
        else
        {
            $url = url('/rentals/update') . "/" . $id;
            $data = compact('rentals' ,'url');
            return view('rentalseditform')->with($data);
        }
    }

    public function rentalsupdate($id, Request $request)
    {
        $rentals = Rentals::find($id);
        $rentals->rental_number = $request['rental_number'];
        $rentals->rent_date = $request['rent_date'];
        $rentals->arrive_date = $request['arrive_date'];
        $rentals->destination = $request['destination'];
        $rentals->return_date = $request['return_date'];
        $rentals->payment = $request['payment'];
        $rentals->save();
        return redirect('rentals/view');
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
