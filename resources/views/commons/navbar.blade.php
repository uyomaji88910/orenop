<header>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">orenop</a>
               <!  ここに後でイメージ入れる >

            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('signup.get') }}">Sign up</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>//edit by Den 7/4
                    <li><a href="{{ route('logout.get') }}">Logout</a></li>//edit by Den 7/4
                </ul>
            </div>
        </div>
    </nav>
</header>
