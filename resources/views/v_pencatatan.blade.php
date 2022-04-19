<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencatatan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link href="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="/css/pencatatan2.css">
</head>

<body>
    <nav>
        <div class="title">
            <a href="/warung" style="color:white;"><span class="material-icons">arrow_back</span></a>
            <h2>{{ $warung->nama }}</h2>
            <input type="hidden" id="id_warung" value="{{ $warung->id }}">
        </div>
        <div class="month">
            <!-- <h2>Bulan Januari - 2022</h2> -->
            <!-- <input id="date"> -->
            <!-- Reference
            http://www.daterangepicker.com/ -->

            <input class="datepicker" id="datepicker" onkeydown="return false">
            <!-- Reference
            http://jsfiddle.net/DBpJe/5106 -->
        </div>
        <div class="account">
            <p>{{ auth()->user()->nama }}</p>
            @if(auth()->user()->foto_profil)
                <div class="profile-photo" style="background-image: url({{ asset('storage/'.auth()->user()->foto_profil) }});"></div>
            @else
                <div class="profile-photo" style="background-image: url({{ asset('storage/images/user-profile/default_profile.png') }});"></div>
            @endif
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
            @foreach($data as $pencatatan)
                <tr>
                    <td>{{ $pencatatan->minggu_ke }}</td>
                    <td>{{ $pencatatan->produk_terbeli }}</td>
                    <td>Rp {{ $pencatatan->pemasukan }}</td>
                    <td>Rp {{ $pencatatan->pengeluaran }}</td>
                    <td>Rp {{ $pencatatan->pemasukan-$pencatatan->pengeluaran }}</td>
                </tr>
            @endforeach
            <tr>
                <th>Total</th>
                <th>{{ $data->sum('produk_terbeli') }}</th>
                <th>Rp {{ $data->sum('pemasukan') }}</th>
                <th>Rp {{ $data->sum('pengeluaran') }}</th>
                <th>Rp {{ $data->sum('pemasukan')-$data->sum('pengeluaran') }}</th>
            </tr>
        </table>
    </div>
    
    <script src="/js/pencatatan.js"></script>
</body>

</html>