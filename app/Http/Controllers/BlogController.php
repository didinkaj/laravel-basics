<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use Blog\Blog;

use Auth;

use Session;

class BlogController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allBlogs = Blog::latest()
             ->paginate(3);

        return view('home',compact('allBlogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('addblog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|string',
            'category' => 'required|max:255|string',
            'body' => 'required|string'
        ]);
        if ($validator->fails()) {
            session::flash('error', 'Blog Creation failed, Check the form and try again');
            return redirect('/addBlog')
                ->withErrors($validator)
                ->withInput();
        } else {
            $save = Blog::create(
                [
                    'user_id' => Auth::id(),
                    'title' => $request->input(['title']),
                    'category' => $request->input(['category']),
                    'body' => $request->input(['body']),
                    'published' => 0,
                ]);



            // redirect
            if ($save) {
                session::flash('success', 'Blog Created Successfully ');
                return redirect('/home');
            } else {
                session::flash('error', 'Blog Task not saved, try again!');
                return redirect('/home');
            }
        }
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


        return view('blogdetails',compact('allBlogs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete = Blog::destroy($id);
        if($delete){
            session::flash('success', 'Successfully deleted Blog!');
            return redirect('/home');
        }else{
            session::flash('error', 'Deletion failed, please try again');
            return redirect('/home');
        }
    }
}
