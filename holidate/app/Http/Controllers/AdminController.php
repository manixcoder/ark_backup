<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Hobbie;
use App\Language;
use App\Post;
use App\ProfessionalCategory;
use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminauth')->except(['login']);
        // $this->middleware('auth');
    }
    public function login(){
        App::setLocale(session()->get('locale'));
        Auth::logout();
        return view('admin.login');
    }
    public function dashboard(){
        App::setLocale(session()->get('locale'));
        $users = User::latest()->get();
        $categories = Category::latest()->get();
        $posts = Post::latest()->get();
        $latestusers = User::latest()->take(10)->get();
        $latestposts = Post::latest("updated_at")->take(10)->get();
        // Session::flash('error', 'Some thing is wrong. Please try again');
        return view('admin.dashboard', compact('users', 'categories', 'posts', 'latestusers', 'latestposts'));
    }
    public function users(){
        App::setLocale(session()->get('locale'));
        $users = User::latest()->paginate(20);
        $hobbies = Hobbie::all();
        $languages = Language::all();
        $countries = Country::all();
        $pro_categories = ProfessionalCategory::all();
        return view('admin.users', compact('users', 'hobbies', 'languages', 'countries', 'pro_categories'));
    }
    public function search_user(Request $request){
        App::setLocale(session()->get('locale'));
        Validator::make($request->all(), [
            'search' => 'required',
        ])->validate();
        $search = $request->search;
        $from = $request->from;
        $to = $request->to;
        $users = User::where('name', 'like', '%' . $request->search . '%')->orWhere('surname', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->pluck('id');
        if($from = '' && $to = ''){
            $users = User::whereIn('id', $users)->whereBetween('created_at', [$from, $to])->paginate(20);
        }else{
            $users = User::whereIn('id', $users)->paginate(20);
        }
        $hobbies = Hobbie::all();
        $languages = Language::all();
        $countries = Country::all();
        $pro_categories = ProfessionalCategory::all();
        return view('admin.users', compact('users', 'hobbies', 'languages', 'countries', 'pro_categories', 'search'));
    }
    public function update_user_image(Request $request){
        App::setLocale(session()->get('locale'));
        $user_id = $request->input('user_id');
        $user = User::find($user_id);
        // dd($user);
        Validator::make($request->all(), [
            'profile_image' => 'required|max:3000',
        ])->validate();
        if ($files = $request->profile_image) {
            $destinationPath = ('profile_image');
            $profileImage = date('YmdHis') . "-" . $files->getClientOriginalName();
            $path = $files->move($destinationPath, $profileImage);
            $image = $insert['photo'] = "$profileImage";
        }
        $user->profile_image = $profileImage;
        $user->save();
        return redirect(route('adminpanel.users'));
    }
    public function update_user_password(Request $request){
        App::setLocale(session()->get('locale'));
        $user_id = $request->input('user_id');
        $user = User::find($user_id);
        // dd($user);
        Validator::make($request->all(), [
            'newpassword' => 'required',
        ])->validate();
        $user->fill([
            'password' => Hash::make($request->newpassword),
        ])->save();
        // $user->save();
        return redirect(route('adminpanel.users'));
    }
    public function update_user(Request $request){
        App::setLocale(session()->get('locale'));
        // dd($request->all());
        Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
        ])->validate();
        $user_id = $request->input('user_id');
        $user = User::find($user_id);
        // dd($user);
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
        return redirect(route('adminpanel.users'));
    }
    public function delete_user($id){
        App::setLocale(session()->get('locale'));
        $user = User::find($id);
        $user->delete();
        return redirect(route('adminpanel.users'));
    }

    /* posts */

    public function posts(){
        App::setLocale(session()->get('locale'));
        $posts = Post::latest()->paginate(10);
        return view('admin.posts', compact('posts'));
    }
    public function post_update(Request $request){
        App::setLocale(session()->get('locale'));
        $post_id = $request->input('post_id');
        $post = Post::find($post_id);
        $post->category_id = $request->input('category_id');
        $post->heading = $request->input('heading');
        $post->comment = $request->input('comment');
        $post->save();
        return back();
    }
    public function delete_post($id){
        App::setLocale(session()->get('locale'));
        $post = Post::find($id);
        $post->delete();
        return redirect(route('adminpanel.posts'));
    }

    /* categories */

    public function categories(){
        App::setLocale(session()->get('locale'));
        $categories = Category::latest()->get();
        return view('admin.categories', compact('categories'));
    }
    public function category_store(Request $request)
    {
        App::setLocale(session()->get('locale'));
        Validator::make($request->all(),[
            'category_name' => 'required',
            'image' => 'required|max:3000'
        ])->validate();
        if($files = $request->image){
            $destinationPath = ('category_image');
            $profileImage = date('YmdHis') . "-" . $files->getClientOriginalName();
            $path =  $files->move($destinationPath, $profileImage);
            $image = $insert['photo'] = "$profileImage";
        }
        $category = New Category();        
        $category->category_name = $request->input('category_name');
        $category->image = $image;
        $category->save();
        return redirect(route('adminpanel.categories'));
    }
    public function category_update(Request $request)
    {
        App::setLocale(session()->get('locale'));
        Validator::make($request->all(),[
            'category_name' => 'required',
            'image' => 'required|max:3000'
        ])->validate();
        if($files = $request->image){
            $destinationPath = ('category_image');
            $profileImage = date('YmdHis') . "-" . $files->getClientOriginalName();
            $path =  $files->move($destinationPath, $profileImage);
            $image = $insert['photo'] = "$profileImage";
        }
        $category_id = $request->input('category_id');
        $category = Category::find($category_id);    
        $category->category_name = $request->input('category_name');
        $category->image = $image;
        $category->save();
        return redirect(route('adminpanel.categories'));
    }
    public function category_delete($id)
    {
        App::setLocale(session()->get('locale'));
        $category = Category::find($id);
        $category->delete();
        return redirect(route('adminpanel.categories'));
    }
    /* report */
    // public function report(){
    //     App::setLocale(session()->get('locale'));
    //     $users = User::latest()->get();
    //     $categories = Category::latest()->get();
    //     $posts = Post::latest()->get();
    //     return view('admin.report', compact('users', 'categories', 'posts'));
    // }
    public function filterWeekly(){
        App::setLocale(session()->get('locale'));
        $txt = 'Week';
        // dd(Carbon::now()->startOfQuarter());
        $users = User::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->latest()->get();
        $categories = Category::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->latest()->get();
        $posts = Post::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->latest()->get();
        return view('admin.report', compact('users', 'categories', 'posts', 'txt'));
    }
    public function filterMonthly(){
        App::setLocale(session()->get('locale'));
        $txt = 'Month';
        $users = User::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->latest()->get();
        $categories = Category::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->latest()->get();
        $posts = Post::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->latest()->get();
        return view('admin.report', compact('users', 'categories', 'posts', 'txt'));
    }
    public function filterQuarterly(){
        App::setLocale(session()->get('locale'));
        $txt = 'Quarter';
        $users = User::whereBetween('created_at', [Carbon::now()->startOfQuarter(), Carbon::now()->endOfQuarter()])->latest()->get();
        $categories = Category::whereBetween('created_at', [Carbon::now()->startOfQuarter(), Carbon::now()->endOfQuarter()])->latest()->get();
        $posts = Post::whereBetween('created_at', [Carbon::now()->startOfQuarter(), Carbon::now()->endOfQuarter()])->latest()->get();
        return view('admin.report', compact('users', 'categories', 'posts', 'txt'));
    }
}
