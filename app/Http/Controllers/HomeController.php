<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['welcome','home']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // Profil korisnika
    public function index()
    {
        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)->get();

        return view('home', compact('user','posts'));
    }
     // Prikazivanje pojedinacnog posta na korisnickom profilu
    public function showSingleUserPost($id)
    {
        $post = Post::find($id);

        return view('showSingleUserPost',compact('post'));
    }

    // dodavanje slike korisnika
    public function saveImg(Request $request)
    {
        $user = Auth::user();
        $request->validate([
          'user_image' => 'mimes:jpg,jpeg,png'
      ]);

      if ($request->hasFile('user_image')) {

            $image = $request->file('user_image');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('/images/user_image'), $image_name);
            User::where(['id' => Auth::user()->id])->update(['user_image' => $image_name]);

      }


       return redirect()->back();
    }

    // Brisanje slike korisnika
    public function deleteImg()
    {

        User::where(['id' => Auth::user()->id])->update(['user_image' => null]);

        return redirect()->back()->with('message', 'Your image is deleted.');
    }

    // dodavanje kategorija u navigacioni meni
    public function categories()
    {
        $categories = Category::all();

        return view('partials.navigation', compact('categories'));
    }

    // Editovanje korisnickog profila
    public function editUserProfile()
    {
        $user = Auth::user();
        return view('editUserProfile', compact('user'));
    }

    // Brisanje korisnika
    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();



        return redirect('/')->with('message','Your profile is deleted.');
    }
}
