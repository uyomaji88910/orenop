@foreach ($lists as $list)
        <tr>
                <td class= "text-center">{{$list->employee_num}}</td>
                <td class= "text-center">{{$list->advanced_field}}</td>
                <td class="text-center">{{$list->team_number}}-{{$list->team_class}}</td>
                <td class="text-center">{{$list->nickname}}</td>
                <td class="text-center">{{$list->updated_at}}</td>
        </tr>
@endforeach
