<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Post;

class PagesController extends controller {
   
    public function getWelcome() {
        $posts = Post::orderBy('created_at','desc')->limit(5)->get();
        return view ('blog.welcome')->withPosts($posts);
    }
    public function getDashboard(){
        $posts = Post::orderBy('id','desc')->paginate(5);
        return view('blog.dashboard')->withPosts($posts);
  }
    public function getAbout() {
        return view ('blog.about2');
    }
    public function getContact(){
        return view ('blog.contact2');
        }
    public function getLogin(){
        return view('blog.login');
    }
}

?>