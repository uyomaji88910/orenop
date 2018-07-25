@extends('layouts.app')

    @section('content')
<div class="row">
    <center class="col-xs-offset-0 col-xs-12 col-md-offset-3 col-md-6">
        <!--<center><img src={{ asset("images/att.png")}} class="att"></center><br>-->
                 <h1 class='label label-primary string balloon1'>For GHR</h1>
                <div class="panel-body">
                <div class='col-xs-offset-0 col-xs-12'>
    {!! Form::open(['route' => 'login.post']) !!}
                    <div class="form-group hidden">
                    {!! form::label('nickname', 'User Name') !!}
                    {!! form::select('nickname', array('GHR'=>'GHR')); !!}
                    </div>

                    <div class="form-group">
                    {!! form::label('password', 'PassWord') !!}
                        {!! form::password('password', ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class='hidden' >
                    {!! form::select('status', array('3'=>'GHR')); !!}
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
