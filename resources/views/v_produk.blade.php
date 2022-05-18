<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Data Produk</title>
    <link rel="stylesheet" href="/css/produk.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <div class="title">
            <a href="/" style="color:white;"><span class="material-icons">arrow_back</span></a>
            <h2>Data Produk</h2>
        </div>
        <div class="month">
            <h2>Bulan Januari - 2022</h2>
        </div>
        <div class="account">
            <div class="account-name-role">
                <h3 style="margin: 0">{{ auth()->user()->nama }}</h3>
                @if(auth()->user()->is_admin)
                    <p style="margin: 0">Admin</p>
                @else
                    <p style="margin: 0">Karyawan</p>
                @endif
            </div>
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
        <div class="card">
            <div class="produk-img" style="background-image: url(https://images.unsplash.com/photo-1541592106381-b31e9677c0e5?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=80&raw_url=true&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070);"></div>
            <div class="produk-content">
                <h3>Keripik Pelepah Pisang</h3>
                <h3>Rasa Balado</h3>
                <div class="produk-detail-action">
                    <div class="produk-detail">
                        <p>Rp 5000/pcs</p>
                        <p>Tersedia : 30pcs</p>
                    </div>
                    <div class="action">
                        <button type="button" class="edit" onclick="editProduk()"><span class="material-symbols-rounded">edit</span></button>
                        <button type="button" class="hapus" onclick="hapusProduk()" ><span class="material-symbols-rounded">delete</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<!-- https://images.unsplash.com/photo-1541592106381-b31e9677c0e5?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=80&raw_url=true&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070 -->