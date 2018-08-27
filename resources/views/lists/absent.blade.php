@extends('layouts.app')

@section('content')
<h1><span class="label label-primary"> {{$date}}のリスト</span></h1>
<br>
@include('lists.listbar')



<table class="table">
    <tr>
        <th class="text-center">Team</th>
        <th class="text-center">Name</th>
        <th class="text-center">Time</th>
    </tr>
   
     @if (count($absents) > 0)
          @include('lists.lists',['lists'=>$absents])
     @endif      

</table>

@endsection
