<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;

use Blog\Blog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     //   $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allBlogs = Blog::latest()
            ->paginate(3);

        return view('welcome',compact('allBlogs'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $allBlogs = Blog::where('id',$id)
            ->first();


        return view('blogdetailsguest',compact('allBlogs'));
    }
}
