<ul class="nav nav-tabs">
 <li role="presentation" class="{{ Request::is('ghr/absent') ? 'tab-col' : 'active' }}"><a href="{{ route('ghr.absent') }}">Absents <span class="badge"> {{$count['count_absent']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('ghr/late') ? 'tab-col' : 'active' }} "><a href="{{ route('ghr.late') }}">Lates <span class="badge"> {{$count['count_late']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('ghr/notattend') ? 'tab-col' : 'active' }} "><a href="{{ route('ghr.notattend') }}">No Status <span class="badge">{{$count['count_notattend']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('ghr/attend') ? 'tab-col' : 'active' }}"><a href="{{ route('ghr.attend') }}"> Attends <span class="badge badge-light"> {{$count['count_attend']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('ghr/paid') ? 'tab-col' : 'active' }}"><a href="{{ route('ghr.paid') }}"> Paid Holiday <span class="badge badge-light"> {{$count['count_paid']}}</span></a></li>
</ul>
