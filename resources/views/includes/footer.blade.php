@section('js')

<script>

  // Sweet Alert confirmation before delete
  $(document).on('click', '.delete-item', function(e){
    e.preventDefault();
    var link = $(this).attr('href');
     swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Success!", "Record deleted successfully!", "success");
          window.location.href = link;
        } else {
          swal("The current change request has been cancelled.");
        }
      });

      return false;
  });

  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
  });


  // Hide alert message after few seconds
  $(".alert").delay(2000).slideUp(200, function() {
      $(this).alert('close');
  });

</script>

@endsection