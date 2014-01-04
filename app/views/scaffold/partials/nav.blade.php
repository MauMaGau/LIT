<nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ URL::Route('home') }}">LIT</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            @if (!Auth::guest() && Auth::user()->type === 'admin')
                <li class="dropdown {{ Request::segment(1) !== 'admin' ?: 'active' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ URL::Route('admin.users.index') }}">Users</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            @endif
        </ul>
        <!-- <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form> -->
        <ul class="nav navbar-nav navbar-right">
            @if (Auth::guest())
                <li><a href="{{ URL::route('user.register') }}">Register</a></li>
                <li><a href="{{ URL::route('user.login') }}">Log in</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Me <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">My Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ URL::route('user.logout') }}">Log out</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>