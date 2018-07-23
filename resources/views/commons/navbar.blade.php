<!--<style>
  .navbar-fixed-side-left {
  left: 0;
}
.navbar-fixed-side-right {
  right: 0;
}
.navbar-fixed-side {
  position: fixed;
  border-width: 0;
  z-index: 1030;
  min-height: 5px;
  min-width: 5px;
  max-width: 200px;
  margin-bottom: 0;
  border: 0px solid transparent;
}
.navbar-fixed-side .navbar-toggle {
  float: none;
  margin: 0;
}
.navbar-fixed-side .nav > li > a {
  width: 100%;
  padding: 5px;
}
.navbar-fixed-side .dropdown-menu > li > a {
  padding: 5px;
}
.navbar-fixed-side .dropdown-header {
  padding: 5px;
}
.navbar-fixed-side .navbar-nav {
  margin: 0;
}
.navbar-fixed-side .navbar-nav > li {
  float: none;
}
.navbar-fixed-side .navbar-nav > li > a {
  padding: 5px;
  line-height: 20px;
}
.navbar-fixed-side .navbar-nav .open .dropdown-menu > li > a,
.navbar-fixed-side .navbar-nav .open .dropdown-menu .dropdown-header {
  padding: 3px 5px 3px 15px;
}
.navbar-fixed-side .container {
  width: 100%;
  padding: 0;
}
.navbar-fixed-side .navbar-header {
  float: none;
  margin: 0;
}
.navbar-fixed-side .navbar-collapse {
  padding: 0 2px;
}
.navbar-fixed-side .container .navbar-collapse {
  margin: 0;
}
.navbar-fixed-side .container .navbar-brand {
  margin: 0;
}
.navbar-fixed-side .navbar-brand {
  float: none;
  height: 100%;
  padding: 5px 3px;
  font-size: 18px;
  line-height: 20px;
}
</style>

<header>
    <nav class="navbar navbar-default navbar-fixed-side navbar-fixed-side-right" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
 
            
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a data-class="navbar-fixed-left">
              <i class="fa fa-arrow-left"></i>
              Fixed Left
            </a>
          </li>
          <li>
            <a data-class="navbar-fixed-top">
              <i class="fa fa-arrow-up"></i>
              Fixed Top
              <small>(original)</small>
            </a>
          </li>
          <li>
            <a data-class="navbar-fixed-right">
              <i class="fa fa-arrow-right"></i>
              Fixed Right
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

                   
          <!--- 
             @if (Auth::check())
                <?php $id = \Auth::user()->id ;?>
                    @if  (Auth::user()->nickname == 'GHR')
                        <a class="navbar-brand hvr-buzz-outs" href="{{ route('ghr.absent') }}"><br>
                    @else
                        <a class="navbar-brand hvr-buzz-outs" href="{{ route('attends.edit', [$id]) }}"><br>
                    @endif
                @else
                    <a class="navbar-brand hvr-buzz-outs" href="/"><br>
                @endif
                    <span class="title"></span></a> <! edit by chee 7/4 cssで編集済>
                    
            </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::check())
                           
                            @if  (Auth::user()->nickname == 'GHR')
                            <li><a href="#">GHR</a></li>
                            <li><a href="{{ route('ghr.absent') }}" class="attendance"><img src="{{ asset("/images/nav-att.png") }}" class='nav-login'> List</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="{{ asset("/images/dl2.png") }}" class='nav-login'>DL<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('ghr.csv') }}">Today</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('ghr.csv_month') }}">Month</a></li>
                            </ul>
                        </li>
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
-->

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: 'Montserrat';
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    right: 0 important!;
    background-color: #fff;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}
.nav-logo{
    height:100px;
    width:auto;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>


<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a herf="/"><img src="/images/orenop-toka.png" class="nav-logo"></a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
     
</body>
</html> 

<!--
