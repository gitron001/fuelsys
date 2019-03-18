@section('js')

<script>
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
</script>

@endsection