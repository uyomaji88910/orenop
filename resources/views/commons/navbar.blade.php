<!-- content of navbar -->
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a herf="/"><img src="/images/orenop-toka.png" class="nav-logo"></a>
            @if (Auth::check())
            @else
                <a class="navbar-brand hvr-buzz-outs" href="/">Home</a><br>
            @endif
              
    @if (Auth::check())
     <?php $id = \Auth::user()->id ;?>
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


<!-- navbar closure -->
<span style="font-size:30px;cursor:pointer" onclick="openNav()" class="nav-humberger">&#9776; </span>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
