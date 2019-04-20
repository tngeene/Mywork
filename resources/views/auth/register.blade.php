@extends('main')

@section('title','|Sign up')

@section('content')
<div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            {!!Form::open() !!}

              {{ Form::label('name','Username') }}
              {{ Form::text('name',null,['class'=> 'form-control']) }} 
             
              {{ Form::label('email','Email') }}
              {{ Form::email('email',null,['class'=> 'form-control']) }} 

              {{ Form::label('password','Password') }}
              {{ Form::password('password',['class'=> 'form-control']) }}

               {{ Form::label('password_confirmation','Confirm Password') }}
              {{ Form::password('password_confirmation',['class'=> 'form-control']) }}
            
              {{Form::submit('Register',['class'=>'btn btn-primary btn-block form-spacing-top'])}}

               {!!Form::close() !!}
           </div>
        </div>
      </div>
  
  
@endsection