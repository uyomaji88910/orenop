@extends('layouts.app')

@section('content')
<h1><span class="label label-primary"> Today({{$date}})のリスト</span></h1>
<br>
<ul class="nav nav-tabs">
 <li role="presentation" class="{{ Request::is('lists/attend') ? 'active' : '' }}"><a href="{{ route('lists.attend') }}"> Attends <span class="badge badge-light"> {{$count['count_attend']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('lists/late') ? 'active' : '' }}"><a href="{{ route('lists.late') }}">Lates <span class="badge"> {{$count['count_late']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('lists/absent') ? 'active' : '' }}"><a href="{{ route('lists.absent') }}">Absents <span class="badge"> {{$count['count_absent']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('lists/notattend') ? 'active' : '' }}"><a href="{{ route('lists.notattend') }}">NotP <span class="badge">{{$count['count_notattend']}}</span></a></li>
</ul>


<table class="table">
    <tr>
        <th class="text-center">Nickname</th>
        <th class="text-center">Date</th>
    </tr>
   
     @if (count($lates) > 0)
          @include('lists.lists',['lists'=>$lates])
     @endif      

</table>

@endsection
