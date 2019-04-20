@extends('main')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title',"| $titleTag")

@section('content')


    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
             <h1> {{$post->title}}   </h1>
             <img style = "width:100%" src ="{{ url('storage/cover_images/' . $post->cover_image) }}"/>
             <p> {!! $post->body !!} </p>
             <hr>
             <p>Posted in:{{ $post->category->name }} </p>
         </div>
     </div>
    </div>
    </article>

      <div class="row">
        <div class ="col-lg-8 col-md-10 mx-auto">
          <h3 class ="comment-title">  <i class="fa fa-comments"></i>  {{ $post->comments()->count() }} Comments</h3>
        @foreach($post->comments as $comment)
            <div class="comment">
            <div class="author-info">
            <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) ."?s=50&d=mm"  }}" class="author-image">
            <div class="author-name">
            <h4>{{$comment->name}}</h4>
            <p class ="author-time">{{ date('F dS, Y - g:iA',strtotime( $comment->created_at))}}</p>  
            </div>
            </div> 
            <div class="comment-content">
            {{$comment->comment}}
            </div>
            </div>

          @endforeach
        </div>
      </div>

    <div class="row">
		<div id="comment-form" class="col-lg-8 col-md-10 mx-auto" style="margin-top: 50px;">
			{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}

				<div class="row">
					<div class="col-md-6">
						{{ Form::label('name', "Name:") }}
						{{ Form::text('name', null, ['class' => 'form-control']) }}
					</div>

					<div class="col-md-6">
						{{ Form::label('email', 'Email:') }}
						{{ Form::text('email', null, ['class' => 'form-control']) }}
					</div>

					<div class="col-md-12">
						{{ Form::label('comment', "Comment:") }}
						{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}

						{{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:15px;']) }}
					</div>
				</div>

			{{ Form::close() }}
        </div>
    </div>
@endsection