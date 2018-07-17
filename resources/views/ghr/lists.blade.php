@empty($list->reason)
        @foreach ($lists as $list)
                <tr>
                <td class="text-center">{{$list->nickname}}</td>
                <td class="text-center">{{$list->updated_at}}</td>
                </tr>
        @endforeach
@endempty

@isset($list->reason)
        @foreach ($lists as $list)
                <tr>
                <td class="text-center">{{$list->nickname}}</td>
                <td class="text-center">{{$list->reason}}</td>
                <td class="text-center">{{$list->updated_at}}</td>
                </tr>
        @endforeach
@endisset