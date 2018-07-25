
<ul class="nav nav-tabs">
 <li role="presentation" class="{{ Request::is('lists/absent') ? 'tab-col' : 'active' }}"><a href="{{ route('lists.absent') }}">Absents <span class="badge"> {{$count['count_absent']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('lists/late') ? 'tab-col' : 'active' }}"><a href="{{ route('lists.late') }}">Lates <span class="badge"> {{$count['count_late']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('lists/notattend') ? 'tab-col' : 'active' }}"><a href="{{ route('lists.notattend') }}">No Status <span class="badge">{{$count['count_notattend']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('lists/attend') ? 'tab-col' : 'active' }}"><a href="{{ route('lists.attend') }}"> Attends <span class="badge badge-light"> {{$count['count_attend']}}</span></a></li>

</ul>
