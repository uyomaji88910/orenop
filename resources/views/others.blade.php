@extends('layouts.app')

    @section('content')
<div class="row_top">
    <center class="col-xs-offset-0 col-xs-12 col-md-offset-3 col-md-6">
                 <h1 class='label label-primary string balloon1'>Absent or Late</h1>
                <div class="panel-body">
                <div class='col-xs-offset-0 col-xs-12'>
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
                    {!! form::label('status', 'absent') !!}
                    {!! form::radio('status',3, array('3'=>'absent')); !!}
                    {!! form::label('status', 'late') !!}
                    {!! form::radio('status',2, array('2'=>'late')); !!}
                    </div>
                    
                    
                    <div class="form-group">
                    {!! form::label('reason', 'Reason') !!}
                        {!! form::text('reason', old('reason'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="text-center">
                    <div class="hint--top" aria-label="css--button primary--border--button radius--button"><button type ="image" name="submit" class="css--button primary--border--button radius--button" alt=" 送信">Submit</button></div>  
                    </div>
                    </form>
                    {!! form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
