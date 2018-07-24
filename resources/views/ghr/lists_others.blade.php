@foreach ($lists as $list)
        <tr>
        <td class="text-center">{{$list->team_number}}-{{$list->team_class}}</td>
        <td class="text-center">{{$list->nickname}}</td>
        <td class="text-center">{{$list->reason}}</td>
        <td class="text-center">{{$list->updated_at}}</td>
        @isset($list->confirm)
                <td>{!! Form::open(['route' => 'ghr.notconfirm', 'method' => 'delete']) !!}
                {!! Form::hidden('id', $list->id) !!}
                {!! Form::submit('Cancel', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}</td>
        @else
                <td>{!! Form::open(['route' => 'ghr.confirm']) !!}
                {!! Form::hidden('id', $list->id) !!}
                {!! form::select('confirm', array(
                'お疲れ様です。ご報告ありがとうございます。ゆっくりお休みください。出社の際はGHRスタッフデスクにお越しください。'=>'【日本語】お疲れ様です。ご報告ありがとうございます。ゆっくりお休みください。出社の際はGHRスタッフデスクにお越しください。',
                'Thank you for letting us know.Have a good rest! Please come to the GHR desk when you come to work.'=>'【English】Thank you for letting us know. Have a good rest! Please come to the GHR desk when you come to work.   ')); !!}
                {!! Form::submit('Confirmed!', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}</td>
        @endisset
        </tr>
@endforeach
