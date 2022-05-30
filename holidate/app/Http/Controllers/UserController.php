<?php

namespace App\Http\Controllers;

use App\Business;
use App\Category;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Validator;
use App\Post;
use App\User;
use DB;
use Hash;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;
use stdClass;
use Validator;

class UserController extends Controller
{

    /*public function __construct()
    {
    $this->middleware('auth');
    $this->middleware('role');
    } */

    // public function search(Request $request)
    // {
    //     Validator::make($request->all(), [
    //         'search' => 'required',
    //     ])->validate();
    //     $search = $request->input('search');
    //     $categories = Category::all();
    //     $results = Post::where('heading', 'like', '%' . $request->search . '%')->orWhere('comment', 'like', '%' . $request->search . '%')->get();
    //     $cat = 0;
    //     return view('holidates_web.search_result', compact('results', 'search', 'categories', 'cat'));
    // }
    public function search(Request $request)
    {
        App::setLocale(session()->get('locale'));
        Validator::make($request->all(), [
            'mycity' => 'required',
            'search' => 'required',
        ])->validate();
        $search = $request->input('search');
        $lat = $request->input('lat');
        $lng = $request->input('lng');
        $distance = 50;
        $categories = Category::all();
        $results = Post::where('heading', 'like', '%' . $request->search . '%')->orWhere('comment', 'like', '%' . $request->search . '%')->pluck('user_id');
        $cat = 0;
        // dd($results);
        $getUsersbyResults = User::whereIn('id', $results)->pluck('id');
        $user_by_business = Business::where('name', 'like', '%'. $request->search . '%')->pluck('user_id');
        $business = Business::where('name', 'like', '%'. $request->search . '%')->pluck('id');
        // dd($business);
        if( sizeof($business) == 0){
            $guest_list = collect(new User);
        }else{
            $guest_list = DB::table('business_guest')->where('business_id', $business)->pluck('guest_id');
        }
       
        
        $business_guest_list = Business::where('name', 'like', '%'. $request->search . '%')->pluck('user_id');
        // dd($user_by_business);
        // $get_business_users = User::whereIn('id', $user_by_business)->pluck('id');
        $nearUsers =  User::select('id',DB::raw('( 0.621371 * 3959 * acos( cos( radians(' . $lat . ') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $lng . ') ) + sin( radians(' . $lat . ') ) * sin( radians(latitude) ) ) ) AS distance'))->havingRaw('distance < ' . $distance)->get();
        $nearUsers = $nearUsers->pluck('id');
        $newusers =  $getUsersbyResults->merge($user_by_business);
        $newusers =  $guest_list->merge($newusers);

        // dd($nearUsers);
        $users = User::whereIn('id', $newusers)->whereIn('id', $nearUsers)->get();
        return view('holidates_web.search_result', compact('results', 'search', 'categories', 'cat' ,'users'));
    }
    
    public function search_cat($id)
    {
        App::setLocale(session()->get('locale'));
        $search = Session::get('search');
        $results = Post::where('category_id', $id)->where('heading', 'like', '%' . $search . '%')->orWhere('comment', 'like', '%' . $search . '%')->get();
        // $category = Category::findOrFail($id);
        $categories = Category::all();
        $cat = Category::findOrFail($id);
        return view('holidates_web.search_result', compact('results', 'search', 'categories', 'cat'));
    }

    public function allpeople()
    {
        App::setLocale(session()->get('locale'));
        $users = User::all();
        return view('holidates_web.allpeople', compact('users'));
    }
    public function latest_publications()
    {
        App::setLocale(session()->get('locale'));
        // $users = User::all();
        $latest_users = Post::orderBy('created_at', 'desc')->take(20)->get();
        return view('holidates_web.all_latest_users', compact('latest_users'));
    }
    public function connect($id)
    {
        App::setLocale(session()->get('locale'));
        $user = User::find($id);
        return view('holidates_web.connect_people', compact('user'));
    }
    public function add_user(Request $request)
    {
        App::setLocale(session()->get('locale'));
        Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
        ])->validate();
        if ($files = $request->profile_image) {
            $destinationPath = ('profile_image');
            $profileImage = date('YmdHis') . "-" . $files->getClientOriginalName();
            $path = $files->move($destinationPath, $profileImage);
            $image = $insert['photo'] = "$profileImage";
        }
        $user = New User();
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->age = $request->input('age');
        $user->password = Hash::make($request->input('password'));       
        $user->profile_image = $image;
        $user->users_role = 2;
        $user->score = 32;
        $user->save();
        $hobbies = $request->input('hobbies');
        $user->hobbies()->sync($hobbies);
        return redirect('login_web');
    }
    
    // public function add_user(Request $request)
    // {
    //     // print_r($request->all()); die;
    //     Validator::make($request->all(), [
    //         'name' => 'required|regex:/^[a-z A-Z]+$/u|max:255',
    //         'email' => 'required|unique:users',
    //         'password' => 'required|min:8|max:16|confirmed',
    //     ])->validate();
    //     /*echo "hello"; die;*/
    //     if ($files = $request->profile_image) {
    //         $destinationPath = ('profile_image');
    //         $profileImage = date('YmdHis') . "-" . $files->getClientOriginalName();
    //         $path = $files->move($destinationPath, $profileImage);
    //         $image = $insert['photo'] = "$profileImage";
    //     }
    //     $data = array(
    //         'name' => $request->name,
    //         'surname' => $request->surname,
    //         // 'social_network_profile' => $request->social_network_profile,
    //         'phone' => $request->phone,
    //         'web' => $request->web,
    //         // 'address' => $request->address,
    //         'email' => $request->email,
    //         // 'country_id' => $request->country,
    //         // 'languages_id' => $request->languages_id,
    //         'age' => $request->age,
    //         // 'category_id' => $request->category_id,
    //         // 'current_company' => $request->current_company,
    //         // 'hobbies_id' => $request->hobbies,
    //         // 'hosted_at' => $request->hosted_at,
    //         // 'from_to' => $request->from_to,
    //         'profile_image' => $image,
    //         'password' => Hash::make($request->password),
    //         'users_role' => 2,
    //         // 'status' => $request->status,
    //         'created_at' => date('Y-m-d H:i:s'),
    //     );
    //     $hobbies = $request->input('hobbies');
    //     //print_r($data); die;
    //     if ($request->ids != '') {
    //         Session::flash('success', 'Updated Successfully..!');
    //         $updateData = DB::table('users')->where('id', $request->ids)->update($data);
    //         return back();
    //     } else {
    //         //echo 'hello'; die;
    //         Session::flash('success', 'Inserted Successfully..!');
    //         $insertData = DB::table('users')->insertGetId($data);
    //         $user = User::find($insertData);
    //         $user->hobbies()->sync($hobbies);
    //         return Redirect('login_web');
    //     }
    // }

/* Catrgory Routes End */
}
