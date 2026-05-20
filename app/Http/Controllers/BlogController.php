<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    function index(Request $request)
    {
        $title = $request->title;
        $blogs = Blog::where('title', 'LIKE', '%' . $title . '%')->orderBy('id', 'desc')->paginate(10);
        return view('blog', ['blogs' => $blogs, 'title' => $title]);

    }
    function add()
    {
        return view('blog-add');
    }

    function create(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:blogs|max:255',
            'description' => 'required',
        ]);
        Blog::create($request->all());
        Session::flash('message', 'New Blog Succesfully Added!');

        return redirect()->route('blog');
    }

    function show($id)
    {
        $blog = Blog::with('comments')->findOrFail($id);
        return view('blog-detail', ['blog' => $blog]);
    }

    function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog-edit', ['blog' => $blog]);
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:blogs,title, ' . $id . '|max:255',
            'description' => 'required',
        ]);
        $blog = Blog::findOrFail($id);
        $blog->update($request->all());
        Session::flash('message', ' Blog Succesfully Updated!');
        return redirect()->route('blog');
    }

    function delete($id)
    {
        // $blog = DB::table('blogs')->where('id', $id)->delete();
        $blogs = blog::findOrFail($id);
        $blogs->delete();
        Session()->flash('message', $blogs->title . ' Blog Succesfully DELETED!');
        return redirect('/blog');
    }
}
