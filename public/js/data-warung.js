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

$('#tambah-warung').click(function () {
    $('#tambah-modal-overlay').show();
})

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#tambah-warung-form').submit(function (e) {
    e.preventDefault();
    $.ajax({
        url: "/warung/tambah",
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (data) {
            $('.container').html(data);
            $('#tambah-modal-overlay').hide();
            // console.log(data)
        },
        error: function (data) {
            // $('.container').html(data);
            $('#tambah-modal-overlay').hide();
            console.log(data.responseJSON.errors);
            let errorMsg = '';
            $.each(data.responseJSON.errors, function (key, error) {
                errorMsg += error + '\n';
            })
            alert(errorMsg);
        }
    })
})

function hapusWarung(id) {
    if (confirm('Yakin mau hapus data?')) {
        $.post(
            "/warung/hapus",
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
                console.log("Data sukses dihapus")
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

function editWarung(id) {
    $('#idEdit').val(id);
    $('#namaEdit').val($(`#warung-name${id}`).html());
    $('#nohpEdit').val($(`#warung-phone${id}`).html());
    $('#alamatEdit').val($(`#warung-address${id}`).html());
    $('#edit-modal-overlay').show();
}

$('#edit-cancel-modal').click(function () {
    $('#edit-modal-overlay').hide();
})

$('#edit-warung-form').submit(function (e) {
    e.preventDefault();
    $.ajax({
        url: "/warung/edit",
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (data) {
            $('.container').html(data);
            $('#edit-modal-overlay').hide();
            // console.log(data)
        },
        error: function (data) {
            // $('.container').html(data);
            $('#edit-modal-overlay').hide();
            console.log(data.responseJSON.errors);
            let errorMsg = '';
            $.each(data.responseJSON.errors, function (key, error) {
                errorMsg += error + '\n';
            })
            alert(errorMsg);
        }
    })
})