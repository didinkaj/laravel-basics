<?php

namespace Blog\Repositories\Blog;
use Blog\User;
use Blog\Blog;
use Auth;


class BlogRepository
{
    public $blog;


    function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }


    public function getPaginationBlogs()
    {
        return Blog::latest()->with('user')->paginate(3);
       // dd(Blog::deleted()->get());

    }
    public function getallBlogs()
    {
       // ret Blog::all();
        return Blog::trial()->with('user')->latest()->paginate(3);

    }

    public function saveBlog($request)
    {
        $data =
            [
                'user_id' => Auth::id(),
                'title' => $request->input(['title']),
                'category' => $request->input(['category']),
                'body' => $request->input(['body']),
                'published' => 0,
            ];
        return Blog::create($data);
    }


    public function findBlog($id)
    {
        return Blog::where('id', $id)->first();
    }

    public function update($request, $id)
    {
        $data =
            [
                'user_id' => Auth::id(),
                'title' => $request->input(['title']),
                'category' => $request->input(['category']),
                'body' => $request->input(['body']),
                'published' => 0,
            ];
        return Blog::where('id', $id)->where('user_id', Auth::id())->update($data);

    }


    public function delete($id)
    {
        return Blog::destroy($id);
    }
}