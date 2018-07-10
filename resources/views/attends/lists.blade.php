


        
@foreach ($lists as $list)
        <tr>
        <td class= "text-center">{{$list->nickname}}</td>
        <td class="text-center">{{$list->updated_at}}</td>
        </tr>
@endforeach