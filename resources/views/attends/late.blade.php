@extends('layouts.app')

@section('content')
<ul class="nav nav-tabs">
 <li role="presentation" class="{{ Request::is('attends') ? 'active' : '' }}"><a href="{{ route('attends.index') }}">Attends</a></li>
 <li role="presentation" class="{{ Request::is('lists/late') ? 'active' : '' }}"><a href="{{ route('attends.late') }}">Lates</a></li>
 <li role="presentation" class="{{ Request::is('lists/absent') ? 'active' : '' }}"><a href="{{ route('attends.absent') }}">Absents</a></li>
 <li role="presentation" class="{{ Request::is('lists/notattend') ? 'active' : '' }}"><a href="{{ route('attends.notattend') }}">NotP</a></li>
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
