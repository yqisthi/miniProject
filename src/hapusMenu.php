<?php
    require_once("dbLogin.php");

    $id = $_GET['id'];

    $query = " DELETE FROM menu WHERE id_menu='" . $id . "'";
    $result = $db -> query($query);
    
    header('location:adminRumah.php');
?>