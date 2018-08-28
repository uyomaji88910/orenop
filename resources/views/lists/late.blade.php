@extends('layouts.app')

@section('content')
<h1><span class="label label-primary">{{$date}}のリスト</span></h1>
<br>
@include('lists.listbar')



<table class="table table-striped">
    <tr>
        <th class="text-center">Team</th>
        <th class="text-center">Name</th>
        <th class="text-center">Time</th>
    </tr>
   
     @if (count($lates) > 0)
          @include('lists.lists',['lists'=>$lates])
     @endif      

</table>

@endsection
