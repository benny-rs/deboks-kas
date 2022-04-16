var dp = $('.datepicker').datepicker({
    autoclose: true,
    format: "MM - yyyy",
    startView: "months", 
    minViewMode: "months"
});
dp.on('changeMonth', function(e){
    console.log(e.date);
    // $('#date-result').html(e.date.getMonth()+" "+e.date.getFullYear())
    window.location = `/pencatatan/${$('#id_warung').val()}/${e.date.getFullYear()}/${e.date.getMonth()+1}`;
});