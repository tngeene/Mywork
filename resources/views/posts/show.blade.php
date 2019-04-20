@extends('main')

@section('title','| View Post')

@section('content')

    <div class="container">
      <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <p class ="lead"> {{!! $post -> body!!}} </p>

          <hr>
          <div class="tags">
          @foreach($post->tags as $tag)
           <span class ="badge badge-pill badge-secondary">{{$tag->name}}</span>
          @endforeach
          </div>

          <div id = "backend-comments"  style = "margin-top:50px;">
            <h3> Comments <small> {{ $post->comments()->count() }} total </small></h3>
            <table class = "class">
              <thead>
                <tr>
                <th>Name </th>
                <th>Email </th>
                <th>Comment</th>
               <th width="70px"></th>
                </tr>
              </thead>
             @foreach($post->comments as $comment)
                <tr>
                  <td> {{$comment->name }} </td>
                  <td> {{$comment->email }} </td>
                  <td> {{$comment->comment }} </td>
                  <td>
                    <a href ="{{ route('comments.edit', $comment->id) }}" class = "btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                    <a href ="{{ route('comments.delete', $comment->id) }} " class = "btn btn-xs btn-danger"><i class="fa fa-trash"></i></span></a>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>

        </div>
      <div class= "col-md-4">
        <div class = "well">
        <dl class = "dl-horizontal">
            <dt>URL:</dt>
            <p><a href="{{route('blog.single',$post->slug)}}">{{route('blog.single',$post->slug)}} </a></p>
          </dl>

          <dl class = "dl-horizontal">
            <dt>CATEGORY:</dt>
            <p> {{ $post->category->name }} </p>
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