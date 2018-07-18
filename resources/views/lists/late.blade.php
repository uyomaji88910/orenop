@extends('layouts.app')

@section('content')
<h1><span class="label label-primary"> Today({{$date}})のリスト</span></h1>
<br>
@include('lists.listbar')



<table class="table">
    <tr>
        <th class="text-center">Team</th>
        <th class="text-center">Nickname</th>
        <th class="text-center">Reason</th>
        <th class="text-center">Time</th>
    </tr>
   
     @if (count($lates) > 0)
          @include('lists.lists_others',['lists'=>$lates])
     @endif      

</table>

@endsection
