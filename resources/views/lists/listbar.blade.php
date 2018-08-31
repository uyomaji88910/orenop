
<ul class="nav nav-tabs">
 <li role="presentation" class="{{ Request::is('lists/absent') ? 'tab-col' : ''}}" ><a href="{{ route('lists.absent') }}"  class="tab-class">Absents <span class="badge"> {{$count['count_absent']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('lists/late') ? 'tab-col' : '' }}"><a href="{{ route('lists.late') }}" class="tab-class">Lates <span class="badge"> {{$count['count_late']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('lists/notattend') ? 'tab-col' : '' }}"><a href="{{ route('lists.notattend') }}" class="tab-class">No Status <span class="badge">{{$count['count_notattend']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('lists/attend') ? 'tab-col' : '' }}"><a href="{{ route('lists.attend') }}" class="tab-class"> Attends <span class="badge badge-light"> {{$count['count_attend']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('lists/paid') ? 'tab-col' : '' }}"><a href="{{ route('lists.paid') }}" class="tab-class"> Paid Holiday <span class="badge badge-light"> {{$count['count_paid']}}</span></a></li> 
</ul>
