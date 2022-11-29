<nav class="navbar navbar-expand-lg main-navbar sticky">
    <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li>
                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn">
                    <i data-feather="align-justify"></i>
                </a>
            </li>
            <li>
                <form class="form-inline mr-auto">
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                        <button class="btn" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </li>
        </ul>
    </div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{asset('assets/img/user.png')}}" class="user-img-radious-style">
                <span class="d-sm-none d-lg-inline-block"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
                <div class="dropdown-title">{{Auth::user()->name}}</div>
                <a href="profile.html" class="dropdown-item has-icon">
                    <i class="far fa-user"></i>
                    Profile
                </a>
                <a href="timeline.html" class="dropdown-item has-icon">
                    <i class="fas fa-bolt"></i>
                    Activities
                </a>
                <a href="#" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i>
                    Settings
                </a>
                <div class="dropdown-divider"></div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                  @csrf
                </form>
                <a href="#" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{route('dashboard')}}">
            <span class="logo-name">HIV Treatment Adherence</span>
        </a>
      </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
                <a href="{{route('dashboard')}}" class="nav-link">
                    <i class="fas fa-chart-pie"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @if (Auth::user()->hasRole('nurse'))
                <li class="dropdown">
                    <a href="{{route('nurse-preARTs')}}" class="nav-link">
                        <i class="fas fa-angle-double-right"></i>
                        <span>Pre-ART Register</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{route('nurse-arts')}}" class="nav-link">
                        <i class="fas fa-angle-double-right"></i>
                        <span>ART Register</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{route('nurse-artcare-booklets')}}" class="nav-link">
                        <i class="fas fa-angle-double-right"></i>
                        <span>ART Care booklet</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{route('nurse-followups')}}" class="nav-link">
                        <i class="fas fa-angle-double-right"></i>
                        <span>Follow up</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{route('nurse-reports')}}" class="nav-link">
                        <i class="fas fa-angle-double-right"></i>
                        <span>Report</span>
                    </a>
                </li>
            @elseif (Auth::user()->hasRole('labtech'))
                {{-- <li class="dropdown">
                    <a href="" class="nav-link">
                        <i class="fas fa-angle-double-right"></i>
                        <span>Upload Result</span>
                    </a>
                </li> --}}
            @elseif (Auth::user()->hasRole('patient'))
                <li class="dropdown">
                    <a href="{{route('dashboard')}}" class="nav-link">
                        <i class="fas fa-angle-double-right"></i>
                        <span>View Health Record</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="{{route('patient-schedule')}}" class="nav-link">
                        <i class="fas fa-angle-double-right"></i>
                        <span>Reminder</span>
                    </a>
                </li>
            @endif
        </ul>
    </aside>
</div>
