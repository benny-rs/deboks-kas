<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencatatan</title>
    <link rel="stylesheet" href="/css/pencatatan.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css">

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> -->
</head>

<body>
    <nav>
        <div class="title">
            <a href="javascript:window.location = document.referrer;" style="color:white;"><span class="material-icons">arrow_back</span></a>
            <h2>Warung Aminah</h2>
        </div>
        <div class="month">
            <!-- <h2>Bulan Januari - 2022</h2> -->
            <!-- <input id="date"> -->
            <!-- Reference
            http://www.daterangepicker.com/ -->

            <input name="startDate" id="startDate" class="date-picker" value="Januari - 2022"/>
            <!-- Reference
            http://jsfiddle.net/DBpJe/5106 -->
        </div>
        <div class="account">
            <p>handoko</p>
            <div class="profile-photo"></div>
            <div id="account-dropdown">
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <table>
            <tr>
                <th>Minggu</th>
                <th>Jumlah Produk Terbeli</th>
                <th>Pemasukan</th>
                <th>Pengeluaran</th>
                <th>Pendapatan</th>
            </tr>
            <tr>
                <td>3</td>
                <td>30</td>
                <td>Rp 120.000</td>
                <td>Rp 30.000</td>
                <td>Rp 90.000</td>
            </tr>
            <tr>
                <th>Total</th>
                <th>54</th>
                <th>Rp 240.000</th>
                <th>Rp 240.000</th>
                <th>Rp 240.000</th>
            </tr>
        </table>
    </div>
    
    <script src="/js/pencatatan.js"></script>
</body>

</html>