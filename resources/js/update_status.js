
$('.status_btn').on('click', function (event) {
    target = event.target || event.srcElement;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var status = target.id == 'start_course'? 1: 2;
    var id = target.value;
    $.ajax({
        url: "/admin/courses/update_status",
        method: "POST",
        data: {
            id: id,
            status: status
        },
        success: function ($data) {
            console.log($data);
            alert('Success');
            $('.badge').replaceWith($data['html']);
            $('.datepicker')[status-1].value = $data['date'];
            //location.reload();
        }
    })
});
