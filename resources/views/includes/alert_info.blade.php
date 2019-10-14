@if(session()->has('info'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong><i class="icon fa fa-check"></i>{{ session()->get('info')}}! </strong>
  </div>
@elseif(session()->has('wrong'))
	<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong><i class="icon fa fa-ban"></i>{{ session()->get('wrong')}}! </strong>
  </div>
@endif
