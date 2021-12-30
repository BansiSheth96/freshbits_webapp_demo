<header class="header">
    <div class="topbar" style="background-color: currentColor;">
    <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">     
                <ul class="nav navbar-nav navbar-right pull-right"> 
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">
                        <!-- Auth used for display user name -->
                        {{ Auth::user()->name }}
                            <img src="{{ url('assets/images/users/user2_img.jpg')}}" alt="user-img" class="img-circle">
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}"><i class="ti-power-off m-r-5"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
                      