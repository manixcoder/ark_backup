<?php

namespace App\Http\Controllers;

use App\Business;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Validator;

class BusinessController extends Controller
{
    public function store(Request $request){
        App::setLocale(session()->get('locale'));
        Validator::make($request->all(),[
            'name' => 'required',
        ])->validate();
        $business = New Business();
        $business->user_id = Auth::User()->id;
        $business->business_category_id = $request->input('category_id');
        $business->name = $request->input('name');
        $business->latitude = $request->input('lat');
        $business->longitude = $request->input('lng');
        $business->address = $request->input('address');
        $business->guest_list = $request->input('guest_list');
        $business->save();
        $user = Auth::User();
        // counting score
        $userScore = 0;
        $expectedScore = 15;
        if(!$user->name){}else {$userScore++;}
        if(!$user->surname){}else {$userScore++;}
        if(!$user->phone){}else {$userScore++;}
        if(!$user->email){}else {$userScore++;}
        if(!$user->web){}else {$userScore++;}
        if(!$user->address){}else {$userScore++;}
        if(!$user->country_id){}else {$userScore++;}
        if(!$user->age){}else {$userScore++;}
        if(!$user->city){}else {$userScore++;}
        if(!$user->current_company){}else {$userScore++;}
        if($user->marital_status == 'Select Your Status'){}else {$userScore++;}
        if(!$user->vacation_city){}else {$userScore++;}
        if($user->hobbies->count() == 0){}else {$userScore++;}
        if($user->languages->count() == 0){}else {$userScore++;}
        if($user->posts->count() == 0){}else {$userScore++;}
        $finalScore = floor($userScore/$expectedScore*100);
        $user->score = $finalScore;
        // end score counting
        $user->save();
        return redirect(route('user.profile'));
    }
    public function update(Request $request)
    {
        App::setLocale(session()->get('locale'));
        if(Auth::User()->business){
            Validator::make($request->all(),[
                'name' => 'required',
            ])->validate();
            $business = Business::where('user_id', Auth::User()->id)->first();
            $business->user_id = Auth::User()->id;
            $business->business_category_id = $request->input('category_id');
            $business->name = $request->input('name');
            $business->latitude = $request->input('lat');
            $business->longitude = $request->input('lng');
            $business->address = $request->input('address');
            // $business->guest_list = $request->input('guest_list');
            $business->save();
            $emails = $request->input('guest_list');
            $emails = str_replace(' ', '', $emails);
            $emails = explode (",",$emails);
            $guests = User::whereIn('email', $emails)->pluck('id');
            $business->guests()->sync($guests);
            return redirect(route('user.profile'));
        } else {
            Validator::make($request->all(),[
                'name' => 'required',
            ])->validate();
            $business = New Business();
            $business->user_id = Auth::User()->id;
            $business->business_category_id = $request->input('category_id');
            $business->name = $request->input('name');
            $business->latitude = $request->input('lat');
            $business->longitude = $request->input('lng');
            $business->address = $request->input('address');
            // $business->guest_list = $request->input('guest_list');
            $business->save();
            $emails = $request->input('guest_list');
            $emails = str_replace(' ', '', $emails);
            $emails = explode (",",$emails);
            $guests = User::whereIn('email', $emails)->pluck('id');
            $business->guests()->sync($guests);
            return redirect(route('user.profile'));
        }
    }
}
