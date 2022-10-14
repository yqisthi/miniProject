<?php 
session_start();
require_once('dbLogin.php');
//atur variabel
$err        = "";
$username   = "";



// if(isset($_SESSION['session_username'])){
//     header("location:mainmenu.php");
//     exit();
// }

if(isset($_POST['login'])){
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    
    if($username == '' or $password == ''){
        $err .= "<li>Silakan masukkan username dan juga password.</li>";
    }else{
        $sql1 = "SELECT * FROM admin WHERE username_admin = '$username'";
        $q1   = mysqli_query($db, $sql1);
        $r1   = mysqli_fetch_array($q1);

        if($r1['username_admin'] == ''){
            $err .= "<li>Username <b>$username</b> tidak tersedia.</li>";
        }elseif($r1['password'] != md5($password)){
            $err .= "<li>Password yang dimasukkan tidak sesuai.</li>";
        }      
        
        if(empty($err)){
            $_SESSION['session_username_admin'] = $username; //server
            $_SESSION['session_password'] = md5($password);

            header("location:adminMenu.php");
        }
        $db->close();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
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

        .btn-submit{
            background-color: #486EF4;
        }

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
                        <div class="welcome-text">Welcome, User! Please sign in.</div>
                    </div>
                    <!-- dropdown -->
                    <div class="dropdown mt-3">
                        <button class="btn btn-info dropdown-toggle text-light" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="book-dropdown">
                            Login as
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="book-dropdown">
                            <li><a class="dropdown-item" href="login.php">User</a></li>
                            <li><a class="dropdown-item" href="loginAdmin.php">Admin</a></li>
                        </ul>
                    </div>
                    <form action="" method="post" id="loginform" role="form">
                    <div class="form-group flex flex-col ">
                        <label for="username">Username</label>
                        <input class="border rounded mt-1 p-1 w-10/12 text-slate-400" id="login-username" type="text" class="form-control" name="username" value="<?php echo $username ?>" placeholder="username">
                            
                    </div>
                        <div class="form-group flex flex-col mt-4 ">
                            <label for="password">Password</label>
                            <input class="border rounded mt-2 p-1 w-10/12 text-slate-400"id="login-password" type="password" class="form-control" name="password" placeholder="password">
                            <div class="text-danger"></div>
                            
                            <?php if($err){ ?>
                            <div id="login-alert" class="alert alert-danger col-sm-12 w-10/12 mt-4 ">
                            <ul><?php echo $err ?></ul>
                            </div>
                            <?php } ?>
                        </div>
                        <button class="btn-submit text-white bg-blue-500 w-10/12 text-xl mt-3 py-1 rounded" type="submit" name="login" class="btn btn-success" value="Login">Login</button>
                    </div>
                    </form>
                </div>
            </div>
            <div class="container2  w-9/12">
                <div class="picture flex flex-col justify-center items-center w-full h-full">
                    <img src="burjo-katanya.jpg">
                </div>
            </div>
        </div>
    
    </div>
</body>

</html>