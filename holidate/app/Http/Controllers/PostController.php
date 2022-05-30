<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        App::setLocale(session()->get('locale'));
        Validator::make($request->all(),[
            'heading' => 'required',
            'comment' => 'required',
        ])->validate();
        $post = New Post();
        $post->user_id = Auth::User()->id;
        $post->category_id = $request->input('category_id');
        $post->heading = $request->input('heading');
        $post->comment = $request->input('comment');
        $post->save();
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        App::setLocale(session()->get('locale'));
        if(Auth::User()->posts->count() > 0){
            Validator::make($request->all(),[
                'heading' => 'required',
                'comment' => 'required',
            ])->validate();
            $post = Post::where('user_id', Auth::User()->id)->first();
            $post->user_id = Auth::User()->id;
            $post->category_id = $request->input('category_id');
            $post->heading = $request->input('heading');
            $post->comment = $request->input('comment');
            $post->save();
            return redirect(route('user.profile'));
        } else {
            Validator::make($request->all(),[
                'heading' => 'required',
                'comment' => 'required',
            ])->validate();
            $post = New Post();
            $post->user_id = Auth::User()->id;
            $post->category_id = $request->input('category_id');
            $post->heading = $request->input('heading');
            $post->comment = $request->input('comment');
            $post->save();
            return redirect(route('user.profile'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
