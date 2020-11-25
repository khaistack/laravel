$("#deleteUser").on('click', function() {
    alert('aaaa')
    var id = $(this).attr('data-id');
    console.log(id);
    $.ajax({
        url: '/admin/user/destroy',
        type: 'GET',
        dataType: 'JSON',
        data: {
            // 'param': data_param
        }
    }).done(function(res) {
        console.log(res);
    })
})