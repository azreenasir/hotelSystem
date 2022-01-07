<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
    <a class="navbar-brand" href="#">
      <img src="/images/logo.ico" width="30" height="30" class="d-inline-block align-top" alt="">
      HELLOTEL
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item {{request()->is('/') ? 'active' : ''}}">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item {{request()->is('room') ? 'active' : ''}}">
          <a class="nav-link" href="/room">Room</a>
        </li>
        @can('manage-systems')
        <li class="nav-item {{request()->is('guest') ? 'active' : ''}}">
          <a class="nav-link" href="{{route('guest.index')}}">Guest</a>
        </li>
        {{-- <li class="nav-item {{request()->is('reservation') ? 'active' : ''}}">
          <a class="nav-link" href="{{route('reservation.index')}}">Reservation</a>
        </li> --}}
        <li class="nav-item {{request()->is('room-available') ? 'active' : ''}}">
          <a class="nav-link" href="{{route('search.index')}}">Check Available Room</a>
        </li>
        @endcan
      </ul>
    </div>
    @auth
    <form class="form-inline my-2 my-lg-0">
      <ul class="navbar-nav">
      <li class="nav-item dropdown ">
        <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: #FFFFFF;">
            {{ Auth::user()->first_name }}
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ url('/logout') }}"> logout </a>
          @can('manage-users')
            <a class="dropdown-item" href="{{route('admin.users.index')}}">
              User Management
            </a>
            <a class="dropdown-item" href="{{route('reservation.index')}}">Reservation</a>
          @endcan
        </div>
    </li>
  </ul>
    </form>
    @endauth
    
  </nav>