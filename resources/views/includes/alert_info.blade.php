@if(session()->has('info'))
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Nottification:</strong> {{ session()->get('info')}}
  </div>
@elseif(session()->has('wrong'))
	<div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Nottification:</strong> {{ session()->get('wrong')}}
  </div>
@endif