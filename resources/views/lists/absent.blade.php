@extends('layouts.app')

@section('content')
<div class="col-xs-offset-0 col-xs-12 col-md-offset-3 col-md-6 col-lg-offset-0 col-lg-12">

<h1><span class="label label-primary">Absents List</span></h1>Today: {{$date}}
@include('lists.listbar')



<table class="table table-striped">
    <tr>
        <th class="text-center">Team</th>
        <th class="text-center">Name</th>
        <th class="text-center">Time</th>
    </tr>
   
     @if (count($absents) > 0)
          @include('lists.lists',['lists'=>$absents])
     @endif      

</table>
</div>
@endsection
