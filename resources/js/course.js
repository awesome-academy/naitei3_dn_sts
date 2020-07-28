$(document).ready(function(){
    var i=1;
    var add_btn = document.getElementById('add_subject');
    var add_course_form = document.getElementById('add_course_form');
    if(add_btn){
        add_btn.addEventListener('click', function(){
            i++;
            var clone = document.querySelector('#subject_selector').cloneNode(true);
            clone.setAttribute('id', "");
            $('#dynamic_subject_field').append('<tr id="row'+i+'" class="dynamic-added"></tr>');
            $('#row'+i).append(clone);
            $('#row'+i).append('<td class="border-0"><button type="button" name="remove" id="'+i+'" class="btn btn-outline-danger btn_remove"><i class="fas fa-times"></i></button></td>');
        })
    }
    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id");
        $('#row'+button_id+'').remove();
    });

    $(add_course_form).on('submit', function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: 'POST',
            url: '/admin/courses',
            data: $('#add_course_form').serialize(),
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
                    window.location.reload();
                }
            }
        });
    })
});
