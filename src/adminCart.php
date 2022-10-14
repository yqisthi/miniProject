<?php
session_start();
require_once('dbLogin.php');




?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Status</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        div.card {
            width: 250px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container flex justify-center align-items-center h-full w-full">
        <div class="card w-75">
            <div class="card-body text-center ">

                <div class="container">
                    <table class="table text-center table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Order</th>
                                <th scope="col">Name</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <?php
                        // Include our login information
                        require_once('dbLogin.php');
                        // Execute the query
                        $query = " SELECT nama,waktu_pembelian,price FROM antrian INNER JOIN user
                        ON antrian.id_antrian = user.id_antrian ";
                        $result = $db->query($query);
                        if (!$result) {
                            die("Could not query the database: <br />" . $db->error . "<br>Query: " . $query);
                        }
                        // Fetch and display the results
                        $i = 1;
                        while ($row = $result->fetch_object()) {
                            echo '<tr>';
                            echo '<td>' . $i . '</td> ';
                            echo '<td>' . $row->nama . '</td> ';
                            echo '<td>' . $row->waktu_pembelian . '</td> ';
                            echo '<td>' . $row->price . '</td> ';
                            echo '<td><a class="btn btn-warning btn-sm" href="#.php?id='.$row->name.'">Edit</a>&nbsp;&nbsp;</td>';
                            echo '</tr>';
                            $i++;
                        }
                        echo '</table>';
                        echo '<br />';

                        $result->free();
                        $db->close();
                        ?>
                    </table>
                    <a class="bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-8 rounded " href="rumah.php">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>