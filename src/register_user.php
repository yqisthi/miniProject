<?php require_once('dbLogin.php'); ?>

<?php

if (isset($_POST['register'])) {
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $email = test_input($_POST['email']);
    $nama = test_input($_POST['nama']);
    $telepon = test_input($_POST['no_telepon']);

    //flag valid
    $valid = TRUE;

    //validasi email
    if (empty($email)) {
        $err_email = 'Email harus diisi';
        $valid = FALSE;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err_email = 'Format email salah';
        $valid = FALSE;
    }

    //validasi username
    if (empty($username)) {
        $err_username = 'Username harus diisi';
        $valid = FALSE;
    }

    //validasi nama
    if (empty($nama)) {
        $err_nama = 'Nama harus diisi';
        $valid = FALSE;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
        $err_nama = "Nama hanya dapat berisi huruf dan spasi";
        $valid = FALSE;
    }

    //validasi telepon
    if (empty($telepon)) {
        $err_telepon = 'Telepon harus diisi';
        $valid = FALSE;
    } elseif (!preg_match("/^[0-9]*$/", $telepon)) {
        $err_telepon = 'Format nomor telepon salah';
        $valid = FALSE;
    }

    //validasi password
    if (empty($password)) {
        $err_password = 'Password harus diisi';
        $valid = FALSE;
    }

    //enkripsi password
    elseif (!empty($password)) {
        $password = md5($password);
        $valid = TRUE;
    }

    if ($valid) {
        $result = $db->query("INSERT INTO user(username, password, nama, email, no_telepon, saldo) VALUES('$username', '$password', '$nama', '$email', '$telepon', '100000')");
        if ($result) {
            echo '<script>alert("Akun berhasil dibuat");</script>';
            header("Location: login.php");
        } else {
            echo '<script>alert("Akun gagal dibuat");</script>';
        }
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style type="text/css">
        @font-face {
            font-family: "Poppins-Medium";
            src: url(assets/Poppins-Medium.ttf);
        }

        @font-face {
            font-family: "Poppins-SemiBold";
            src: url(assets/Poppins-SemiBold.ttf);
        }

        .login-form {
            font-family: "Poppins-SemiBold";
            color: #486EF4;
        }

        .welcome-text {
            font-family: "Poppins-SemiBold";
        }

        .form-group {
            font-size: 1.20rem;

        }

        button {
            font-size: 1.35rem;
        }

        /* .btn-submit{
            background-color: #486EF4;
        } */

        body {
            background-color: white;
        }

        #login-alert {
            font-size: 1rem;
        }

        .error {
            color: #CC3636;
            font-weight: bold;
            font-size: 14px;
        }
    </style>

</head>

<body class="w-screen h-screen overflow-hidden">
    <div class="content flex">
        <div class="container1 w-3/12">
            <div class="form-content flex justify-center items-center w-full h-full">
                <div class="login-form w-11/12 pl-9">
                    <div class="welcome mb-4 text-3xl w-10/12">
                        <div class="welcome-text">Sign Up Your Account.</div>
                        <div class="backlogin">
                            <a href="login.php" class="text-success text-sm nav-link">Login Now...</a>
                        </div>
                    </div>
                    <form method="POST" onsubmit="return submitForm()" name="form" role="form">
                        <div class="form-group flex flex-col ">
                            <label for="email">Email</label>
                            <input class="border rounded m-0 w-10/12 text-black" id="login-email" type="text" class="form-control" name="email" value="<?php if (isset($email)) echo $email; ?>" placeholder=" email">
                            <div class="error">
                                <?php
                                if (isset($err_email)) {
                                    echo $err_email;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-group flex flex-col ">
                            <label for="username">Username</label>
                            <input class="border rounded m-0 w-10/12 text-black" id="login-username" type="text" class="form-control" name="username" value="<?php if (isset($username)) echo $username; ?>" placeholder=" username">
                            <div class="error">
                                <?php
                                if (isset($err_username)) {
                                    echo $err_username;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-group flex flex-col ">
                            <label for="nama">Name</label>
                            <input class="border rounded m-0 w-10/12 text-black" id="login-nama" type="text" class="form-control" name="nama" value="<?php if (isset($nama)) echo $nama; ?>" placeholder=" nama">
                            <div class="error">
                                <?php
                                if (isset($err_nama)) {
                                    echo $err_nama;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-group flex flex-col ">
                            <label for="no_telepon">Telepon</label>
                            <input class="border rounded m-0  w-10/12 text-black" id="login-no_telepon" type="text" class="form-control" name="no_telepon" value="<?php if (isset($telepon)) echo $telepon; ?>" placeholder=" telepon">
                            <div class="error">
                                <?php
                                if (isset($err_telepon)) {
                                    echo $err_telepon;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-group flex flex-col ">
                            <label for="password">Password</label>
                            <input class="border rounded mt-2 p-1 w-10/12 text-black" id="login-password" type="password" class="form-control" name="password" value="<?php if (isset($email)) echo $email; ?>" placeholder=" password">
                            <div class="error">
                                <?php
                                if (isset($err_password)) {
                                    echo $err_password;
                                }
                                ?>
                            </div>
                        </div>
                        <button class="btn-submit text-white bg-blue-500 w-2/5 text-xl mt-3 py-1 rounded" type="register" name="register" class="btn btn-success" value="register">Register</button>
                        <button class="btn-reset text-white bg-red-500 w-2/5 text-xl mt-3 py-1 rounded" type="reset" name="reset" class="btn btn-danger" value="reset">Reset</button>
                </div>
                </form>
            </div>
        </div>
        <div class="container2  w-9/12 h-max  ">
            <div class="picture flex flex-col justify-center items-center w-full h-full">
                <img src="burjo-katanya.jpg">
            </div>
        </div>
    </div>
    </div>
</body>

</html>