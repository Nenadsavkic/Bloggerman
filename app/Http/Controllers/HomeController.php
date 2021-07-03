<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        $user = Auth::user();
        return view('home', compact('user'));
    }


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
       DB::table('users')->where(['id' => Auth::user()->id])->update(['user_image' => $image_name]);

      }


       return redirect()->back();
    }

    public function deleteImg()
    {
          $image = null;
       DB::table('users')->where(['id' => Auth::user()->id])->update(['user_image' => $image]);


          return redirect()->back()->with('message', 'Your image is deleted.');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();



        return redirect('/')->with('message','Your profile is deleted.');
    }
}
