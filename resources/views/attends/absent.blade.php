@extends('layouts.app')

@section('content')
<ul class="nav nav-tabs">
 <li role="presentation" class="{{ Request::is('attends') ? 'active' : '' }}"><a href="{{ route('attends.index') }}"> Attends <span class="badge badge-light"> {{$count['count_attend']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('lists/late') ? 'active' : '' }}"><a href="{{ route('attends.late') }}">Lates <span class="badge"> {{$count['count_late']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('lists/absent') ? 'active' : '' }}"><a href="{{ route('attends.absent') }}">Absents <span class="badge"> {{$count['count_absent']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('lists/notattend') ? 'active' : '' }}"><a href="{{ route('attends.notattend') }}">NotP <span class="badge">{{$count['count_notattend']}}</span></a></li>
</ul>


<table class="table">
    <tr>
        <th class="text-center">Nickname</th>
        <th class="text-center">Date</th>
    </tr>
   
     @if (count($absents) > 0)
          @include('attends.lists',['lists'=>$absents])
     @endif      

</table>

@endsection
