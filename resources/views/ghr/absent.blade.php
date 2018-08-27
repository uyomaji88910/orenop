@extends('layouts.app_ghr')


@section('content')
<h1><span class="label label-primary"> Today({{$date}})のリスト</span>
</h1>
<br>
@include('ghr.listbar')



<table class="table">
    <tr>
        <th class="text-center">Team</th>
        <th class="text-center">Name</th>
        <th class="text-center">Reason</th>
        <th class="text-center">Time</th>
        <th class="text-center">Confirmation</th>
    </tr>
   
     @if (count($absents) > 0)
          @include('ghr.lists_others',['lists'=>$absents])
     @endif      

</table>

@endsection
