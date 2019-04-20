@extends('main')
@section('title','| Home')

@section('content')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Clean Blog</h1>
              <span class="subheading">A Blog Theme by Start Bootstrap</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    @foreach($posts as $post)
    <div class="container">
      <div class="row">
          <div class = "col-md-4 col-sm-4 mx-auto">
            <img style = "width:100%" src ="{{ url('storage/cover_images/' . $post->cover_image) }}"/>
          </div>
          
          <div class = "col-md-8 col-sm-8 mx-auto">
           <div class="post-preview">
              <a href="{{route('blog.single',$post->slug)}}">
                <h2 class="post-title">
                {{ $post->title }}
                </h2>
                <h3 class="post-subtitle">
                 <p> {{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
                </h3>
              </a>
              <p class="post-meta">Posted by
                <a href="#">{{ $post->user->name }}</a>
                on {{ date('M j Y h:ia', strtotime($post->created_at))  }}</p>
          </div>
          </div>
          
            
              
            </div>
          <hr>
          @endforeach
          
          <!-- Pager -->
          
        </div>
      </div>
      <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
          </div>
    </div>

    <hr>

@endsection