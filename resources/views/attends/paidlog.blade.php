@extends('layouts.app')<! edit by tiny  20180709>

@section('content')
<br>
  <div class="center jumbotron">
        <div class="text-center">
                          
                <h2>Your Paid Holiday Infomation</h2>
                <h3>----------------------------------------------</h3>
                 @if (count($paid) > 0)
                <table class="table">
                    <tr>
                        <th class="text-center">Date</th>
                        <th class="text-center">Delete</th>
                    </tr>
                   

                         @foreach ($paid as $paid_unit)
                            <tr>
                            <td class= "text-center">{{$paid_unit->created_at}}</td>
                            <td>{!! Form::open(['route' => 'paid_del', 'method' => 'delete']) !!}
                                {!! Form::hidden('id', $paid_unit->id) !!}
                                {!! Form::submit('Cancel', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}</td>
                            </tr>
                         @endforeach
                       
                
                </table>
                 @endif   
        </div>
  </div>
        {!! link_to_route('attends.edit', 'if you want to update your status, Click Here', ['id' => $attend->id]) !!}
@endsection
