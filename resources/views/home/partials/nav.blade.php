<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="{{ route('home') }}" class="logo d-flex align-items-center">

        <h1 class="sitename">Personal</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{route('home')}}" class="{{ Route::is('home') ? 'active' : '' }}">Home</a></li>

          {{-- <li><a href="{{route('profile')}}" class="{{ Route::is('profile') ? 'active' : '' }}">Profile</a></li> --}}
          @if (!auth()->user())
               <li><a href="{{route('login')}}">Login</a></li>
               <li><a href="{{route('register')}}">Register</a></li>
          @else
          <li><a href="{{ route('portfolio.index') }}">Explore Portfolio</a></li>

          <li class="dropdown"><a href="#"><span><i class="fa-solid fa-user" style="font-size: 1rem; color: #333;"></i></span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
           <ul>
                <li class="dropdown"><a href="{{route('profile')}}"><span>Profile</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
               <ul>
                 @if (auth()->user()->profile)
                     <li><a href="{{ route('profile') }}">View</a></li>

                @else
                     <li><a href="{{ route('profile.create') }}">Create Profile</a></li>
                 @endif

               </ul>
             </li>

            <li>
                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                    @csrf
                    <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" style="text-decoration: none; color: inherit;">
                        Logout
                    </a>
                </form>
            </li>


           </ul>
         </li>
          @endif

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>
