 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg fixed-top navbar-light" id="mainNav" >
      <div class="container">
        <a class="navbar-brand" href="/">CRUISE</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Home</a>
            </li>
            @if(Auth::check())
            <li class="nav-item">
              <a class="nav-link" href="/dashboard">Dashboard</a>
            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/contact">Contact</a>
            </li>
          </ul>
          
         <ul class ="nav navbar-nav navbar-right">
         @if(Auth::check())
            <li class ="dropdown">
              <a href ="#" class ="dropdown-toggle" data-toggle="dropdown" role ="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name  }}<span class="caret"></span></a>
              <ul class="dropdown-menu">
               <li><a  href ="{{route('posts.index')}}">My Posts</a></li>
               <li><a  href ="{{route('categories.index')}}">Categories</a></li>
               <li><a  href ="{{route('tags.index')}}"><i class="fa fa-tags"></i> Tags</a></li>
                <li><a href ="{{ route('loggout') }} ">logout</a></li>
              </ul>
            </li>
            @else
            
            <a href ="{{route('login')}}" class ="btn btn-primary" style ="border-radius:16px; margin-top:10px;padding: 10px 20px;font-size: 12px;" >Login</a>
            <a href =" {{route('register') }} " class ="btn btn-primary" style ="border-radius:16px; margin-top:10px;margin-left:13px;padding: 10px 20px;font-size: 12px;">Sign Up</a>
            
            @endif

          </ul>
        </div>
      </div>
    </nav>