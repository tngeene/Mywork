@extends('main')

@section('title',"| $post->title")

@section('content')
<header class="masthead" style=" background-image: url('/img/ForzA.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1 text-align ="center">{{$post->title}}</h1>
              <h2 class="subheading"></h2>
              <span class="meta">Posted by
                <a href="#">Start Bootstrap</a>
                on {{date('M j,Y',strtotime($post->created_at))}}</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
             <h1> {{$post->title}}   </h1>
             <p> {{$post->body}}   </p>
         </div>
     </div>
    </div>
    </article>
@endsection