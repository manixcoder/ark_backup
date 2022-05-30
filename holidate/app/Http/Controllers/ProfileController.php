<?php

namespace App\Http\Controllers;

use App\Country;
use App\Language;
use App\Post;
use App\ProfessionalCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Validator;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }

    public function user_profile()
    {
        App::setLocale(session()->get('locale'));
        $posts = Post::where('user_id', Auth::User()->id)->get();
        $user_hobbies = Auth::User()->hobbies;
        $meuser = Auth::User();
        // dd($user->country);
        return view('holidates_web.profile', compact('posts', 'user_hobbies', 'meuser'));
    }

    public function user_profile_pic_edit(Request $request)
    {
        App::setLocale(session()->get('locale'));
        $user = Auth::User();
        Validator::make($request->all(), [
            'profile_image' => 'required|max:3000',
        ])->validate();
        if ($files = $request->profile_image) {
            $destinationPath = ('profile_image');
            $profileImage = date('YmdHis') . "-" . $files->getClientOriginalName();
            $path = $files->move($destinationPath, $profileImage);
            $image = $insert['photo'] = "$profileImage";
        }

        // if($request->hasFile('profile_image'))
        // {
        //     // Get filename with the extension
        //     $filenameWithExt = $request->file('profile_image')->getClientOriginalName();
        //     // Get just filename
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //     // get just ext
        //     $extension = $request->file('profile_image')->getClientOriginalExtension();
        //     // filename to store
        //     $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //     // upload image
        //     $path = $request->file('profile_image')->storeAs('public/profile_image', $fileNameToStore);
        // }

        $user->profile_image = $profileImage;
        $user->save();
        return redirect(route('user.profile'));
    }

    public function edit()
    {
        App::setLocale(session()->get('locale'));
        $user = User::find(Auth::User()->id);
        // $hobs = Hobbie::select('id')->where('user_id', $user->id)->get();
        $hobs = DB::table('hobbie_user')->select('hobbie_id')->where('user_id', $user->id)->get()->toArray();
        // dd($hobs);
        // $hobbies = Hobbie::where('id', $hobs)->get();
        // $hobs = get_object_vars($hobs);
        $hobs = json_decode(json_encode($hobs), true);
        $hobbies = DB::table('hobbies')->whereNotIn('id', $hobs)->get();
        $countries = Country::all();
        $languages = Language::all();
        $langs = Language::all()->toArray();
        $pro_categories = ProfessionalCategory::all();
        return view('holidates_web.profile_edit', compact('user', 'hobbies', 'countries', 'languages', 'langs', 'pro_categories'));
    }

    public function update(Request $request)
    {
        App::setLocale(session()->get('locale'));
        // dd($request->all());
        Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
        ])->validate();
        $user = User::find(Auth::User()->id);
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->phone = $request->input('phone');
        $user->web = $request->input('web');
        $user->address = $request->input('address');
        $user->latitude = $request->input('latitude');
        $user->longitude = $request->input('longitude');
        $user->country_id = $request->input('country_id');
        $user->professional_category_id = $request->input('professional_category_id');
        $user->age = $request->input('age');
        $user->current_company = $request->input('current_company');
        $user->marital_status = $request->input('marital_status');
        $user->vacation_city = $request->input('vacation_city');
        $user->city = $request->input('city');
        // smo
        $user->facebook = $request->input('facebook');
        $user->twitter = $request->input('twitter');
        $user->instagram = $request->input('instagram');
        $user->youtube = $request->input('youtube');
        $user->linkedin = $request->input('linkedin');

        $user->save();
        $hobbies = $request->input('hobbies');
        $user->hobbies()->sync($hobbies);
        $languages = $request->input('languages');
        $user->languages()->sync($languages);

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

    public function updatepassword(Request $request)
    {
        App::setLocale(session()->get('locale'));
        Validator::make($request->all(), [
            'password' => 'required',
            'newpassword' => 'required',
            'confirmation_newpassword' => 'required|same:newpassword',
        ])->validate();
        $user = User::find(Auth::User()->id);
        if (Hash::check($request->password, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->newpassword),
            ])->save();
            $request->session()->flash('success', 'Password changed');
            return redirect(URL::to('/user_profile#passwordChange'));
        } else {
            $request->session()->flash('error', 'Password does not match');
            return redirect(URL::to('/user_profile#passwordChange'));
        }
        $user = User::find(Auth::User()->id);
        $user->save();
        return redirect(URL::to('/user_profile#passwordChange'));
    }
}
