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
        $blogs = Blog::orderBy('updated_at', 'desc')->get();

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
            'create_user_id' => Auth::user()->id,
            'update_user_id' => Auth::user()->id
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
        $desc = $blog->content;
        $desc = preg_replace('/<.+?>/i', '', $desc); // remove all html tags
        $desc = strlen($desc) > 300 ? substr($desc, 0, 300) : $desc; // limit to 300 characters
        $desc .= ' ......';

        return view('blog.show', ['blog' => $blog, 'desc' => $desc]);
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
            'update_user_id' => Auth::user()->id
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
        $blog->delete();

        return redirect(route('blog.index'));
    }
}
