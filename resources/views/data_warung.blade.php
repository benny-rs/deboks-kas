<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Warung</title>
    <link rel="stylesheet" href="/css/data_warung.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <div class="title">
            <a href="javascript:window.location = document.referrer;" style="color:white;"><span class="material-icons">arrow_back</span></a>
            <h2>Data Warung</h2>
        </div>
        <div class="month">
            <h2>Bulan Januari - 2022</h2>
        </div>
        <div class="account">
            <p>{{ auth()->user()->nama }}</p>
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
        @foreach($data as $warung)
            <div class="card">
                <h3>{{ $warung['nama'] }}</h3>
                <p>{{ $warung['nohp'] }}</p>
                <p>{{ $warung['alamat'] }}</p>
                <a href="/pencatatan/{{ $warung['id'] }}">PENCATATAN</a>
            </div>
        @endforeach
    </div>
    <script src="/js/data-warung.js"></script>
</body>
</html>