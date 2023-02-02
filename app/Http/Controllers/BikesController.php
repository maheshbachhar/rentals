<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bikes;

class BikesController extends Controller
{
    public function bikesadd()
    {
        $url = url('/bikes');
        $title = "Bikes Registration";
        $data = compact('url', 'title');
        return view('bikesform')->with($data);
    }

    

    public function bikes(Request $request)
    {
        echo "<pre>";
        print_r($request->all());

        // insert query
        $bikes = new Bikes;
        $bikes->fname = $request['fname'];
        $bikes->lname = $request['lname'];
        $bikes->gender = $request['gender'];
        $bikes->age = $request['age'];
        $bikes->contact_address = $request['contact_address'];
        $bikes->admin_email = $request['admin_email'];
        $bikes->admin_password = md5($request['admin_password']);
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
            $title = "Update Bikes";
            $url = url('/bikes/update') . "/" . $id;
            $data = compact('bikes', 'url', 'title');
            return view('bikesform')->with($data);
        }
    }

    public function bikesupdate($id, Request $request)
    {
        $bikes = Bikes::find($id);
        $bikes->fname = $request['fname'];
        $bikes->lname = $request['lname'];
        $bikes->gender = $request['gender'];
        $bikes->age = $request['age'];
        $bikes->contact_address = $request['contact_address'];
        $bikes->admin_email = $request['admin_email'];
        $bikes->save();
        return redirect('bikes/view');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

}
