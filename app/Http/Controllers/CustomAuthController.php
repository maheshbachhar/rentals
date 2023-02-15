<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Twilio\Rest\Client;

class CustomAuthController extends Controller
{
    public function showOtpForm()
    {
        $this->sendMessage('test','+9779806879263');
    }
    
    public function showLoginForm()
    {
        return view(view:'customAuth.login');
    }

    public function showRegisterForm()
    {
        return view(view:'customAuth.register');
    }


    public function customLogin(Request $request)
    {
        //find the user

        $user = User::where('email', $request->email)->first();
        if($user){
            $otp = rand(10,10000000);
            if(Hash::check($request->password, $user->password)){
                User::where('id',$user->id)->update(['otp' => $otp]);
                auth()->Login($user);
                $user_id = $user->id;
                $message = 'Your OTP is'. $otp;
                $this->sendMessage($message,'+9779806879263');
                return view('verify', compact('user_id'));
                
            }
            return redirect()->back();
        }

        return redirect()->back();
    }

    public function customRegister(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
               
            ]
        );
        
        try {
            $data = [];

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ];

            User::insert($data);
            return redirect()->route(route: 'custom.login.show');

        }catch(Exception $exception)
        {
            dd($exception);
        }

        
    }

    public function customLogout()
    {
        if(auth()->check()){
            auth()->Logout();
            session()->flush();
            return redirect()->route(route: 'custom.login.show');
        }
    }

    

    public function verifyOtp(Request $request, $id)
    {
        if(!$id){
            return redirect()->back();
        }
        $user = User::where('id', $id)->first();
        if($user){
            if($user->otp == $request->otp){
                return redirect()->route('dashboard');
            }
        }
        return redirect()->back();
    }

    private function sendMessage($message, $recipients)
    {
        $sid = "AC754e3f4b7b461402dc2f3daa4ee83fb2";
        $token = "b57839dc61fe7dddba98720a6f898140";
        $twilio = new Client($sid, $token);
        $client = new Client($sid, $token);
        $message = $twilio->messages->create("+9779806879263", array("messagingServiceSid" => "MG297979b56a8da30aeacc68d265ca9877", "body" => $message ));
    }
    
}
