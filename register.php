<?php
   require 'backend.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register - SB user</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-image: url('tema.jpg'); /* Ganti 'tema.jpg' dengan lokasi dan nama file gambar Anda */
            background-size: cover; /* Menyesuaikan gambar agar terisi seluruh area */
            background-repeat: no-repeat; /* Mencegah gambar diulang */
        }
        .register-form {
            background-color: rgba(255, 255, 255, 0.8); /* Warna latar belakang form dengan opasitas */
            padding: 20px; /* Padding untuk meningkatkan ruang di dalam form */
            border-radius: 10px; /* Mengatur sudut border-radius */
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5); /* Menambahkan bayangan untuk efek 3D */
        }
        .btn-primary {
            background-color: #725E42; /* Ubah warna latar belakang tombol */
            border-color:  #3A2B2D; /* Ubah warna border tombol jika diperlukan */
        }
        .btn-primary:hover {
            background-color:   #3A2B2D; /* Ubah warna latar belakang tombol saat dihover */
            border-color:   #FFF7A9; 
        }
    </style>
</head>
<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5 register-form"> <!-- Tambahkan kelas 'register-form' di sini -->
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                <div class="card-body">
                                    <form method="post" action="login.php"> <!-- Sesuaikan dengan lokasi file untuk menangani registrasi -->
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputusername" name="username" type="text" placeholder="Enter your username" />
                                                    <label for="inputusername">Username</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" id="inputpassword" name="password" type="password" placeholder="Create a password" />
                                                    <label for="inputpassword">Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputemail" name="email" type="email" placeholder="name@example.com" />
                                            <label for="inputemail">Email</label>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputnamalengkap" name="namalengkap" type="text" placeholder="Enter your full name" />
                                                    <label for="inputnamalengkap">Full Name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputalamat" name="alamat" type="text" placeholder="Enter your address" />
                                                    <label for="inputalamat">Address</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><button class="btn btn-primary btn-block" type="submit" name="register">Create Account</button></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
