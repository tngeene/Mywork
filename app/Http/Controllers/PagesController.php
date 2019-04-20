<?php

namespace App\Http\Controllers;  
use Illuminate\Http\Request;
use Illuminate\Https\Mail\Message;

use App\Http\Requests;
use App\Post;
use App\User;
use Mail;
use Session;

class PagesController extends controller {
   
    public function getWelcome() {
        $posts = Post::orderBy('created_at','desc')->limit(5)->get();
        return view ('blog.welcome')->withPosts($posts);
    }
    public function getDashboard(){
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $posts = Post::orderBy('id','desc')->paginate(5);
        return view('blog.dashboard')->with(['posts'=> $user->posts]);
        
  }
    public function getAbout() {
        return view ('blog.about');
    }
    public function getContact(){
        return view ('blog.contact');
        }

    public function postContact(Request $request){
       $this->validate($request, [
             'email'=> 'required|email',
             'name' => 'max:255',
             'phone' => 'max:13',
             'message' => 'min:10'
                        
        ]);

        $data = array(
             'email'=> $request ->email,
             'name' => $request ->name,
            // 'phone' => $request ->phone,
             'bodyMessage' => $request ->message
        );
       
        Mail::send('emails.contact',$data, function($message) use ($data){
            $message ->from($data['email']);
            $message ->to('t@t.com');
           // $message ->phone($data['phone']);
        });

        Session::flash('success','Your Email was sent, we will get back to you as soon as possible');

        return redirect('/'); 
    }
    public function getLogin(){
        return view('blog.login');
    }
}

?>