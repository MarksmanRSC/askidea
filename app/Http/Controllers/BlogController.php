<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the blogs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();

        foreach ($blogs as &$blog) {
            $content = $blog->content;
            $content = preg_replace('/<.+?>/i', '', $content); // remove all html tags
            $content = strlen($content) > 300 ? substr($content, 0, 300) : $content; // limit to 300 characters
            $content .= ' ......';
            $blog->content = $content;
        }

        return view('blog.index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new blog.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created blog in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $title = $data['title'];
        $content = $data['content'];
        $cover_image = $data['cover_image'];

        Blog::create([
            'title' => $title,
            'cover_image' => $cover_image,
            'content' => $content,
            'user_id' => Auth::user()->id
        ]);

        return redirect(route('blog.index'));
    }

    /**
     * Display the specified blog.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('blog.show', ['blog' => $blog]);
    }

    /**
     * Show the form for editing the specified blog.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified blog in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $data = $request->all();

        $title = $data['title'];
        $content = $data['content'];
        $cover_image = $data['cover_image'];

        $blog->update([
            'title' => $title,
            'cover_image' => $cover_image,
            'content' => $content,
            'user_id' => Auth::user()->id
        ]);

        return redirect(route('blog.index'));
    }

    /**
     * Remove the specified blog from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
