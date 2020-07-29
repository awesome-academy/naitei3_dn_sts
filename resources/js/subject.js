$(document).ready(function(){
    var i=1;
    var add_btn = document.getElementById('add');
    var submit = document.getElementById('submit-form');
    var add_task_form = document.getElementById('add_task');
    if(add_btn){
        add_btn.addEventListener('click', function(){
            i++;
            $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td class="border-0"><input type="{{ trans("crud.placeholdername") }} " name="task[]" placeholder="Enter Name" class="form-control name_list" /></td><td class="border-0"><button type="button" name="remove" id="'+i+'" class="btn btn-outline-danger btn_remove"><i class="fas fa-times"></i></button></td></tr>');
        })
    }


    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id");
        $('#row'+button_id+'').remove();
    });

    if(submit)
    {
        // submit.addEventListener('click', function(){
        $(add_task_form).on('submit', function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: 'POST',
                url: '/admin/subjects',
                data: $('#add_task').serialize(),
                type: 'json',
                crossDomain: true,
                success:function(data)
                {
                    if(data.error){
                        // printErrorMsg(data.error);
                        alert(data.error);
                    }else{
                        i=1;
                        alert(data.success);
                        $('.dynamic-added').remove();
                        $('#add_task')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }
            });
        })
    }

    function printErrorMsg (msg) {
       $(".print-error-msg").find("ul").html('');
       $(".print-error-msg").css('display','block');
       $(".print-success-msg").css('display','none');
       $.each( msg, function( key, value ) {
          $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
       });
    }
});
