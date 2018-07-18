@foreach ($lists as $list)
        <tr>
        <td class= "text-center">{{$list->team_number}}-{{$list->team_class}}</td>
        <td class= "text-center">{{$list->nickname}}</td>
        </tr>
@endforeach
