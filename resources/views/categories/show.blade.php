@extends('main')

@section('title', "| $category->name")

@section('content')
<div class="container">
      <div class="row">
      <div class="col-md-8">
    <h1>{{ $category-> name }} Category <small> {{$category->posts()->count()}} posts</small> </h1>

    </div>
    
        <div class="col-md-2">
            {{ Form::open(['route'=> ['categories.destroy',$category->id],'method'=>'DELETE']) }}
            {{ Form::submit('Delete',['class'=>'btn btn-danger btn-block','style'=>'margin-top:20px']) }}
            {{ Form::close() }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <table class ="table"> 
        <thead>
            <tr>
                <th>#</th>
                <th>Title </th>
            </tr>
        </thead>

        <tbody>
            @foreach ($category->posts as $post)
            <tr>
                <th>{{$post->id}}</th>
                <th>{{$post->title}} </th>
                 <td> <a href = "{{route('posts.show', $post->id) }}" class ="btn btn-default btn-xs" >View</a>  </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        </div>
    </div>
    </div>
@endsection