@extends('layouts.app')

    @section('content')
<div class="row">
    <div class="col-xs-offset-3 col-xs-6">
        <center><img src='images/att.png' class="att"></center><br>
                 <h1 class='label label-primary string'>Absent or Late</h1>
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
                    <div class="text-right">
                    {!! form::submit('Submit', ['class' => 'btn btn-danger']) !!}     
                    </div>

                    {!! form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
