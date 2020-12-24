<script>
    $(document).ready(function() {
        $('.btn-delete-confirm').click(function(e){
            e.preventDefault();
            var linkURL = $(this).attr("href");
            console.log(linkURL);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                    // console.log('deleted');
                    // window.location.href = linkURL;
                }
            })
        });
    });
</script>