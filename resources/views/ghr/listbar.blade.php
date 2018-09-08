<div class="tab-select-outer">
    Select：
   <select name="select" onChange="location.href=value;" id="tab-select">
      <option value="#">---List---</a></option>
      <option value="http://orenop.herokuapp.com/ghr/absent">Absents</a></option>
      <option value="http://orenop.herokuapp.com/ghr/late">Lates</a></option>
      <option value="http://orenop.herokuapp.com/ghr/notattend">No Status</option>
      <option value="http://orenop.herokuapp.com/ghr/attend">Attends</option>
      <option value="http://orenop.herokuapp.com/ghr/paid">Paid Holiday</option>
    </select>
  </div>

<div class="tab-button-outer">
<ul class="nav nav-tabs" id="tab-button">
 <li role="presentation" class="{{ Request::is('ghr/absent') ? 'tab-col' : ''}}" ><a href="{{ route('ghr.absent') }}"  class="tab-class">Absents <span class="badge"> {{$count['count_absent']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('ghr/late') ? 'tab-col' : '' }}"><a href="{{ route('ghr.late') }}" class="tab-class">Lates <span class="badge"> {{$count['count_late']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('ghr/notattend') ? 'tab-col' : '' }}"><a href="{{ route('ghr.notattend') }}" class="tab-class">No Status <span class="badge">{{$count['count_notattend']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('ghr/attend') ? 'tab-col' : '' }}"><a href="{{ route('ghr.attend') }}" class="tab-class"> Attends <span class="badge badge-light"> {{$count['count_attend']}}</span></a></li>
 <li role="presentation" class="{{ Request::is('ghr/paid') ? 'tab-col' : '' }}"><a href="{{ route('ghr.paid') }}" class="tab-class"> Paid Holiday <span class="badge badge-light"> {{$count['count_paid']}}</span></a></li> 
</ul>
</div>


