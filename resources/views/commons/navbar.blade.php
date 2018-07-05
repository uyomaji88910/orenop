<!edit by chee 7/4>
<header>
    <nav class="navbar navbar-inverse navbar-static-top">   
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                       <span class="sr-only">Toggle navigation</span> 
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><br>
                    <span class="title">orenop</span>
                </a> <! edit by chee 7/4 cssで編集済>
            </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('signup.get') }}"><img src="images/add-user.png">Sign Up</a></li>
                        <li><a href="{{ route('login') }}"><img src="images/login.png">  Login</a></li> <!edit by Den 7/4>
                        <li><a href="{{ route('logout.get') }}"><img src="images/logout.png">  Logout</a></li> <!edit by Den 7/4>
            　       </ul>
                </div>    
        </div>    
    </nav>
</header>
