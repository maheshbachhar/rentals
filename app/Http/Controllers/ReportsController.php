<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports;
use Twilio\Rest\Client;

class ReportsController extends Controller
{
    public function index()
    {
        $this->sendMessage('test','+9779806879263');
    }
    
    public function reportsadd(Request $request)
    {
        
        return view('reportsaddform');
    }

    

    public function reports(Request $request)
    {
        echo "<pre>";
        print_r($request->all());

        // insert query
        $reports = new Reports;
        $reports->transaction_id = $request['transaction_id'];
        $reports->rental_id = $request['rental_id'];
        $reports->report_date = $request['report_date'];
        $reports->save();

        return redirect('/reports/view');
        // ------------
    }
    public function reportsview()
    {
        $reports = Reports::all();
        $data = compact('reports');
        return view('reports-view')->with($data);
    }

    public function reportsdelete($id)
    {
        $reports = Reports::find($id);
        if (!is_null($reports))
        {
            $reports->delete();
        }
        return redirect('reports/view');
        
    }

    public function reportsedit($id)
    {
        $reports = Reports::find($id);
        if(is_null($reports))
        {
            // not found
            return redirect('reports/view');
        }
        else
        {
            $url = url('/reports/update') . "/" . $id;
            $data = compact('reports' ,'url');
            return view('reportseditform')->with($data);
        }
    }

    public function reportsupdate($id, Request $request)
    {
        $reports = Reports::find($id);
        $reports->transaction_id = $request['transaction_id'];
        $reports->rental_id = $request['rental_id'];
        $reports->report_date = $request['report_date'];
        $reports->save();
        return redirect('reports/view');
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
