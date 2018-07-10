@extends('layouts.app')

@section('content')
<ul class="nav nav-tabs">
  <li class="active"><a href="#">Attends</a></li>
  <li><a href="#">Lates</a></li>
  <li><a href="#">Absents</a></li>
  <li><a href="#">NotP</a></li>
</ul>

<table class="table">
    <tr>
        <th class="text-center">Nickname</th>
        <th class="text-center">Date</th>
    </tr>
   
     @if (count($lates) > 0)
          @include('attends.lists',['lists'=>$lates])
         
     @endif      

</table>

@endsection
