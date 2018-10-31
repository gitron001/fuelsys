@if(session()->has('info'))
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Nottification:</strong> {{ session()->get('info')}}
  </div>
@endif