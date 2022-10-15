<?php 

require_once ("dbLogin.php");

$nama_menu =  $_GET['nama'];
$harga = $_GET['harga'];

$query = "INSERT INTO menu (nama_menu, harga) VALUES ('$nama_menu', '$harga')";

$result = $db->query($query);

header("location: adminRumah.php");

?>