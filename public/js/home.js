$('.profile-photo').click(function () {
    if ($('#account-dropdown').css('display') == 'none') {
        $('#account-dropdown').show()
    } else {
        $('#account-dropdown').hide()
    }
})

$(document).ready(async function () {
    $.get(
        "/chart",
        function (data) {
            // $('.container').html(data);
            const labelData = data.map((val)=>`Bulan ${val.month}`);
            const valueData = data.map((val)=>val.total_produk_terbeli)
            console.log(data)
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    // labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
                    labels: labelData,
                    datasets: [{
                        label: 'pcs',
                        // data: [35, 37, 45, 30],
                        data: valueData,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
        .fail(function (data) {
            console.log(data);
        })
})


