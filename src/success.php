<?php
session_start();
require_once('dbLogin.php');

function rupiah($angka)
{
    $hasil_rupiah = "Rp" . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

$_SESSION['cart'] = null;
$update = "UPDATE user SET saldo=saldo-" . $_SESSION["harga"] . "";
if ($db->query($update) === TRUE) {
    echo "";
} else {
    echo "Error updating record: " . $db->error;
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>udah kelar beli</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://mdbootstrap.com/docs/standard/content-styles/icons/" target="_blank">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>

    <div class="container flex justify-center align-items-center h-full w-full">
        <div class="">
            <div class="flex justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                </svg>
            </div>
            <?php
            $q1 = "SELECT saldo FROM user WHERE username = '" . $_SESSION['session_username'] . "'";
            $result_q1 = $db->Query($q1);
            while ($row = $result_q1->fetch_object()) {
                $saldo = $row->saldo;
            }
            $_SESSION['harga'] = null;
            ?>
            <div class="text-center">
                <br>
                <h1 class="display-5">Pesanan Sudah dibayar!</h1>
                <h1 class="display-5">Terima kasih.</h1>
                <br>
                <?php
                echo '<h1 class="display-4">Saldo Anda Tersisa ' . rupiah($saldo) . ' Terima kasih.</h1>';
                ?>
                <br>
                <!-- Using utilities: -->
                <a class="bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-8 rounded" href="rumah.php">Pesan Lagi</a>
            </div>
        </div>
    </div>




</body>

</html>