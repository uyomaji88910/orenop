@extends('layouts.app_ghr')

@section('content')
<div class="col-xs-offset-0 col-xs-12 col-md-offset-3 col-md-6 col-lg-offset-0 col-lg-12">

<h1><span class="label label-primary">Lates List</span></h1>Today: {{$date}}<br>
@include('ghr.listbar')



<table class="table">
    <tr>
        <th class="text-center">Employee Number</th>
        <th class="text-center">Advanced Field</th>
        <th class="text-center">Team</th>
        <th class="text-center">Name</ths>
        <th class="text-center">Reason</th>
        <th class="text-center">Report Time</th>
        <th class="text-center">Confirmation</th>
        <th class="text-center">Arrival Time</th>
    </tr>
   
     @if (count($lates) > 0)
          @include('ghr.lists_lates',['lists'=>$lates])
     @endif      

</table>
</div>
@endsection
