<?php 

require_once ("dbLogin.php");

$nama_menu =  $_GET['nama'];
$harga = $_GET['harga'];
$link = $_GET["link"];

$query = "INSERT INTO menu (nama_menu, harga, images) VALUES ('$nama_menu', '$harga', '$link')";

$result = $db->query($query);

header("location: adminRumah.php");

?>
