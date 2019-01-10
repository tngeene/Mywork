@extends('main')

@section('title', '|Create New Post')

@section('content')
<header class="masthead" style="background-image: url('/img/ForzA.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1>The journey is still a long way</h1>
              <h2 class="subheading">Problems look mighty small from 150 miles up</h2>
              <span class="meta">Posted by
                <a href="#">Start Bootstrap</a>
                on August 24, 2018</span>
            </div>
          </div>
        </div>
      </div>
    </header>

  
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
        <h1>Create New Post</h1>
        <hr>
        {!! Form::open(['route' => 'posts.store', ]) !!}
           {{form::label('title', 'Title:')}}
           {{form::text('title', null, array('class' => 'form-control','required'=>'','maxlength'=>'255'))}}
            
           {{form::label('body', "Post Body:")}}
           {{form::textarea('body', null, array('class'=> 'form-control','placeholder'=>'Type something...'))}}

           {{form::submit('Create Post', array('class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top:20px;'))}}
        {!! Form::close() !!}
      </div>
      </div>
      </div>
    


@endsection
