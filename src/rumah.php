<?php
session_start();
require_once('dbLogin.php');
function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

if (!isset($_SESSION['session_username'])) {
    header('Location: login.php');
}
$q1 = "SELECT saldo FROM user WHERE username = '" . $_SESSION['session_username'] . "'";
$result_q1 = $db->Query($q1);
while ($row = $result_q1->fetch_object()) {
    $saldo = $row->saldo;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Document</title>

    <style>
        .navbar {
            background-color: #16003B;
        }
    </style>
</head>

<body class="bg-slate-100">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <div>
            <a class="navbar-brand ms-3 fw-bold text-light" href="#"><?php echo $_SESSION['session_username']; ?></a>
            <h1 class="navbar-brand ms-3 fw-bold text-light">Saldo: <?php echo rupiah($saldo); ?></h1>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="btn button-log me-3 text-light fw-bold" href="logout.php" role="button">Logout</a>
        </div>
    </nav>
    <div class="h-screen w-full flex justify-center">

        <div class="pt-8 w-full">
            <h1 class="text-center font-sans font-bold text-2xl">Choose Your Menu</h1>
            <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 p-8">
                <?php
                $sql = "SELECT * FROM menu";
                $menu = $db->query($sql);
                if ($menu->num_rows > 0) {
                    while ($row = $menu->fetch_assoc()) {
                        echo
                        '<div class="col-span-1 h-96 flex justify-center px-2 py-4">
                        <div class="relative">
                            <img class="h-[200px] w-[200px] object-cover rounded-2xl" class="rounded-xl" src="' . $row["images"] . '"alt="">
                            <div class="py-2">
                                <h1 class="font-bold">' . $row["nama_menu"] . '</h1>
                                <p class="font-light">Deskripsi</p>
                                <p class="font-bold mt-1">' . rupiah($row["harga"]) . '</p>
                            </div>
                            <div class="absolute right-0 bottom-2">
                                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                href="menu_cart.php?id=' . $row["id_menu"] . '">Add +</a>
                            </div>
                        </div>
                    </div>';
                    }
                }
                ?>

                <!-- <div class="col-span-1 h-96 flex justify-center px-2 py-4">
                    <div class="relative">
                        <img class="rounded-xl" src="https://picsum.photos/200" alt="">
                        <div class="py-2">
                            <h1 class="font-bold">Title</h1>
                            <p class="font-light">Desc</p>
                            <p class="font-bold mt-1">Rp100.000</p>
                        </div> -->
                <!-- <div class="absolute right-0 bottom-2">
                            <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded "
                            href="menu_cart.php?id=".$row["id_menu"]>Add +</a>
                        </div> -->
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>
