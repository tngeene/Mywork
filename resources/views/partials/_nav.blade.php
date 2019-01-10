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
            <li class="nav-item">
              <a class="nav-link" href="/dashboard">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/about2">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/contact2">Contact</a>
            </li>
          </ul>
         
         
          <ul class ="nav navbar-nav navbar-right">
            <li class ="dropdown">
              <a href ="#" class ="dropdown-toggle" data-toggle="dropdown" role ="button" aria-haspopup="true" aria-expanded="false">My Account<span class="caret"></span></a>
              <ul class="dropdown-menu">
               <li><a  href ="{{route('posts.index')}}">My Posts</a></li>
                <li><a  href ="/auth/register">Sign In</a></li>
                <li><a href ="/auth/login">login</a></li>
                <li><a href ="#">logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>