  <div class="tab-select-outer">
    Select：
   <select name="select" onChange="location.href=value;" id="tab-select">
      <option value="#">---List below---</a></option>
      <option value="http://orenop.herokuapp.com/lists/absent">Absents</a></option>
      <option value="http://orenop.herokuapp.com/lists/late">Lates</a></option>
      <option value="http://orenop.herokuapp.com/lists/notattend">No Status</option>
      <option value="http://orenop.herokuapp.com/lists/attend">Attends</option>
      <option value="http://orenop.herokuapp.com/lists/paid">Paid Holiday</option>
    </select>
  </div>

<div class="tab-button-outer">
<ul class="nav nav-tabs" id="tab-button">
 <li role="presentation"><a href="{{ route('lists.absent') }}" class="tab-class">Absents<span class="badge"> {{$count['count_absent']}}</span></a></li>
 <li role="presentation"><a href="{{ route('lists.late') }}" class="tab-class">Lates <span class="badge"> {{$count['count_late']}}</span></a></li>
 <li role="presentation"><a href="{{ route('lists.notattend') }}" class="tab-class">No Status <span class="badge"> {{$count['count_notattend']}}</span></a></li>
 <li role="presentation"><a href="{{ route('lists.attend') }}" class="tab-class"> Attends <span class="badge badge-light"> {{$count['count_attend']}}</span></a></li>
 <li role="presentation"><a href="{{ route('lists.paid') }}" class="tab-class"> Paid Holiday <span class="badge badge-light"> {{$count['count_paid']}}</span></a></li> 
 <li role="presentation"><a href="{{ route('lists.over') }}" class="tab-class"> Over <span class="badge badge-light"> {{$count['count_over']}}</span></a></li> 
</ul>
</div>

