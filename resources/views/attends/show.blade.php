@extends('layouts.app')<! edit by tiny  20180709>

@section('content')
  <div class="center jumbotron">
        <div class="text-center">
            <h1>お疲れさまでした❤</h1>
        </div>
    </div>
       
        {!! link_to_route('attends.edit', 'if you want to update your status, Click Here', ['id' => $user->id]) !!}
@endsection
