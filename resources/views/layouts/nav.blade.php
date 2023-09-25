<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
    <a class="navbar-brand" href="/" style="font-family: 'Dekko'">
      <b>HReS </b>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item {{request()->is('/') ? 'active' : ''}}">
          <a class="nav-link" href="/"><b>Home</b> <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item {{request()->is('room') ? 'active' : ''}}">
          <a class="nav-link" href="/room"><b>Room</b></a>
        </li>
        @can('manage-systems')
        <li class="nav-item {{request()->is('room-available') ? 'active' : ''}}">
          <a class="nav-link" href="{{route('search.index')}}"><b>Check Available Room</b></a>
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
            @can('manage-users')
              <a class="dropdown-item" href="{{route('admin.users.index')}}">
                <b>User Management</b>
              </a>
            @endcan
            @can('manage-systems')
                <a class="dropdown-item" href="{{route('reservation.index')}}">
                  <b>Reservation</b>
                </a>
                <a class="dropdown-item" href="{{route('guest.index')}}">
                  <b>Guest</b>
                </a>
            @endcan
            @can('manage-users')
                <a class="dropdown-item" href="{{route('sales.index')}}">
                  <b>Sales Report</b>
                </a>
                <a class="dropdown-item" href="{{route('pie.chart')}}">
                  <b>Room Report</b>
                </a>
            @endcan
            <a class="dropdown-item" href="{{ url('/logout') }}"> <b>logout</b> </a>
          </div>
        </li>
      </ul>
    </form>
    @endauth
    
  </nav>