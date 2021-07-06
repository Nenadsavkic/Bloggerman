<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allPosts = Post::all();

        return view('welcome', compact('allPosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('createBlogForm', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $request->validate([

            'title' => 'required|max:255',
            'body' =>  'required',
            'image1' => 'mimes:jpg,jpeg,png',
            'image2' => 'mimes:jpg,jpeg,png',
            'image3' => 'mimes:jpg,jpeg,png',
            'category' => 'required'
          ]);

          if ($request->hasFile('image1')) {

               $image1 = $request->file('image1');
               $image1_name = time().'1.'.$image1->extension();
               $image1->move(public_path('/images/post_images'),$image1_name);

          }
          if ($request->hasFile('image2')) {

            $image2 = $request->file('image2');
            $image2_name = time().'2.'.$image2->extension();
            $image2->move(public_path('/images/post_images'),$image2_name);

          }
          if ($request->hasFile('image3')) {

            $image3 = $request->file('image3');
            $image3_name = time().'3.'.$image3->extension();
            $image3->move(public_path('/images/post_images'),$image3_name);

          }

          Post::create([

            'title' => $request->title,
            'body' => $request->body,
            'image1' => (isset($image1_name)) ? $image1_name : null,
            'image2' => (isset($image2_name)) ? $image2_name : null,
            'image3' => (isset($image3_name)) ? $image3_name : null,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category

          ]);

          return redirect('/home')->with('message', 'Your post is created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $post = Post::find($id);
         $post->increment('views');

         return view('singlePostView',['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();

        return view('editPost',compact('post', 'categories'));


    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)->get();



        $request->validate([
         'title' => 'required|max:255',
         'body' =>  'required',
         'image1' => 'mimes:jpg,jpeg,png',
         'image2' => 'mimes:jpg,jpeg,png',
         'image3' => 'mimes:jpg,jpeg,png',
         'category' => 'required'
        ]);
        if ($request->hasFile('image1')) {

             $image1 = $request->file('image1');
             $image1_name = time().'1.'.$image1->extension();
             $image1->move(public_path('/images/post_images'),$image1_name);

        }
        if ($request->hasFile('image2')) {

             $image2 = $request->file('image2');
             $image2_name = time().'2.'.$image2->extension();
             $image2->move(public_path('/images/post_images'),$image2_name);

        }
        if ($request->hasFile('image3')) {

             $image3 = $request->file('image3');
             $image3_name = time().'3.'.$image3->extension();
             $image3->move(public_path('/images/post_images'),$image3_name);

        }

         $post->update([
             'title' => $request->title,
             'body' => $request->body,
             'image1' => (isset($image1_name)) ? $image1_name : null,
             'image2' => (isset($image2_name)) ? $image2_name : null,
             'image3' => (isset($image3_name)) ? $image3_name : null,
             'user_id' => Auth::user()->id,
             'category_id' => $request->category
         ]);

         return view('showSingleUserPost', compact('user','posts','post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)->get();


        return view('home', compact('user','posts'));

    }
}
