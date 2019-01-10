<!DOCTYPE html>
<html lang="en">
  <head>
 
    @include('partials._head')
    @yield('head')
  </head>
  <body>

      @include('partials._nav')
      
      @include('partials._message')
      {{ Auth::check() ? "Logged in":"Logged out" }}
     
      @yield('content')
        
     @include('partials._footer')

  

     @include('partials._javascript')
  </body>

</html>
