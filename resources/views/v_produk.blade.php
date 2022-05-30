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
        @foreach($data as $produk)
            <div class="card">
                <div class="produk-img" style="background-image: url(https://images.unsplash.com/photo-1541592106381-b31e9677c0e5?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=80&raw_url=true&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070);"></div>
                <div class="produk-content">
                    <h3 id="produk-nama{{ $produk->id }}">{{ $produk['nama'] }}</h3>
                    <div class="produk-detail-action">
                        <div class="produk-detail">
                            <p>Rp <span id="produk-harga{{ $produk->id }}">{{ $produk['harga'] }}</span>/pcs</p>
                            <p>Tersedia : <span id="produk-kuantitas{{ $produk->id }}">{{ $produk['kuantitas'] }}</span>pcs</p>
                        </div>
                        <div class="action">
                            <button type="button" class="edit" onclick="editProduk({{ $produk->id }})"><span class="material-symbols-rounded">edit</span></button>
                            <button type="button" class="hapus" onclick="hapusProduk({{ $produk->id }})" ><span class="material-symbols-rounded">delete</span></button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if(!auth()->user()->is_admin)
    <button id="tambah-produk"><span class="material-icons">
        add
        </span></button>
    @endif
    <!-- Form tambah -->
    <div id="tambah-modal-overlay">
        <form class="modal-box" id="tambah-produk-form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-head">
                <h3>Data Produk</h3>
            </div>
            <div class="modal-content">
                <input type="text" class="nama" placeholder="Nama Produk" id="namaTambah" name="nama">
                <input type="text" class="harga" placeholder="Harga" id="hargaTambah" name="harga">
                <input type="text" class="kuantitas" placeholder="Kuantitas" id="kuantitasTambah" name="kuantitas">
            </div>
            <div class="modal-footer">
                <button id="tambah-cancel-modal" type="button">Cancel</button>
                <button id="submit-modal" type="submit">Submit</button>
            </div>
        </form>
    </div>

    <!-- Form edit -->
    <div id="edit-modal-overlay">
        <form class="modal-box" id="edit-produk-form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-head">
                <h3>Data Produk</h3>
            </div>
            <div class="modal-content">
                <input type="hidden" id="idEdit" name="id">
                <input type="text" class="nama" placeholder="Nama Produk" id="namaEdit" name="nama">
                <input type="text" class="harga" placeholder="Harga" id="hargaEdit" name="harga">
                <input type="text" class="kuantitas" placeholder="Kuantitas" id="kuantitasEdit" name="kuantitas">
            </div>
            <div class="modal-footer">
                <button id="edit-cancel-modal" type="button">Cancel</button>
                <button id="submit-modal" type="submit">Submit</button>
            </div>
        </form>
    </div>
    <script src="/js/produk.js"></script>
</body>
</html>

<!-- https://images.unsplash.com/photo-1541592106381-b31e9677c0e5?crop=entropy&cs=tinysrgb&fm=jpg&ixlib=rb-1.2.1&q=80&raw_url=true&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070 -->