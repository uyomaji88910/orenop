@extends('layouts.app') <! edit by Tiny 20180709>

    @section('content')
    <!<div class="center jumbotron">
        <!<div class="text-center">
            <!<a href="#" class="hvr-wobble-vertical"><h1>Welcome to the orenop</h1></a>
        <!</div>
        
        
        <div class="row">
    <div class="col-xs-offset-3 col-xs-6">
        <div class="panel panel-default">
            <div class="panel-body">
{!! Form::open(['route' => 'login.post']) !!}
                    <div class="form-group">
                        {!! form::label('nickname', 'NickName') !!}
                        {!! form::text('nickname', old('nickname'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! form::label('password', 'PassWord') !!}
                        {!! form::password('password', ['class' => 'form-control']) !!}
                    </div>
                    <div class="hidden">
                         {!! form::select('status', array('1'=>'Attend')); !!} <!add hidden-form by chee 7/6>
                    </div>     
                    <div class="text-center">
                        {!! form::submit('Attendance', ['class' => 'btn btn-success']) !!}
                    </div>
                {!! form::close() !!}
            </div>
        </div>
         {!! link_to_route('others.get', '欠席遅刻の方はこちら') !!}
    </div>
</div>
    </div>

@endsection
