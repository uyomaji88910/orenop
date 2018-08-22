@extends('layouts.app')

@section('content')
<h1><span class="label label-primary"> Today({{$date}})のリスト</span></h1>
<br>
@include('lists.listbar')



<table class="table">
    <tr>
        <th class="text-center">Team</th>
        <th class="text-center">Nickname</th>
    </tr>
   
     @if (count($attends) > 0)
          @include('lists.notplist',['lists'=>$attends])
     @endif      

</table>

@endsection
