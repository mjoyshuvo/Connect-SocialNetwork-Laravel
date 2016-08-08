<nav class="navbar navbar-default" style="background: #2c3e50;" role="navigation">
    <div class="container">
        <div class="navbar-header" >
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
            <a class="navbar-brand" href="{{ route('home') }}" style="color:#18FFFF">Chatty</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            @if (Auth::check())
                <ul class="nav navbar-nav">
                    <li><a href="#">Timeline</a></li>
                    <li><a href="#">Friends</a></li>
                </ul>
                <form class="navbar-form navbar-left" role="search" action="{{ route('search.result') }}">
                    <div class="form-group">
                        <input type="text" name="query" class="form-control" placeholder="Find people">
                    </div>
                    <button type="submit" class="btn btn-primary" style="background: #2c3e50 ; border-color: #18FFFF;">Search</button>
                </form>
            @endif
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                    <li><a href="{{ route('profile.index', ['username'=>Auth::user()->username]) }}">{{Auth::user()->getNameOrUsername()}}</a></li>
                    <li><a href="{{ route('profile.update') }}">Update profile</a></li>
                    <li><a href="{{ route('signout') }}">Sign out</a></li>
                @else
                    <li><a href="{{ route('signup') }}">Sign up</a></li>
                    <li><a href="{{ route('signin') }}">Sign in</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>