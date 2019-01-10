@extends('main')

@section('title','|View Post')

@section('content')

    <div class="container">
      <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <p class ="lead"> {{ $post -> body }} </p>
        </div>
      <div class= "col-md-4">
        <div class = "well">
        <dl class = "dl-horizontal">
            <dt>URL:</dt>
            <p><a href="{{route('blog.single',$post->slug)}}">{{route('blog.single',$post->slug)}} </a></p>
          </dl>
          
          <dl class = "dl-horizontal">
            <dt>Created at:</dt>
            <dd>{{ date('M j Y h:ia', strtotime($post->created_at))  }}</dd>
          </dl>
          
        <dl class = "dl-horizontal">
            <dt>Last Updated:</dt>
            <dd>{{ date('M j Y h:ia', strtotime($post->updated_at))  }}</dd>
        </dl>
        <hr>
        <div class = "row">
          <div class = "col-sm-6">
            {!! Html::linkRoute('posts.edit', 'Edit Post', array($post->id),array('class'=> 'btn btn-primary btn-block'))  !!}
          </div>
          <div class = "col-sm-6">
          {!! Form::open(['route'=>['posts.destroy', $post->id],'method'=> 'DELETE']) !!}
         
           {!! Form::submit('Delete post',['class'=> 'btn btn-danger btn-block']) !!}

          {!! Form::close() !!}
          </div>
        <div class="row">
          {!!Html::linkRoute('posts.index','<- See All Posts',array(),['class'=>'btn btn-default btn-block btn-h1-spacing'])!!}
        </div>
      </div>
    </div>
    </div>
<hr>
@endsection