@extends('main')

@section('title',"| Edit Tag")

@section('content')

    {{Form::model($tag,['route'=>['tags.update', $tag->id],'method'=>"PUT"])}}
        
        {{ Form::label('name',"Title") }}
        {{ Form::text('name',null, ['class'=>'form-control']) }}
    
        {{form::submit('save Changes', ['class'=>'btn btn-success','style'=>'margin-top:20px;'])}}
    {{Form::close()}}

@endsection