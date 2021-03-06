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

$('#tambah-produk').click(function () {
    $('#tambah-modal-overlay').show();
})

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#tambah-produk-form').submit(function (e) {
    e.preventDefault();
    $.ajax({
        url: "/produk/tambah",
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

function hapusProduk(id) {
    if (confirm('Yakin mau hapus data?')) {
        $.post(
            "/produk/hapus",
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

function editProduk(id) {
    $('#idEdit').val(id);
    $('#namaEdit').val($(`#produk-nama${id}`).html());
    $('#hargaEdit').val($(`#produk-harga${id}`).html());
    $('#kuantitasEdit').val($(`#produk-kuantitas${id}`).html());
    $('#foto_lamaEdit').val($(`#produk-old-photo${id}`).val());
    $('#edit-modal-overlay').show();
}

$('#edit-cancel-modal').click(function () {
    $('#edit-modal-overlay').hide();
})

$('#edit-produk-form').submit(function (e) {
    e.preventDefault();
    $.ajax({
        url: "/produk/edit",
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