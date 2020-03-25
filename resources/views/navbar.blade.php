<nav class="navbar navbar-secondary navbar-expand-lg">
    <div class="container">
        <ul class="navbar-nav">
        <li class="nav-item @yield('active')">
            <a href="{{url('/home')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>  
        </li>
        <li class="nav-item">
            <a href="{{url('/petugas')}}" class="nav-link"><i class="far fa-user"></i><span>User</span></a>
        </li>
        </ul>
    </div>
    </nav>