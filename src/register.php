<?php require_once('db_login.php'); ?>

<?php

if (isset($_POST['submit'])) {
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $email = test_input($_POST['email']);
    $nama = test_input($_POST['nama']);
    $telepon = test_input($_POST['no_telepon']);
    $result = $koneksi->query("INSERT INTO user(username, password, email, no_telepon, nama) VALUES('$username', '$password', '$email', '$telepon', '$nama')");

    if ($result):
        ?>
            <div class="alert alert-success">Akun berhasil disimpan</div>
        <?php else: ?>
            <div class="alert alert-error">Akun gagal dibuat <?php echo $db->error ?></div>
        }
        <?php
        endif;
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style type="text/css">
        @font-face {
            font-family: "Poppins-Medium";
            src: url(assets/Poppins-Medium.ttf);
        }

        @font-face {
            font-family: "Poppins-SemiBold";
            src: url(assets/Poppins-SemiBold.ttf);
        }

        .login-form{
            font-family: "Poppins-SemiBold";
            color: #486EF4;
        }
        .welcome-text{
            font-family: "Poppins-SemiBold";
        }

        .form-group{
            font-size: 1.35rem;
            
        }

        button{
            font-size: 1.35rem;
        }

        /* .btn-submit{
            background-color: #486EF4;
        } */

        body{
            background-color: white;
        }
        
        #login-alert {
            font-size: 1rem;
        }
        </style>

</head>

<body>
    <div class="content flex">
        <div class="container1 w-3/12">
            <div class="form-content flex justify-center items-center w-full h-full" >
                <div class="login-form w-11/12 pl-9">
                    <div class="welcome mb-5 text-3xl w-10/12">
                        <div class="welcome-text">Sign Up Your Account.
                        <div class="back-login "><a href="login-page.php" class= " text-sm p-0">Login now...</a></div>
                        </div>
                    </div>
                    
                    <form method="POST" onsubmit="return submitForm()" name="form" role="form">
                    <div class="form-group flex flex-col ">
                        <label for="email">Email</label>
                        <input class="border rounded m-0 w-10/12 text-slate-400" id="login-email" type="text" class="form-control" name="email" value="" placeholder="email">
                    </div>    
                    <div class="form-group flex flex-col ">
                        <label for="username">Username</label>
                        <input class="border rounded m-0 w-10/12 text-slate-400" id="login-username" type="text" class="form-control" name="username" value="" placeholder="username">
                    </div>
                    <div class="form-group flex flex-col ">
                        <label for="nama">Name</label>
                        <input class="border rounded m-0 w-10/12 text-slate-400" id="login-nama" type="text" class="form-control" name="nama" value="" placeholder="nama">
                    </div>
                    <div class="form-group flex flex-col ">
                        <label for="no_telepon">Telepon</label>
                        <input class="border rounded m-0  w-10/12 text-slate-400" id="login-no_telepon" type="text" class="form-control" name="no_telepon" value="" placeholder="telepon">
                    </div>
                    <div class="form-group flex flex-col ">
                        <label for="password">Password</label>
                        <input class="border rounded mt-2 p-1 w-10/12 text-slate-400"id="login-password" type="password" class="form-control" name="password" placeholder="password">
                    </div>
                    <button class="btn-submit text-white bg-blue-500 w-2/5 text-xl mt-3 py-1 rounded" type="submit" name="submit" class="btn btn-success" value="submit">Submit</button>
                    <button class="btn-reset text-white bg-red-500 w-2/5 text-xl mt-3 py-1 rounded" type="reset" name="reset" class="btn btn-danger" value="reset">Reset</button>
                    </div>
                    </form>
                </div>
            </div>
            <div class="container2  w-9/12 h-max  ">
                <div class="picture flex flex-col justify-center items-center w-full h-full">
                    <img src="assets/burjo-katanya.jpg">
                </div>
            </div>
        </div>
    </div>
</body>

</html>