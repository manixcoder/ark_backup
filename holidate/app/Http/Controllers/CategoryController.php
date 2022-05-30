<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        App::setLocale(session()->get('locale'));
        $categories = Category::all();
        return view('holidates_web.category.showall', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        App::setLocale(session()->get('locale'));
        return view('holidates_web.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /* print_r($request->all()); die;*/
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
        return redirect(URL::to('/home#categoriesHere'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        App::setLocale(session()->get('locale'));
        $category = Category::find($id);
        $posts = Post::where('category_id', $category->id)->pluck('user_id')->toArray();
        // dd($posts);        
        $users = User::whereIn('id', $posts)->get();        
        // dd($users);
        return view('holidates_web.category.show', compact('category', 'posts', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        App::setLocale(session()->get('locale'));
        $category = Category::find($id);
        $category->delete();
        return redirect(URL::to('/home#categoriesHere'));
    }
}
