@extends('layouts.app_ghr')

@section('content')
<div class="col-xs-offset-0 col-xs-12 col-md-offset-3 col-md-6 col-lg-offset-0 col-lg-12">

<h1><span class="label label-primary">Attends List</span></h1>Today: {{$date}}<br>
@include('ghr.listbar')



<table class="table">
    <tr>
        <th class="text-center">Team</th>
        <th class="text-center">Name</th>
        <th class="text-center">Time</th>
    </tr>
   
     @if (count($attends) > 0)
          @include('ghr.lists',['lists'=>$attends])
     @endif      

</table>
</div>
@endsection
