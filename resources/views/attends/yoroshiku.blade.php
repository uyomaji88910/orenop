@extends('layouts.app')

@section('content')
<div class="row">
  <div class="center jumbotron">
        <div class="text-center">
            <h2>Welcome to Orenop</h2><br>
            {!! link_to_route('login', 'if you want to record your status, Click Here') !!}

        </div>
  </div>
</div>

@endsection
