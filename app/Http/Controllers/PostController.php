<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use Session;


class PostController extends Controller
{
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
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
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
            'body'=> 'required',
            'category_id'=> 'required|integer',
            'cover_image' => 'image|nullable|max:1999'
            
        ));

        // Handle File upload
        if($request->hasFile('cover_image')){
            //get filename with the extension
            $fileNamewithext = $request->file('cover_image')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($fileNamewithext, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }else {
            $fileNameToStore ='noimage.jpg';
        }

        //store in the DB
        $post = new post;

        $post -> title =$request -> title;
        $post -> slug = str_slug($request->title,'-');
        $post -> body =$request -> body;
        $post-> cover_image = $fileNameToStore;
        $post -> category_id = $request -> category_id;
        $post -> user_id = auth()->user()->id;
        $request->user()->posts();

        $post-> save();

        $post->tags()->sync($request->tags,false);
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
        $categories =Category::all();
        $cats = array();
         foreach($categories as $category){
             $cats[$category -> id] = $category ->name;
         }
         $tags = Tag::all();
         $tags2 = array();
         foreach($tags as $tag){
             $tags2[$tag->id] = $tag->name;
         }
        //return view and pass it in the above variable
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
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
            'body'=> 'required',
            'category_id'=> 'required|integer'
        ));

         // Handle File upload
         if($request->hasFile('cover_image')){
            //get filename with the extension
            $fileNamewithext = $request->file('cover_image')->getClientOriginalName();
            //get just file name
            $filename = pathinfo($fileNamewithext, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }


        //save the data to the DB
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = str_slug($request->title,'_');
        $post->body = $request->input('body');
        $post ->category_id = $request->input('category_id');
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }

        
        $post->save();
        
        $post->tags()->sync($request->tags,true);

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
        $post -> tags()->detach();
        $post->delete();

        if($post->cover_image != 'noimage.jpg'){
            //Delete Image
            Storage::delete('public/cover_images/' .$post->cover_image);
        }
        
        Session::flash('success','The Post was successfully deleted');
        return redirect()->route('posts.index');
    }
}
