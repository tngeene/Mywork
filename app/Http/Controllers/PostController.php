<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // variable that has all the blog posts
        $posts = Post::orderBy('id','desc')-> paginate(2);
        // return a view and pass in the variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this -> validate($request,array(
            'title' => 'required|max:255',
            'body'=> 'required'
        ));

        //store in the DB
        $post = new post;

        $post -> title =$request -> title;
        $post -> slug = str_slug($request->title,'_');
        $post -> body =$request -> body;

        $post-> save();


        //redirect the user to another page
        Session::flash('success','The blog was successfully saved');

        return redirect()-> route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the DB and save it as a variable
        $post = Post::find($id);
        //return view and pass it in the above variable
        return view('posts.edit')->withPost($post);
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
        //validate the data 
        $this -> validate($request,array(
            'title' => 'required|max:255',
            'body'=> 'required'
        ));

        //save the data to the DB
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = str_slug($request->title,'_');
        $post->body = $request->input('body');

        $post->save();


        //set flash message
        Session::flash('success','This post was successfully updated.');

        //redirect with flash message to posts.show
        return redirect()->route('posts.show',$post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);
        $post->delete();
        Session::flash('success','The Post was successfully deleted');
        return redirect()->route('posts.index');
    }
}
