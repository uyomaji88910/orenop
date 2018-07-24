
<ul class="nav nav-tabs">
 <li role="presentation" class="{{ Request::is('ghr/absent') ? 'active' : '' }}"><a href="{{ route('ghr.absent') }}">Absents <span class="badge"> {{$count['count_absent']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('ghr/late') ? 'active' : '' }}"><a href="{{ route('ghr.late') }}">Lates <span class="badge"> {{$count['count_late']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('ghr/notattend') ? 'active' : '' }}"><a href="{{ route('ghr.notattend') }}">No Status <span class="badge">{{$count['count_notattend']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('ghr/attend') ? 'active' : '' }}"><a href="{{ route('ghr.attend') }}"> Attends <span class="badge badge-light"> {{$count['count_attend']}}</span></a></li>
</ul>
