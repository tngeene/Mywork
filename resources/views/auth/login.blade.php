@extends('main')

@section('title','| Login')

@section('content')

    <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            {!!Form::open() !!}

               {{ Form::label('email',' E-mail') }}
              {{ Form::text('email',null,['class'=> 'form-control']) }}

              {{ Form::label('password','Password') }}
              {{ Form::password('password',['class'=> 'form-control']) }}
                <br>
              {{ Form::checkbox('remember') }} 
              {{ Form::label('remember',"Keep Me Logged in") }}

              {{Form::submit('Login',['class'=>'btn btn-primary btn-block'])}}

              <p><a href ="{{url('password/reset') }}">Forgot Password?</a></p>

            {!!Form::close() !!}
           </div>
        </div>
      </div>

@endsection