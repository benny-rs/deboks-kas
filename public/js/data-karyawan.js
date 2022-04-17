$('.profile-photo').click(function(){
    if($('#account-dropdown').css('display')=='none'){
        $('#account-dropdown').show()
    }else{
        $('#account-dropdown').hide()
    }
})

$('#tambah-cancel-modal').click(function () {
    $('#tambah-modal-overlay').hide();
})

$('#tambah-karyawan').click(function () {
    $('#tambah-modal-overlay').show();
})

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#tambah-karyawan-form').submit(function (e) {
    e.preventDefault();
    $.post(
        "/karyawan/tambah",
        {
            nama: $('#namaTambah').val(),
            email: $('#emailTambah').val(),
            username: $('#usernameTambah').val(),
            password: $('#passwordTambah').val(),
            alamat: $('#alamatTambah').val(),
            nohp: $('#nohpTambah').val()
        },
        function (data) {
            $('.container').html(data);
        })
        .always(function () {
            $('#tambah-modal-overlay').hide();
        })
        .fail(function (data) {
            console.log(data.responseJSON.errors);
            let errorMsg = '';
            $.each(data.responseJSON.errors, function (key, error) {
                errorMsg += error + '\n';
            })
            alert(errorMsg);
        })
})

// $('.delete').click(function (id) {
//     e.preventDefault();
//     $.post(
//         "/karyawan/delete",
//         {
//             id: $('#employee-id').val()
//         },
//         function (data) {
//             // $('.container').html(data);
//             console.log(data)
//         })
//         .always(function () {
//             $('#modal-overlay').hide();
//         })
//         .fail(function (data) {
//             console.log(data.responseJSON.errors);
//             let errorMsg = '';
//             $.each(data.responseJSON.errors, function (key, error) {
//                 errorMsg += error + '\n';
//             })
//             alert(errorMsg);
//         })
// })

function hapusKaryawan(id) {
    if (confirm('Yakin mau hapus data?')) {
        $.post(
            "/karyawan/hapus",
            {
                id: id
            },
            function (data) {
                $('.container').html(data);
                // alert('Data berhasil dihapus!');
                // console.log(data)
            })
            .always(function (data) {
                // $('#modal-overlay').hide();
                console.log(data)
            })
            .fail(function (data) {
                console.log(data.responseJSON.errors);
                let errorMsg = '';
                $.each(data.responseJSON.errors, function (key, error) {
                    errorMsg += error + '\n';
                })
                alert(errorMsg);
            })
    }
}

function editKaryawan(id){
    $('#idEdit').val(id);
    $('#namaEdit').val($(`#employee-name${id}`).html());
    $('#emailEdit').val($(`#employee-email${id}`).html());
    $('#usernameEdit').val($(`#employee-username${id}`).html());

    // Password tidak ditampilkan karena berupa Hash
    // $('#passwordEdit').val($(`#employee-password${id}`).val());
    
    $('#nohpEdit').val($(`#employee-phone${id}`).html());
    $('#alamatEdit').val($(`#employee-address${id}`).val());
    $('#edit-modal-overlay').show();
}

$('#edit-cancel-modal').click(function () {
    $('#edit-modal-overlay').hide();
})

$('#edit-karyawan-form').submit(function (e) {
    e.preventDefault();
    $.post(
        "/karyawan/edit",
        {
            id: $('#idEdit').val(),
            nama: $('#namaEdit').val(),
            email: $('#emailEdit').val(),
            username: $('#usernameEdit').val(),
            password: $('#passwordEdit').val(),
            alamat: $('#alamatEdit').val(),
            nohp: $('#nohpEdit').val()
        },
        function (data) {
            $('.container').html(data);
        })
        .always(function () {
            $('#edit-modal-overlay').hide();
        })
        .fail(function (data) {
            console.log(data.responseJSON.errors);
            let errorMsg = '';
            $.each(data.responseJSON.errors, function (key, error) {
                errorMsg += error + '\n';
            })
            alert(errorMsg);
        })
})