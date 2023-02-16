<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Twilio\Rest\Client;

class TransactionController extends Controller
{
    public function index()
    {
        $this->sendMessage('test','+9779806879263');
    }
    
    public function transactionadd(Request $request)
    {
        
        return view('transactionaddform');
    }

    

    public function transaction(Request $request)
    {
        echo "<pre>";
        print_r($request->all());

        // insert query
        $transaction = new Transaction;
        $transaction->transaction_name = $request['transaction_name'];
        $transaction->rental_id = $request['rental_id'];
        $transaction->bike_id = $request['bike_id'];
        $transaction->car_id = $request['car_id'];
        $transaction->customer_id = $request['customer_id'];
        $transaction->admin_id = $request['admin_id'];
        $transaction->save();

        return redirect('/transaction/view');
        // ------------
    }
    public function transactionview()
    {
        $transaction = Transaction::all();
        $data = compact('transaction');
        return view('transaction-view')->with($data);
    }

    public function transactiondelete($id)
    {
        $transaction = Transaction::find($id);
        if (!is_null($transaction))
        {
            $transaction->delete();
        }
        return redirect('transaction/view');
        
    }

    public function transactionedit($id)
    {
        $transaction = Transaction::find($id);
        if(is_null($transaction))
        {
            // not found
            return redirect('transaction/view');
        }
        else
        {
            $url = url('/transaction/update') . "/" . $id;
            $data = compact('transaction' ,'url');
            return view('transactioneditform')->with($data);
        }
    }

    public function transactionupdate($id, Request $request)
    {
        $transaction = Transaction::find($id);
        $transaction->transaction_name = $request['transaction_name'];
        $transaction->rental_id = $request['rental_id'];
        $transaction->bike_id = $request['bike_id'];
        $transaction->car_id = $request['car_id'];
        $transaction->customer_id = $request['customer_id'];
        $transaction->admin_id = $request['admin_id'];
        $transaction->save();
        return redirect('transaction/view');
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
