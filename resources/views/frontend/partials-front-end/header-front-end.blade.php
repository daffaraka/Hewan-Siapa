<header>
  @guest
    @if (Route::has('login'))
    <nav class="navbar bg-dark navbar-dark justify-content-end" style="height: 50px;" id="first-navbar">
      <ul class="nav justify-content-end" style="padding: unset;">
        @if (Route::has('register'))
        <li class="nav-item ">
          <a class="nav-link text-light p-0"  style="display:unset" href="{{ route('register') }}">Register</a>
        </li>
        @endif
        <li class="nav-item p-0">
            <a class="nav-link text-light p-0" style="display:unset" href="{{ route('login') }}">Login</a>
        </li>
      </ul>
    </nav>
    @endif

  @else
    <nav class="navbar bg-dark navbar-dark justify-content-end"  style="height: 50px;" id="first-navbar">
      {{-- <form class="form-inline">
        <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> --}}
      <ul class="nav justify-content-end" style="padding: unset;">
        @if (Auth::user()->hasRole('admin|super-admin'))
        <li class="nav-item text-light p-0">
          <a href="{{route('dashboard.admin')}}" class="text-light">Dashboard admin</a>
        </li>
        @endif
       
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle text-light p-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
          </a>
    
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item w-auto" href="{{route('profile.dashboard')}}" >Profil</a>
              <a class="dropdown-item w-auto" href="{{route('profile.adopsi')}}" >Adopsi</a>
              <a class="dropdown-item w-auto" href="{{route('profile.pemacakan')}}" >Pemacakan</a>
              <a class="dropdown-item w-auto" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>
    
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
             
          </div>
        </li>
      
      </ul>
    
    </nav>
   
  @endguest
 
    
    <nav class="navbar navbar-expand-sm bg-light navbar-light shadow-sm justify-content-between">
        <!-- <a class="navbar-brand" href="#">Logo</a> -->
            <ul class="navbar-nav" id="navbar-nav">
              <li class="nav-item">
                <a class="nav-link text-dark" href="{{route('hewan-siapa.index')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" href="{{route('hewan-siapa.listAdopsi')}}">Find your pet</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" href="{{route('hewan-siapa.listPemacakan')}}">Match your pet</a>
              </li>
            </ul>
            
           
            
     </nav>
</header>