<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\UsersPhone;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('home',['user' => $user]);
    }
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $user->address = $request->address;
        $user->save();
        return redirect("/home");
    }
}
