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
                <a class="navbar-brand hvr-buzz-outs" href="/"><br>
                    <span class="title"></span>
                </a> <! edit by chee 7/4 cssで編集済>
            </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::check())
                            <?php $id = \Auth::user()->id ?>
                            <li><a href="{{ route('attends.edit', [$id]) }}"><img src="{{ asset("/images/edit.png") }}" class='nav-logout'> Edit</a></li>
                            <li><a href="{{ route('logout.get') }}"><img src="{{ asset("/images/nav-logout.png") }}" class='nav-logout'> Logout</a></li>
                            <li><a href="{{ route('lists.attend') }}" class="attendance"><img src="{{ asset("/images/nav-att.png") }}" class='nav-login'> List</a></li>
                         
                        @else
                            <li><a href="{{ route('signup.get') }}"><img src= "{{ asset("/images/signup-white.png") }}" class='nav-signup'>Sign Up</a></li>
                            <li><a href="{{ route('logout.get') }}"><img src="{{ asset("/images/nav-logout.png") }}" class='nav-logout'> Logout</a></li>
                            <li><a href="{{ route('lists.attend') }}" class="attendance"><img src="{{ asset("/images/nav-att.png") }}" class='nav-login'> List</a></li>
            　           @endif
            　       </ul>
                </div>    
        </div>    
    </nav>
</header>
