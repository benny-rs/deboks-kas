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