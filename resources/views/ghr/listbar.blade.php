<ul class="nav nav-tabs">
 <li role="presentation" class="{{ Request::is('ghr/absent') ? 'tab-col' : '' }}"><a href="{{ route('ghr.absent') }}" class="tab-class">Absents <span class="badge"> {{$count['count_absent']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('ghr/late') ? 'tab-col' : '' }} "><a href="{{ route('ghr.late') }}" class="tab-class">Lates <span class="badge"> {{$count['count_late']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('ghr/notattend') ? 'tab-col' : '' }} "><a href="{{ route('ghr.notattend') }}" class="tab-class">No Status <span class="badge">{{$count['count_notattend']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('ghr/attend') ? 'tab-col' : '' }}"><a href="{{ route('ghr.attend') }}" class="tab-class"> Attends <span class="badge badge-light"> {{$count['count_attend']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('ghr/paid') ? 'tab-col' : '' }}"><a href="{{ route('ghr.paid') }}" class="tab-class"> Paid Holiday <span class="badge badge-light"> {{$count['count_paid']}}</span></a></li>
</ul>
