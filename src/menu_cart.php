<?php
session_start();
require_once('dbLogin.php');

$id = $_GET['id'];
if ($id != "") {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]++;
    } else {
        $_SESSION['cart'][$id] = 1;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');
    </style>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <div class=" d-flex justify-content-center align-items-center h-screen w-screen">
            <div>
                <div class="overflow-x-auto relative shadow-2xl sm:rounded-lg p-2">
                    <p class="fw-bold fs-3 text-center mb-3">Pesanan yang harus dibayar</p>
                    <table class="w-full text-md text-left">
                        <thead>
                            <tr>
                                <th scope="col" class="py-3 px-6">Menu</th>
                                <th scope="col" class="py-3 px-6">Banyak</th>
                                <th scope="col" class="py-3 px-6">Harga Satuan</th>
                                <th scope="col" class="py-3 px-6">Jumlah</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $q1 = "SELECT saldo FROM user WHERE username = '" . $_SESSION['session_username'] . "'";
                            $result_q1 = $db->Query($q1);
                            while ($row = $result_q1->fetch_object()) {
                                $saldo = $row->saldo;
                            }

                            $query_saldo = "SELECT harga FROM menu";
                            $result_saldo = $db->query($query_saldo);
                            while ($row = $result_saldo->fetch_object()) {
                                $harga = $row->harga;
                            }

                            $jumlah = 0;
                            $jumlah_harga = 0;
                            if (is_array($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $id => $banyak) {
                                    $query = " SELECT * FROM menu WHERE id_menu='" . $id . "'";
                                    $result = $db->query($query);
                                    if (!$result) {
                                        die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
                                    }
                                    while ($row = $result->fetch_object()) {
                                        echo '<tr>';
                                        echo '<td class="py-4 px-6">' . $row->nama_menu . '</td>';
                                        echo '<td class="py-4 px-6">' . $banyak . '</td>';
                                        $harga = $row->harga;
                                        echo '<td class="py-4 px-6">' . $harga . '</td>';
                                        echo '<td class="py-4 px-6">' . $harga * $banyak . '</td></tr>';
                                        $jumlah_harga = $jumlah_harga + ($row->harga * $banyak);
                                        $jumlah = $jumlah + $banyak;
                                    }
                                }
                                $result->free();
                                $db->close();
                            } else {
                                echo '<tr><td colspan="6" align="center">There is no item in shopping cart</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="text-center"><?php echo 'Saldo anda : Rp' . $saldo . '' ?></div><br>

                    <div class="text-center"><?php echo 'Jumlah yang harus dibayar : Rp' . $jumlah_harga . '' ?></div><br>
                    <div class="d-flex justify-content-center item-align-center w-auto h-auto">
                        <a class="btn btn-primary" href="rumah.php">Kembali ke menu</a>&nbsp;&nbsp;
                        <?php
                        $_SESSION["harga"] = $jumlah_harga;
                        ?>
                        <a class="btn btn-success" href="success.php">Bayar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>