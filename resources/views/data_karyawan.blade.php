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
        @foreach($data as $user)
            <div class="card">
                <div class="employee-photo" style="background-image: url({{ $user->foto_profil }});"></div>
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
                <input type="text" class="nama" placeholder="Nama" id="namaTambah">
                <input type="email" class="email" placeholder="Email" id="emailTambah">
                <input type="text" class="username" placeholder="Username" id="usernameTambah">
                <input type="password" class="password" placeholder="Password" id="passwordTambah">
                <input type="text" class="alamat" placeholder="Alamat" id="alamatTambah">
                <input type="text" class="nohp" placeholder="No. HP" id="nohpTambah">
                <label for="employee-file-photo">Profile Photo</label>
                <input type="file" name="foto_profil" id="employee-file-photo">
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
                <input type="hidden" id="idEdit">
                <input type="text" class="nama" placeholder="Nama" id="namaEdit">
                <input type="email" class="email" placeholder="Email" id="emailEdit">
                <input type="text" class="username" placeholder="Username" id="usernameEdit">
                <input type="password" class="password" placeholder="Password" id="passwordEdit">
                <input type="text" class="alamat" placeholder="Alamat" id="alamatEdit">
                <input type="text" class="nohp" placeholder="No. HP" id="nohpEdit">
                <label for="employee-file-photo">Profile Photo</label>
                <input type="file" name="foto_profil" id="employee-file-photo">
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