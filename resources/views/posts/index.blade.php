@extends('main')

@section('title', '|All Posts')

@section('content')
 
  <div class="row">
      <div class="col-md-8">
          <h1>All Posts</h1>
      </div>
      <div class="col-md-3">
          <a href=" {{route('posts.create')}}" class= "btn btn-sm btn-round btn-primary btn-h1-spacing">Create New Post</a>
      </div>
      <div class="col-md-12">
        <hr>
      </div>
  </div>
  <div class="row">
  <div class="col-md-12">
    <table class="table">
        <thead>
            <th>#</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created On</th>
            <th></th>
        </thead>

        <tbody>
            @foreach($posts as $post)

                <tr>
                    <th>{{$post->id}}</th>
                    <th>{{$post->title}}</th>
                    <<td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
                    <td>{{date('M j, Y', strtotime($post->created_at))}}</td>
                    <td><a href ="{{ route('posts.show', $post->id)}}" class = "btn btn-default">View</a><a href="{{route('posts.edit', $post->id)}}" class = "btn btn-default">Edit</a></td>
                    

            @endforeach
        </tbody>
    </table>
    
    <div class="row">
      <div class="col-lg-2 col-md-10 mx-auto">
      <div class="text-center">
        
      </div>
      </div>
      </div>

    </div>

  </div>
  </div>

@endsection