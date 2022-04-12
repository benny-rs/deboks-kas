<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <span class="material-icons">arrow_back</span>
            <h2>Data Karyawan</h2>
        </div>
        <div class="month">
            <h2>Bulan Januari - 2022</h2>
        </div>
        <div class="account">
            <p>Admin</p>
            <div class="user-photo"></div>
        </div>
    </nav>
    <div class="container">
        <div class="card">
            <div class="employee-photo" style="background-image: url(https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80);"></div>
            <h3 class="employee-name">Ahmad Andriyan</h3>
            <p class="employee-email">andriyan@mail.com</p>
            <p class="employee-username">andriyan123</p>
            <p class="employee-phone">081234567890</p>
            <div class="action">
                <a href="" class="edit">EDIT</a>
                <a href="" class="delete">DELETE</a>
            </div>
        </div>
        <div class="card">
            <div class="employee-photo" style="background-image: url(https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80);"></div>
            <h3 class="employee-name">Ahmad Andriyan</h3>
            <p class="employee-email">andriyan@mail.com</p>
            <p class="employee-username">andriyan123</p>
            <p class="employee-phone">081234567890</p>
            <div class="action">
                <a href="" class="edit">EDIT</a>
                <a href="" class="delete">DELETE</a>
            </div>
        </div>
    </div>
    <button id="add-employee"><span class="material-icons">
        add
        </span></button>
    
    <div id="modal-overlay">
        <div class="modal-box">
            <div class="modal-head">
                <h3>Data Karyawan</h3>
            </div>
            <div class="modal-content">
                <input type="text" class="nama" placeholder="Nama">
                <input type="email" class="email" placeholder="Email">
                <input type="text" class="username" placeholder="Username">
                <input type="text" class="password" placeholder="Password">
                <input type="text" class="alamat" placeholder="Alamat">
                <input type="text" class="nohp" placeholder="No. HP">
                <label for="employee-file-photo">Profile Photo</label>
                <input type="file" name="employee-file-photo" id="employee-file-photo">
            </div>
            <div class="modal-footer">
                <button id="cancel-modal">Cancel</button>
                <button id="submit-modal">Submit</button>
            </div>
        </div>
    </div>
    <script src="/js/data-karyawan.js"></script>
</body>
</html>