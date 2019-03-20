@section('js')

<script>

  // Sweet Alert confirmation before delete
  $(document).on('click', '.delete-item', function(){
     swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $(this).closest('form').submit();
          swal("Success!", "Record deleted successfully!", "success");
        } else {
          swal("The current change request has been cancelled.");
        }
      });
  });


  // Hide alert message after few seconds
  $(".alert").delay(2000).slideUp(200, function() {
      $(this).alert('close');
  });

</script>

@endsection