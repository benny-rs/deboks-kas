var dp = $('.datepicker').datepicker({
    setDates: new Date(),
    autoclose: true,
    format: "MM - yyyy",
    startView: "months", 
    minViewMode: "months"
});
$('.datepicker').datepicker('setDate', new Date(window.location.pathname.split('/')[3], window.location.pathname.split('/')[4]-1, 1));
dp.on('changeMonth', function(e){
    console.log(e.date);
    // $('#date-result').html(e.date.getMonth()+" "+e.date.getFullYear())
    window.location = `/pencatatan/${$('#id_warung').val()}/${e.date.getFullYear()}/${e.date.getMonth()+1}`;
});

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

$('#tambah-pencatatan').click(function () {
    $('#tambah-modal-overlay').show();
})

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#tambah-pencatatan-form').submit(function (e) {
    e.preventDefault();
    $.ajax({
        url: window.location.pathname+'/tambah',
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

function hapusPencatatan(id) {
    if (confirm('Yakin mau hapus data?')) {
        $.post(
            window.location.pathname+'/hapus',
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

function editPencatatan(id) {
    $('#idEdit').val(id);
    $('#minggu_keEdit').val($(`#pencatatan-minggu_ke${id}`).html());
    $('#produk_terbeliEdit').val($(`#pencatatan-produk_terbeli${id}`).html());
    $('#pemasukanEdit').val($(`#pencatatan-pemasukan${id}`).html().split(' ')[1]);
    $('#pengeluaranEdit').val($(`#pencatatan-pengeluaran${id}`).html().split(' ')[1]);
    $('#edit-modal-overlay').show();
}

$('#edit-cancel-modal').click(function () {
    $('#edit-modal-overlay').hide();
})

$('#edit-pencatatan-form').submit(function (e) {
    e.preventDefault();
    $.ajax({
        url: window.location.pathname+'/edit',
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