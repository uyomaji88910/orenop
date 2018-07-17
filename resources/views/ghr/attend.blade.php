@extends('layouts.app')

@section('content')
<h1><span class="label label-primary"> Today({{$date}})のリスト</span></h1>
<br>
@include('ghr.listbar')



<table class="table">
    <tr>
        <th class="text-center">Nickname</th>
        <th class="text-center">Time</th>
    </tr>
   
     @if (count($attends) > 0)
          @include('ghr.lists',['lists'=>$attends])
     @endif      

</table>

@endsection
