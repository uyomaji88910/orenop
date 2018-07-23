@foreach ($lists as $list)
        <tr>
        <td class="text-center">{{$list->team_number}}-{{$list->team_class}}</td>
        <td class="text-center">{{$list->nickname}}</td>
        <td class="text-center">{{$list->reason}}</td>
        <td class="text-center">{{$list->updated_at}}</td>
        @isset($list->arrival_time)
                <td class="text-center">{{$list->arrival_time}}</td>
                <td>{!! Form::open(['route' => 'ghr.notarrival', 'method' => 'delete']) !!}
                {!! Form::hidden('id', $list->id) !!}
                {!! Form::submit('Cancel', ['class' => 'btn btn-warning']) !!}
                {!! Form::close() !!}</td>
        @else
                <td class="text-center">Not arrived</td>
                <td>{!! Form::open(['route' => 'ghr.arrival']) !!}
                {!! Form::hidden('id', $list->id) !!}
                {!! Form::submit('Arrived!', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}</td>
        @endisset
        
        @isset($list->confirm)
                <td>{!! Form::open(['route' => 'ghr.notconfirm', 'method' => 'delete']) !!}
                {!! Form::hidden('id', $list->id) !!}
                {!! Form::submit('Cancel', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}</td>
        @else
                <td>{!! Form::open(['route' => 'ghr.confirm']) !!}
                {!! Form::hidden('id', $list->id) !!}
                {!! Form::submit('Confirmed!', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}</td>
        @endisset
        
        </tr>
        
@endforeach
