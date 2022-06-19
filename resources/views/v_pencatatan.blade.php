<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Pencatatan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" /> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <link href="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="/css/pencatatan.css">
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
            <div class="account-name-role">
                <h3 style="margin: 0;font-size:1.17em">{{ auth()->user()->nama }}</h3>
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
        <table>
            <tr>
                <th>Minggu</th>
                <th>Jumlah Produk Terbeli</th>
                <th>Pemasukan</th>
                <th>Pengeluaran</th>
                <th>Pendapatan</th>
                <th>Action</th>
            </tr>
            @foreach($data as $pencatatan)
                <tr>
                    <td class="pencatatan-minggu_ke" id="pencatatan-minggu_ke{{ $pencatatan->id }}">{{ $pencatatan->minggu_ke }}</td>
                    <td class="pencatatan-produk_terbeli" id="pencatatan-produk_terbeli{{ $pencatatan->id }}">{{ $pencatatan->produk_terbeli }}</td>
                    <td class="pencatatan-pemasukan" id="pencatatan-pemasukan{{ $pencatatan->id }}">Rp {{ $pencatatan->pemasukan }}</td>
                    <td class="pencatatan-pengeluaran" id="pencatatan-pengeluaran{{ $pencatatan->id }}">Rp {{ $pencatatan->pengeluaran }}</td>
                    <td>Rp {{ $pencatatan->pemasukan-$pencatatan->pengeluaran }}</td>
                    <td class="action">
                        <button type="button" class="edit" onclick="editPencatatan({{ $pencatatan->id }})"><span class="material-symbols-rounded">edit</span></button>
                        <button type="button" class="hapus" onclick="hapusPencatatan({{ $pencatatan->id }})" ><span class="material-symbols-rounded">delete</span></button>
                    </td>
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
    @if(!auth()->user()->is_admin)
    <button id="tambah-pencatatan"><span class="material-icons">
        add
        </span></button>
    @endif
    <!-- Form tambah -->
    <div id="tambah-modal-overlay">
        <form class="modal-box" id="tambah-pencatatan-form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-head">
                <h3>Data Pencatatan</h3>
            </div>
            <div class="modal-content">
                <input type="text" class="minggu_ke" placeholder="Minggu ke" id="minggu_keTambah" name="minggu_ke">
                <input type="text" class="produk_terbeli" placeholder="Produk terbeli" id="produk_terbeliTambah" name="produk_terbeli">
                <input type="text" class="pemasukan" placeholder="Pemasukan" id="pemasukanTambah" name="pemasukan">
                <input type="text" class="pengeluaran" placeholder="Pengeluaran" id="pengeluaranTambah" name="pengeluaran">
            </div>
            <div class="modal-footer">
                <button id="tambah-cancel-modal" type="button">Cancel</button>
                <button id="submit-modal" type="submit">Submit</button>
            </div>
        </form>
    </div>

    <!-- Form edit -->
    <div id="edit-modal-overlay">
        <form class="modal-box" id="edit-pencatatan-form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-head">
                <h3>Data Pencatatan</h3>
            </div>
            <div class="modal-content">
                <input type="hidden" id="idEdit" name="id">
                <input type="text" class="minggu_ke" placeholder="Minggu ke" id="minggu_keEdit" name="minggu_ke">
                <input type="text" class="produk_terbeli" placeholder="Produk terbeli" id="produk_terbeliEdit" name="produk_terbeli">
                <input type="text" class="pemasukan" placeholder="Pemasukan" id="pemasukanEdit" name="pemasukan">
                <input type="text" class="pengeluaran" placeholder="Pengeluaran" id="pengeluaranEdit" name="pengeluaran">
            </div>
            <div class="modal-footer">
                <button id="edit-cancel-modal" type="button">Cancel</button>
                <button id="submit-modal" type="submit">Submit</button>
            </div>
        </form>
    </div>
    <script src="/js/pencatatan.js"></script>
</body>

</html>