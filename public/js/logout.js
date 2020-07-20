var logout = document.getElementById('logout');

if(logout)
{
    logout.addEventListener('click', function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }),
        $.ajax({
            type: 'POST',
            url: '/logout',
            crossDomain: true,
            success: function(response)
            {
                window.location.reload();
            }
        })
    })
}
