$('#cancel-modal').click(function () {
    $('#modal-overlay').hide();
})

$('#add-employee').click(function () {
    $('#modal-overlay').show();
})

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#karyawan-form').submit(function (e) {
    e.preventDefault();
    $.post(
        "/karyawan/add",
        {
            nama: $('#nama').val(),
            email: $('#email').val(),
            username: $('#username').val(),
            password: $('#password').val(),
            alamat: $('#alamat').val(),
            nohp: $('#nohp').val()
        },
        function (data) {
            console.log(data);
        })
        .always(function () {
            $('#modal-overlay').hide();
        })
        .fail(function (data) {
            console.log(data.responseJSON.errors);
            let errorMsg = '';
            $.each(data.responseJSON.errors, function(key,error){
                errorMsg+=error+'\n';
            })
            alert(errorMsg);
        })
})