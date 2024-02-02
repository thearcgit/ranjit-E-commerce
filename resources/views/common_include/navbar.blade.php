</head>
<body>

<nav class="navbar navbarfix navbar-expand-lg p-0">
  <div class="container-fluid p-1">
  <img src="coverImageFolder\logo.jpg"  height="70px" alt="..." style="width: 10% !important;">

    <a class="navbar-brand" href="/">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
       
        <li class="nav-item">
          <a class="nav-link" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      @if(Auth::check())
    <ul class="nav-item dropdown p-0 mt-2">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Profile
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/user_profile">Profile</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/signout">Logout</a></li>
        </ul>
    </ul>
@else
    <ul class="nav-item p-0 mt-2">
        <a class="nav-link" href="{{ route('login') }}">Login</a>
    </ul>
@endif

      
    </div>
    
  </div>
  
</nav>