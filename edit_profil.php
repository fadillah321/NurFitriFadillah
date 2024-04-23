<?php
session_start();

// Periksa apakah pengguna sudah login
if(!isset($_SESSION['nama_lengkap'])) {
    // Jika pengguna belum login, redirect ke halaman login
    header("Location: login.php");
    exit();
}

// Include file koneksi ke database
include('backend.php');

// Ambil data pengguna dari database berdasarkan ID pengguna
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM user WHERE user_id = $user_id";

$result = mysqli_query($conn, $query);

// Inisialisasi variabel
$nama_lengkap = '';

// Periksa apakah data pengguna ditemukan
if(mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $nama_lengkap = $row['nama_lengkap'];
} else {
    // Jika data pengguna tidak ditemukan, redirect ke halaman profil dengan pesan kesalahan
    $_SESSION['error_msg'] = 'Data pengguna tidak ditemukan.';
    header("Location: edit_profil.php");
    exit();
}

// Fungsi untuk mengubah nama lengkap pengguna
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_nama_lengkap'])) {
    // Ambil data dari formulir
    $new_nama_lengkap = $_POST['new_nama_lengkap'];

    // Validasi data
    if (!empty($new_nama_lengkap)) {
        // Update nama lengkap pengguna di database
        $query_update = "UPDATE user SET nama_lengkap = '$new_nama_lengkap' WHERE user_id = $user_id";
        if(mysqli_query($conn, $query_update)) {
            // Update nama lengkap di sesi
            $_SESSION['nama_lengkap'] = $new_nama_lengkap;
            $_SESSION['success_msg'] = 'Nama lengkap berhasil diubah.';
            header("Location: dashboard.php");
            exit();
        } else {
            $_SESSION['error_msg'] = 'Terjadi kesalahan saat mengubah nama lengkap.';
        }
    } else {
        $_SESSION['error_msg'] = 'Nama lengkap tidak boleh kosong.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - WEB Galeri Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    /* CSS untuk navbar */
    .navbar {
        background-color: #725E42; /* Warna coklat */
        padding: 20px 0;
    }

    .navbar-brand {
        color: #fff; /* Warna teks putih */
        font-weight: bold;
        font-size: 25px;
        padding: 20px;
    }

    .nav-menu .nav-link {
        color: #fff; /* Warna teks putih */
        padding: 15px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        font-size: 18px;
    }

    .nav-menu .nav-link:hover {
        background-color: #fff; /* Warna hover */
    }

    .logout-btn {
        background-color:  #FFF7A9; /* Warna tombol logout */
        color: #fff; /* Warna teks putih */
        padding: 15px;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .logout-btn:hover {
        background-color:  #FFF7A9; /* Warna hover tombol logout */
    }

    /* CSS untuk form edit */
    .form-control {
        border-radius: 30px; /* Kotak oval */
        background-color: #FFFACD; /* Warna krim */
    }
</style>

</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">EDIT PROFIL</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li> 
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <?php if(isset($_SESSION['error_msg'])): ?>
                    <div class="alert alert-danger"><?php echo $_SESSION['error_msg']; ?></div>
                    <?php unset($_SESSION['error_msg']); ?>
                <?php endif; ?>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="mb-3">
                        <label for="new_nama_lengkap" class="form-label">Nama Lengkap Baru</label>
                        <input type="text" class="form-control" id="new_nama_lengkap" name="new_nama_lengkap" value="<?php echo $nama_lengkap; ?>">
                    </div>
                    <button type="submit" class="btn" style="background-color: #725E42; color: #ffffff;" name="edit_nama_lengkap">Simpan Perubahan</button>

                </form>
            </div>
        </div>
    </div>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
