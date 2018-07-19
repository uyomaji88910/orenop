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

                @if (Auth::check())
                <?php $id = \Auth::user()->id ;?>
                <a class="navbar-brand hvr-buzz-outs" href="{{ route('attends.edit', [$id]) }}"><br>
                @else
                <a class="navbar-brand hvr-buzz-outs" href="/"><br>
                @endif
                    <span class="title"></span>
                </a> <! edit by chee 7/4 cssで編集済>
            </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::check())
                           
                            @if  (Auth::user()->nickname == 'GHR')
                            <li><a href="#">GHR</a></li>
                            <li><a href="{{ route('ghr.absent') }}" class="attendance"><img src="{{ asset("/images/nav-att.png") }}" class='nav-login'> List</a></li>
                            <li><a href="{{ route('logout.get') }}"><img src="{{ asset("/images/nav-logout.png") }}" class='nav-logout'> Logout</a></li>
                            @else
                            <li><a href="{{ route('attends.edit', [$id]) }}"><img src="{{ asset("/images/edit.png") }}" class='nav-logout'>{{ Auth::user()->nickname }}'s edit</a></li>
                            <li><a href="{{ route('lists.notattend') }}" class="attendance"><img src="{{ asset("/images/nav-att.png") }}" class='nav-login'> List</a></li>
                            <li><a href="{{ route('logout.get') }}"><img src="{{ asset("/images/nav-logout.png") }}" class='nav-logout'> Logout</a></li>
                            @endif
                        @else
                            <li><a href="{{ route('signup.get') }}"><img src= "{{ asset("/images/signup-white.png") }}" class='nav-signup'>Sign Up</a></li>
                            <li><a href="{{ route('lists.notattend') }}" class="attendance"><img src="{{ asset("/images/nav-att.png") }}" class='nav-login'> List</a></li>
            　           @endif
            　       </ul>
                </div>    
        </div>    
    </nav>
</header>
