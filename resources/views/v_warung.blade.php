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
            <a href="/" style="color:white;"><span class="material-icons">arrow_back</span></a>
            <h2>Data Warung</h2>
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
        @foreach($data as $warung)
            <div class="card">
                <h3>{{ $warung['nama'] }}</h3>
                <p>{{ $warung['nohp'] }}</p>
                <p>{{ $warung['alamat'] }}</p>
                <div class="action">
                    <button type="button" class="edit" onclick="editWarung({{ $warung->id }})">EDIT</button>
                    <button type="button" class="hapus" onclick="hapusWarung({{ $warung->id }})" >DELETE</button>
                </div>
                <a href="/pencatatan/{{ $warung['id'] }}/{{ idate('Y') }}/{{ idate('m') }}">PENCATATAN</a>
            </div>
        @endforeach
    </div>
    @if(!auth()->user()->is_admin)
    <button id="tambah-warung"><span class="material-icons">
        add
        </span></button>
    @endif
    <!-- Form tambah -->
    <div id="tambah-modal-overlay">
        <form class="modal-box" id="tambah-warung-form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-head">
                <h3>Data Warung</h3>
            </div>
            <div class="modal-content">
                <input type="text" class="nama" placeholder="Nama Warung" id="namaTambah" name="nama">
                <input type="text" class="alamat" placeholder="Alamat" id="alamatTambah" name="alamat">
                <input type="text" class="nohp" placeholder="No. HP" id="nohpTambah" name="nohp">
            </div>
            <div class="modal-footer">
                <button id="tambah-cancel-modal" type="button">Cancel</button>
                <button id="submit-modal" type="submit">Submit</button>
            </div>
        </form>
    </div>

    <!-- Form edit -->
    <div id="edit-modal-overlay">
        <form class="modal-box" id="edit-warung-form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-head">
                <h3>Data Warung</h3>
            </div>
            <div class="modal-content">
                <input type="hidden" id="idEdit" name="id">
                <input type="text" class="nama" placeholder="Nama Warung" id="namaEdit" name="nama">
                <input type="text" class="alamat" placeholder="Alamat" id="alamatEdit" name="alamat">
                <input type="text" class="nohp" placeholder="No. HP" id="nohpEdit" name="nohp">
            </div>
            <div class="modal-footer">
                <button id="edit-cancel-modal" type="button">Cancel</button>
                <button id="submit-modal" type="submit">Submit</button>
            </div>
        </form>
    </div>
    <script src="/js/data-warung.js"></script>
</body>
</html>