@extends('main')

@section('title', '|Create New Post')

@section('stylesheets')

  {!!Html::style('css/select2.min.css') !!}
  <script type ="text/javascript" src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
    <script>
      tinymce.init({
          selector: 'textarea',
          plugins: "link image emoticons media",
          toolbar: "emoticons media",
          image_dimensions: false,

    media_url_resolver: function (data, resolve/*, reject*/) {
    if (data.url.indexOf('YOUR_SPECIAL_VIDEO_URL') !== -1) {
      var embedHtml = '<iframe src="' + data.url +
      '" width="400" height="400" ></iframe>';
      resolve({html: embedHtml});
    } else {
      resolve({html: ''});
    }
  }

      });
    </script>

@endsection

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
        {!! Form::open(['route' => 'posts.store', 'enctype'=> 'multipart/form-data' ]) !!}
           {{form::label('title', 'Title:')}}
           {{form::text('title', null, array('class' => 'form-control','required'=>'','maxlength'=>'255'))}}
            
            {{ form::label('category_id','Category:') }}
            <select class ="form-control" name ="category_id" >
              @foreach($categories as $category)
                <option value='{{$category->id}} '>{{$category->name}}</option>
              @endforeach

            </select>

             {{ form::label('tags', 'Tags:') }}
				<select class="form-control select2-multi" name="tags[]" multiple="multiple">
					@foreach($tags as $tag)
						<option value='{{ $tag->id }}'>{{ $tag->name }}</option>
					@endforeach

				</select>
          
           {{form::label('body', "Post Body:")}}
           {{form::textarea('body', null, array('class'=> 'form-control','placeholder'=>'Type something...'))}}
            <div class="form-group", style = 'margin-top:20px'>
            {{Form::file('cover_image')}}
            </div>
           {{form::submit('Create Post', array('class'=>'btn btn-success btn-lg btn-block','style'=>'margin-top:20px;'))}}
        {!! Form::close() !!}
      </div>
      </div>
      </div>
    
@endsection

@section('scripts')

{!! Html::script('js/select2.min.js') !!}

  <script type ="text/javascript">
  $('.select2-multi').select2();
  </script>

@endsection

