<?php

namespace App\Http\Controllers;
 use Illuminate\Http\Request;
 use App\Track;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
    
    /**
     * Display a Check User
     *
     * @return Response
     */
    public function checkUser( Request $request) {

        $this->validate($request, [
            'phone_number' => 'required',
           
        ]);
        
        $number = $request->input('phone_number');
        $users  =Track::where('phone_number', $number)->get();
        

        if ($users->count()) {

            $data = collect(["status" => ["code" => "100", "message" => "Success", "data" => $users]]);
        } else {
           
            $users = collect();

             $user = new Track();
             $user->security_code =1234;
             $users->add($user);
            $data = collect(["status" => [ "code" => "101", "message" => "No Records", "data" => $users]]);
           // $data = collect(["status" => [ "code" => "101", "message" => "No Records", "data" =>['security_code' =>1234]]]);
        }
        return response()->json($data, 200);
    }
    
    
     /**
     * Display a Create User
     *
     * @return Response
     */
    public function createUser( Request $request) {

        $this->validate($request, [
            'phone_number' => 'required',
            'ipin' => 'required',
            'security_code' => 'required',
           
        ]);
        
         $number = $request->input('phone_number');
         $securityCode = $request->input('security_code');
         $ipin = $request->input('ipin');
         $users  =Track::where('phone_number', $number)->get();
        

        if ($users->count()) {
            
           Track::where('phone_number', $number)->update(['security_code' => $securityCode ,'ipin' =>$ipin]);
           $user = Track::where('phone_number', $number)->get();
            
        }else{
            
            $user = new Track;
            $user->phone_number = $request->input('phone_number');
            $user->ipin = $request->input('ipin');
            $user->security_code = $request->input('security_code');
            //$user->security_code = app('hash')->make($plainPassword);

            $user->save(); 
        }
        
        
        $users  =Track::where('phone_number', $number)->get();
        if ($users->count()) {
               if($user[0]->name==null){
                     $user[0]->name="";
                }
                if($user[0]->profile_pic==null){
                     $user[0]->profile_pic="";
                }
            $data = collect(["status" => ["code" => "100", "message" => "Success", "data" => $user]]);
        } else {
            $data = collect(["status" => [ "code" => "101", "message" => "Error"]]);
        }
        return response()->json($data, 200);
    }


 /**
     * Display a get Otp
     *
     * @return Response
     */
    public function getSecurityCode( Request $request) {

        $this->validate($request, [
            'phone_number' => 'required',
           
        ]);
        
        $number = $request->input('phone_number');
        $users  =Track::where('phone_number', $number)->get();
        $securityCode = rand(1000,9999);


        if ($users->count()) {

           Track::where('phone_number', $number)->update(['security_code' => $securityCode ]);
           $users  =Track::where('phone_number', $number)->get();
             $data = collect(["status" => [ "code" => "100", "message" => "Success", "data" => $users]]);
           // $data = collect(["status" => [ "code" => "101", "message" => "No Records", "data" =>['security_code' =>1234]]]);
        } else {
           
           $user = new Track;
            $user->phone_number = $request->input('phone_number');
            $user->security_code = $securityCode;
            //$user->security_code = app('hash')->make($plainPassword);
            $user->save();
            
            $users  =Track::where('phone_number', $number)->get();
            $data = collect(["status" => [ "code" => "100", "message" => "Success", "data" => $users]]);
        }
        return response()->json($data, 200);
    }

    /**
     * Display a Introduction Value.
     *
     * @return Response
     */
    public function getUsers() {

       
        $users  =Track::all();
        

        if ($users->count()) {

            $data = collect(["status" => ["code" => "100", "message" => "Success", "data" => $users]]);
        } else {
            $data = collect(["status" => [ "code" => "101", "message" => "No Records"]]);
        }
        return response()->json($data, 200);
    }

    /**
     * Display a Introduction Value.
     *
     * @return Response
     */
    public function getDashboard() {

       
       
        $introduction  =Introduction::all();
        $services  =Services::all();
        $clients  =Clients::all();
        $sampleWorks  =SampleWork::all();
        $pagedata = collect(["introduction" =>$introduction , "services" =>$services,"clients"=>$clients ,"sampleWorks" => $sampleWorks ]);
        $data = collect(["status" => ["code" => "100", "message" => "Success", "data" =>  $pagedata]]);
      /*
        if ($countries->count()) {

            $data = collect(["status" => ["code" => "100", "message" => "Success", "data" => $countries]]);
        } else {
            $data = collect(["status" => [ "code" => "101", "message" => "No Records"]]);
        }
        */
        
        return response()->json($data, 200);
    }
}
