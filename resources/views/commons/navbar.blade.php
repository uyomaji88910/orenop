<!-- content of navbar -->
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a herf="/"><img src="/images/orenop-ka.png" class="nav-logo"></a>
            
    @if (Auth::check())
     <?php $id = \Auth::user()->id ;?>
        @if  (Auth::user()->nickname == 'GHR')
          <a href="{{ route('ghr.absent') }}" class="attendance"><i class="far fa-list-alt"></i> List</a>
          <div class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-file-download"></i> Download<span class="caret"></span></a>
              <ul class="dropdown-menu">
                    <a href="{{ route('ghr.csv') }}">Today</a>
                    <li role="separator" class="divider"></li>
                    <a href="{{ route('ghr.csv_month') }}">Month</a>
              </ul>
          </div>
          <a href="{{ route('logout.get') }}"><i class="fas fa-power-off"></i> Logout</a>
          
          <br><br><br>

          <br><br><br><br><br><br><br>
          <center><br><br><center class='label label-primary string'>admin</center></center>
        @else
          <a href="{{ route('attends.edit', [$id]) }}">{{ Auth::user()->nickname }}'s edit</a>
          <a href="{{ route('lists.notattend') }}" class="attendance"> List</a>
          <a href="{{ route('paidlog', [$id]) }}" class="attendance">PaidHolidayInfo</a>
          <a href="{{ route('logout.get') }}"><i class="fas fa-power-off"></i> Logout</a>
          
          <br><br><br>
          <a href="{{ route('aboutus.get') }}">About Orenop</a>
 
          <br><br><br><br><br><br><br>
       
        @endif
    @else
        <a href="/" id="my-element"><i class="fas fa-home"></i> Home</a>
        <a href="{{ route('signup.get') }}"><i class="fas fa-user-plus"></i> Signup</a>
        <!--<a href="{{ route('lists.notattend') }}" class="attendance"><i class="far fa-list-alt"></i> List</a>-->
        <a href="{{ route('paid') }}" class="attendance"><i class="far fa-calendar-alt"></i> <font size='5'>PaidHoliday</font></a>
        <br><br><br>
        <a href="{{ route('aboutus.get') }}">About Orenop</a>

    @endif
   
</div>


<!-- navbar closure -->
<span style="font-size:30px;cursor:pointer" onclick="openNav()" class="nav-humberger"><i class="fas fa-bars"></i></span>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "230px";
    
    document.getElementById("main").style.marginLeft = "230px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
}


</script>
