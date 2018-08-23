@extends('layouts.app_ghr')

@section('content')
<h1><span class="label label-primary"> {{$date}}のリスト</span></h1>
<br>
@include('ghr.listbar')



<table class="table">
    <tr>
        <th class="text-center">Team</th>
        <th class="text-center">Nickname</th>
        <th class="text-center">Reason</th>
        <th class="text-center">Report Time</th>
        <th class="text-center">Confirmation</th>
        <th class="text-center">Arrival Time</th>
    </tr>
   
     @if (count($lates) > 0)
          @include('ghr.lists_lates',['lists'=>$lates])
     @endif      

</table>

@endsection
