@extends('layouts.app')

    @section('content')
<div class="row">
    <div class="col-xs-offset-3 col-xs-6">
        <center><img src='images/att.png' class="att"></center><br>
        <div class="panel panel-default">
            <center class="panel-primary"><p class='string'>Absent or Late</p></center>
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
                    
                    <div>
                    {!! form::select('status', array('3'=>'absent', '2'=>'late')); !!}
                    </div>    
                    <div class="text-center">
                    {!! form::submit('Submit', ['class' => 'btn btn-danger']) !!}     
                    </div>

                    {!! form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
