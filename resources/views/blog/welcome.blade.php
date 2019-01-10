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
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          
          @foreach($posts as $post)
          
            <div class="post-preview">
              <a href="{{route('blog.single',$post->slug)}}">
                <h2 class="post-title">
                {{ $post->title }}
                </h2>
                <h3 class="post-subtitle">
                  {{ substr($post->body,0,60)}}
                  {{strlen($post->body)>60 ? "...":""}}
                </h3>
              </a>
              <p class="post-meta">Posted by
                <a href="#">Start Bootstrap</a>
                on {{ date('M j Y h:ia', strtotime($post->created_at))  }}</p>
            </div>
          <hr>
          @endforeach
          
          <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
          </div>
        </div>
      </div>
    </div>

    <hr>

@endsection