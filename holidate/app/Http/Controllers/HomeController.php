<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Response;
use Session;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }
    public function Dashboard(Request $request)
    {
        echo "hello";die;
        $id = Session::get('gorgID');
        $OrgData = DB::table('users')->where('id', $id)->first();
        if ($userRole == '1') {
            $usredata = DB::table('users')->count();
            $data['common_content'] = 'holidates_web.home';
            return view('web_layout.common_content', compact('data'));
        }
    }
    public function useremail($y)
    {
        print_r($y);die;
        $data = User::where('email', $y)->first();
        if ($data != '') {
            return Response::json($data);
        }
    }
    public function checkemailexist(Request $request)
    {
        // $email = $request->input('email');
        // if (User::where('email', '=', $email)->count() > 0) {
        //     $msg = "This is a simple message.";
        //     return response($msg);
        //  } else{
        //     $msg = "This is a simple message.";
        //     return response('n', $msg);
        //  }
        $email = $request->input('email');
        $isExists = \App\User::where('email', $email)->first();
        if ($isExists) {
            return response()->json(array("exists" => true));
        } else {
            return response()->json(array("exists" => false));
        }
    }
    public function add_user(Request $request)
    {
        // print_r($request->all()); die;
        App::setLocale(session()->get('locale'));
        if ($files = $request->profile_image) {
            $destinationPath = public_path('/profile_image/');
            $profileImage = date('YmdHis') . "-" . $files->getClientOriginalName();
            $path = $files->move($destinationPath, $profileImage);
            $image = $insert['photo'] = "$profileImage";
        }
        $data = array(
            'name' => $request->name,
            'surname' => $request->surname,
            // 'social_network_profile' => $request->social_network_profile,
            'phone' => $request->phone,
            // 'web' => $request->web,
            // 'address' => $request->address,
            'email' => $request->email,
            // 'country_id' => $request->country_id,
            // 'languages_id' => $request->languages_id,
            // 'age' => $request->age,
            // 'category_id' => $request->category_id,
            // 'current_company' => $request->current_company,
            // 'hobbies_id' => $request->hobbies_id,
            // 'hosted_at' => $request->hosted_at,
            // 'from_to' => $request->from_to,
            'profile_image' => $image,
            'password' => Hash::make($request->password),
            'users_role' => 2,
            // 'profile_image' => $image,
            // 'status' => $request->status,
            'created_at' => date('Y-m-d H:i:s'),
        );
        //print_r($data); die;
        if ($request->ids != '') {
            Session::flash('success', 'Updated Successfully..!');
            $updateData = DB::table('users')->where('id', $request->ids)->update($data);
            return back();
        } else {
            Session::flash('success', 'Inserted Successfully..!');
            $insertData = DB::table('users')->insert($data);
            $user = User::orderBy('created_at', 'desc')->first();
            $hobbies = $request->input('hobbies');
            $user->hobbies()->sync($hobbies);
            return Redirect('home');
        }
    }
/* Catrgory Routes End */
    public function home_search(Request $request)
    {
        App::setLocale(session()->get('locale'));
        $search_data = DB::table('public_data')->where('comment', 'LIKE', '%' . $request->comment . '%')->get();
        return view('holidates_web.home', compact('search_data'));
    }
    public function add_category(Request $request)
    {
        App::setLocale(session()->get('locale'));
        if ($files = $request->image) {
            $destinationPath = public_path('/category_image/');
            $profileImage = date('YmdHis') . "-" . $files->getClientOriginalName();
            $path = $files->move($destinationPath, $profileImage);
            $image = $insert['photo'] = "$profileImage";
        }
        $data = array(
            'category_name' => $request->category_name,
            'image' => $image,
            'created_at' => date('Y-m-d H:i:s'),
        );
        $insertData = DB::table('category')->insert($data);
        return back();
    }
}
