<div id="sent_to_grave">
    <form action="" method="post">
        @csrf
        @method('DELETE')
    </form>
</div>
<script>
    function delete_record(event) {
        event.preventDefault();
        let el = this;
        swal({
            // title: "Are you sure you want to delete this?",
            text: "Are you sure you want to delete this?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $('#sent_to_grave form').attr('action', $(el).attr('href')).submit();
            }
        });
    }
    $(function () {
        $(document).on('click', '.btnDelete', delete_record);
        {{--   status Changer Code start From Here     --}}
        $(document).on('change', '.switch-status', function () {
            $.ajax({
                url: this.dataset.url,
                dataType: 'Json',
                success: function (r) {
                    let msg = capitalizeFirstLetter(r.message);
                    if (r.status) {
                        toastr.success(msg);
                    } else {
                        toastr.error(msg);
                    }
                    if (typeof oTable !== undefined) {
                        oTable.draw();
                    }
                }
            });
        });
    });
</script>
