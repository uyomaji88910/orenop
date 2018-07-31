<!-- content of navbar -->
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a herf="/"><img src="/images/orenop-toka.png" class="nav-logo"></a>
            
    @if (Auth::check())
     <?php $id = \Auth::user()->id ;?>
        @if  (Auth::user()->nickname == 'GHR')
          <a href="{{ route('ghr.absent') }}" class="attendance">List</a>
          <div class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Download<span class="caret"></span></a>
              <ul class="dropdown-menu">
                    <a href="{{ route('ghr.csv') }}">Today</a>
                    <li role="separator" class="divider"></li>
                    <a href="{{ route('ghr.csv_month') }}">Month</a>
              </ul>
          </div>
          <a href="{{ route('logout.get') }}">Logout</a>
          <br><br><br>

          <br><br><br><br><br><br><br>
          <center><br><br><center class='label label-primary string'>admin</center></center>
        @else
          <a href="{{ route('attends.edit', [$id]) }}">{{ Auth::user()->nickname }}'s edit</a>
          <a href="{{ route('lists.notattend') }}" class="attendance">List</a>
          <a href="{{ route('logout.get') }}">Logout</a>
          <br><br><br>
          <a href="{{ route('aboutus.get') }}">About Orenop</a>
         <div class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Help<span class="caret"></span></a>
              <ul class="dropdown-menu">
                    <a href="{{ route('help_users.get') }}">For Users</a>
                    <li role="separator" class="divider"></li>
                    <a href="{{ route('help_ghr.get') }}">For GHR</a>
              </ul>
          </div>
          <br><br><br><br><br><br><br>
          <center>Status<br><br><center class='label label-primary string'>{{$attend->status}}</center></center>
        @endif
    @else
        <a href="/">Home</a>
        <a href="{{ route('signup.get') }}">Sign Up</a>
        <a href="{{ route('lists.notattend') }}" class="attendance">List</a>
        <br><br><br>
        <a href="{{ route('aboutus.get') }}">About Orenop</a>
        <div class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Help<span class="caret"></span></a>
              <ul class="dropdown-menu">
                    <a href="{{ route('help_users.get') }}">For Users</a>
                    <li role="separator" class="divider"></li>
                    <a href="{{ route('help_ghr.get') }}">For GHR</a>
              </ul>
          </div>

    @endif
   
</div>


<!-- navbar closure -->
<span style="font-size:30px;cursor:pointer" onclick="openNav()" class="nav-humberger">&#9776; </span>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "200px";
}
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
