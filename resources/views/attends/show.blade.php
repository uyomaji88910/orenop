@extends('layouts.app')<! edit by tiny  20180709>

@section('content')
<br>
  <div class="center jumbotron">
        <div class="text-center">
            @if($attend->status == 'Late' or $attend->status == 'Absent')
                <h2>GHRが確認致しますので、<br><br><b><u>09時30分頃</u></b><br>に再度ログインしてください。</h2>
                <br>
                <h4>その際、"Confirm: GHR確認中"となっている場合はメールにて直接GHRにご連絡ください。</h4>
                
            @elseif($attend->status == 'Attend')
                <h1>HAVE A NICE DAY❤</h1>
            @endif
                            <h2>{{$user->nickname}}'s Status</h2>
                <h2><b>{{$attend->status}}</b></h2>
                <br>
                <h2>Your Paid Holiday Infomation</h2>
                <h3>-------</h3>
                <table class="table">
                    <tr>
                        <th class="text-center">Date</th>
                    </tr>
                   
                     @if (count($paid) > 0)
                         @foreach ($paid as $paid_unit)
                            <tr>
                            <td class= "text-center">{{$paid_unit->created_at}}</td>
                            </tr>
                         @endforeach
                     @endif      
                
                </table>
        </div>
  </div>
        {!! link_to_route('attends.edit', 'if you want to update your status, Click Here', ['id' => $attend->id]) !!}
@endsection
