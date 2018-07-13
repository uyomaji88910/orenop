@extends('layouts.app')

@section('content')
<h1><span class="label label-primary"> Today({{$date}})のリスト</span></h1>
<br>
@include('lists.listbar')



<table class="table">
    <tr>
        <th class="text-center"><u>Nickname</u></th>
    </tr>
   
     @if (count($notattends) > 0)
          @include('lists.notplist',['lists'=>$notattends])
     @endif      

</table>

@endsection
