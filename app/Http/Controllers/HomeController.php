<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;


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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $posts = DB::table('posts')->where('user_id', $id)->get();

        return View::make('home')->with('posts', $posts);
    }
}
