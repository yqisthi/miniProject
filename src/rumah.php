<?php
    // $db_host = 'localhost';
    // $db_database= 'burjo';
    // $db_username = 'root';
    // $db_password = '';

    // // connect database
    // $db = new mysqli($db_host, $db_username, $db_password, $db_database);
    // if ($db->connect_errno){
    //     die ("Could not connect to the database: <br />". $db->connect_error);
    // }
    session_start();
    require_once('dbLogin.php');
    function rupiah($angka){
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="bg-slate-100">
    <div class="h-screen w-full flex justify-center">
        
        <div class="pt-8 w-full">
            <h1 class="text-center font-sans font-bold text-2xl">Choose Your Menu</h1>
            <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 p-8">
                <?php 
                $sql = "SELECT * FROM menu";
                $menu = $db->query($sql);
                if ($menu->num_rows > 0) {
                    while($row = $menu->fetch_assoc()) {
                        echo 
                        '<div class="col-span-1 h-96 flex justify-center px-2 py-4">
                        <div class="relative">
                            <img class="h-[200px] w-[200px] object-cover rounded-2xl" class="rounded-xl" src="'.$row["images"].'"alt="">
                            <div class="py-2">
                                <h1 class="font-bold">'.$row["nama_menu"].'</h1>
                                <p class="font-light">Deskripsi</p>
                                <p class="font-bold mt-1">'.rupiah($row["harga"]).'</p>
                            </div>
                            <div class="absolute right-0 bottom-2">
                                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                href="menu_cart.php?id='.$row["id_menu"].'">Add +</a>
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