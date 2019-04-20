@extends('main')

@section('title','|Edit Post')

@section('stylesheets')

{!!Html::style('css/select2.min.css') !!}


  {!!Html::style('css/select2.min.css') !!}
  <script src="{{asset('https://cloud.tinymce.com/stable/tinymce.min.js')}}"></script>
    <script>
      tinymce.init({
          selector: 'textarea',
          plugins: "link image",
          image_dimensions: false

      });
    </script>


@endsection


@section('content')
   
    <div class="container">
      <div class="row">
      <div class="col-md-8">
      {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method'=> 'PUT','enctype'=> 'multipart/form-data']) !!}
      
            {{Form::label('title','Title:')}}
            {{ Form::text('title', null, ["class" => 'form-control input-lg']) }}
           
            {{ Form::label('category_id',"Category:") }}
            {{ Form::select('category_id',$categories,null,["class"=> 'form-control']) }}

            {{ form::label('tags','Tags:', ['class'=>'form-spacing-top']) }}
            {{ form::select('tags[]', $tags, null, ['class'=>'form-control select2-multi','multiple'=>'multiple'])}}

            {{Form::label('body','Body:', ["class" =>'form-spacing-top'])}}
            {{ Form::textarea('body',null,  ["class" => 'form-control']) }}

             <div class="form-group", style = 'margin-top:20px'>
            {{Form::file('cover_image')}}
            </div>
      </div>
      <div class= "col-md-4">
        <div class = "well">
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
            {!! Html::linkRoute('posts.show', 'Cancel', array($post->id),array('class'=> 'btn btn-danger btn-block'))  !!}
          </div>
          <div class = "col-sm-6">
           {{ Form::submit('save changes',['class'=> 'btn btn-success btn block']) }}
          </div>

      </div>
    </div>
    {!! Form::close() !!}
    </div>
<hr>

@endsection

@section('scripts')

{!!Html::script('js/select2.min.js') !!}
<script type ="text/javascript">
  $('.select2-multi').select2();
  </script>
@endsection
