<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Post as Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $posts = DB::table('posts')->where('user_id', $id)->paginate(4);

        return View::make('home')->with('posts', $posts);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = new Model;

        if($file = $request->hasFile('image') ) {
            $image =  $request->file('image');
            $post_thumbnail     = $request->file('image');
            $filename           = time() . '.' . $post_thumbnail->getClientOriginalExtension();
            $destinationPath    = public_path('/images/');

            Image::make($post_thumbnail)->resize(100, 100)->save($destinationPath . '/thumb_' . $filename);

            $image->move(public_path().'/images/', time() . '.' . $post_thumbnail->getClientOriginalExtension());
            $post->imgThumb = '/thumb_'.$filename;
            $post->img      = $filename;
        }

        $post->title   = $request->get('title');
        $post->content = $request->get('content');
        $post->user_id = Auth::user()->id;
        $post->save();

        return redirect('posts')->with('success', 'Post has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = \App\Post::find($id);
        return view('edit',compact('post','id'));
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
        $post = \App\Post::find($id);

        if($file = $request->hasFile('image') ) {
            var_dump('aaa');
            $image =  $request->file('image');
            $post_thumbnail     = $request->file('image');
            $filename           = time() . '.' . $post_thumbnail->getClientOriginalExtension();
            $destinationPath    = public_path('/images');

            Image::make($post_thumbnail)->fit(100, 100)->save($destinationPath . 'thumb_' . $filename);

            $image->move(public_path().'images', time() . '.' . $post_thumbnail->getClientOriginalExtension());
            $post->imgThumb = 'thumb_'.$filename;
            $post->img      = $filename;
        }

        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->save();

        return redirect('posts')->with('success', 'Post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = \App\Post::find($id);
        $post->delete();
        return redirect('posts')->with('success','Post has been deleted');
    }
}
