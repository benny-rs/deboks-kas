<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Data Karyawan</title>
    <link rel="stylesheet" href="/css/data_karyawan.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
    <nav>
        <div class="title">
            <a href="/" style="color:white;"><span class="material-icons">arrow_back</span></a>
            <h2>Data Karyawan</h2>
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
                <div class="profile-photo" style="background-image: url('assets/images/default_profile.png');"></div>
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
        @foreach($data as $user)
            <div class="card">
                @if($user->foto_profil)
                    <div class="employee-photo" style="background-image: url({{ asset('storage/'.$user->foto_profil) }});"></div>
                @else
                    <div class="employee-photo" style="background-image: url('assets/images/default_profile.png');"></div>
                @endif
                <input type="hidden" id="employee-old-photo{{ $user->id }}" value="{{ $user->foto_profil }}">
                <h3 class="employee-name" id="employee-name{{ $user->id }}">{{ $user->nama }}</h3>
                <p class="employee-email" id="employee-email{{ $user->id }}">{{ $user->email }}</p>
                <p class="employee-username" id="employee-username{{ $user->id }}">{{ $user->username }}</p>
                <input type="hidden" id="employee-password{{ $user->id }}" value="{{ $user->password }}">
                <p class="employee-phone" id="employee-phone{{ $user->id }}">{{ $user->nohp }}</p>
                <input type="hidden" id="employee-address{{ $user->id }}" value="{{ $user->alamat }}">
                <div class="action">
                    <button type="button" class="edit" onclick="editKaryawan({{ $user->id }})">EDIT</button>
                    <button type="button" class="hapus" onclick="hapusKaryawan({{ $user->id }})" >DELETE</button>
                </div>
            </div>
        @endforeach
    </div>
    <button id="tambah-karyawan"><span class="material-icons">
        add
        </span></button>
    
    <!-- Form tambah -->
    <div id="tambah-modal-overlay">
        <form class="modal-box" id="tambah-karyawan-form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-head">
                <h3>Data Karyawan</h3>
            </div>
            <div class="modal-content">
                <input type="text" class="nama" placeholder="Nama" id="namaTambah" name="nama">
                <input type="email" class="email" placeholder="Email" id="emailTambah" name="email">
                <input type="text" class="username" placeholder="Username" id="usernameTambah" name="username">
                <input type="password" class="password" placeholder="Password" id="passwordTambah" name="password">
                <input type="text" class="alamat" placeholder="Alamat" id="alamatTambah" name="alamat">
                <input type="text" class="nohp" placeholder="No. HP" id="nohpTambah" name="nohp">
                <label for="foto_profilTambah">Profile Photo</label>
                <input type="file" name="foto_profil" id="foto_profilTambah">
            </div>
            <div class="modal-footer">
                <button id="tambah-cancel-modal" type="button">Cancel</button>
                <button id="submit-modal" type="submit">Submit</button>
            </div>
        </form>
    </div>

    <!-- Form edit -->
    <div id="edit-modal-overlay">
        <form class="modal-box" id="edit-karyawan-form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-head">
                <h3>Data Karyawan</h3>
            </div>
            <div class="modal-content">
                <input type="hidden" id="idEdit" name="id">
                <input type="text" class="nama" placeholder="Nama" id="namaEdit" name="nama">
                <input type="email" class="email" placeholder="Email" id="emailEdit" name="email">
                <input type="text" class="username" placeholder="Username" id="usernameEdit" name="username">
                <input type="text" class="password" placeholder="Password" id="passwordEdit" name="password">
                <input type="text" class="alamat" placeholder="Alamat" id="alamatEdit" name="alamat">
                <input type="text" class="nohp" placeholder="No. HP" id="nohpEdit" name="nohp">
                <label for="foto_profilEdit">Profile Photo</label>
                <input type="file" name="foto_profil" id="foto_profilEdit">
                <input type="hidden" name="foto_profil_lama" id="foto_profilLamaEdit">
            </div>
            <div class="modal-footer">
                <button id="edit-cancel-modal" type="button">Cancel</button>
                <button id="submit-modal" type="submit">Submit</button>
            </div>
        </form>
    </div>
    <script src="/js/data-karyawan.js"></script>
</body>
</html>