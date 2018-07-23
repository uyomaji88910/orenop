

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
    right: 0;
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
.nav-humberger{
    float:right;
    margin-top:20px;
    margin-right:20px;
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
    @if (Auth::check())
        @if  (Auth::user()->nickname == 'GHR')
          <a href="#">GHR</a>
          <a href="{{ route('ghr.absent') }}" class="attendance">List</a>
          <div class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">DL<span class="caret"></span></a>
              <ul class="dropdown-menu">
                    <a href="{{ route('ghr.csv') }}">Today</a>
                    <li role="separator" class="divider"></li>
                    <a href="{{ route('ghr.csv_month') }}">Month</a>
              </ul>
          </div>
          <a href="{{ route('logout.get') }}">Logout</a>
        @else
          <a href="{{ route('attends.edit', [$id]) }}">{{ Auth::user()->nickname }}'s edit</a>
          <a href="{{ route('lists.notattend') }}" class="attendance">List</a>
          <a href="{{ route('logout.get') }}">Logout</a>
        @endif
    @else
        <a href="{{ route('signup.get') }}">Sign Up</a>
        <a href="{{ route('lists.notattend') }}" class="attendance">List</a>
    @endif

</div>

<span style="font-size:30px;cursor:pointer" onclick="openNav()" class="nav-humberger">&#9776; </span>

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


 