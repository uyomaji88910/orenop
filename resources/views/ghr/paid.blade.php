@extends('layouts.app_ghr')

@section('content')
<h1><span class="label label-primary">{{$date}}のリスト</span></h1>
<br>
@include('ghr.listbar')



<table class="table">
    <tr>
        <th class="text-center">Team</th>
        <th class="text-center">Nickname</th>
    </tr>
   
     @if (count($attends) > 0)
          @include('ghr.notplist',['lists'=>$attends])
     @endif      

</table>

@endsection
