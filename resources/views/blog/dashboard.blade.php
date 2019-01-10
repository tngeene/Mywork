@extends('main')

@section('title', '| My Dashboard ')

@section('content')

    

    <!-- Dashboard Content -->
      
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <h2>MY POSTS</h2>
          </div>
        </div>
      @foreach($posts as $post)
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <h3> {{$post->title }} </h3>
            <h5>Published on: {{date('M j,Y',strtotime($post->created_at))}} </h5>

            <p>{{ substr($post->body,0,100)}}{{strlen($post->body)>100 ? "...":""}} </p>
            <a href ="{{route('blog.single',$post->slug)  }}" class="btn btn-primary" >Read more</a>
            <hr>
          </div>
        </div>
        @endforeach
      
      <div class="row">
      <div class="col-lg-2 col-md-10 mx-auto">
      <div class="text-center">
        {!!$posts->links() !!}
      </div>
      </div>
      </div>

@endsection