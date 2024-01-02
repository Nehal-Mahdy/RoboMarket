<?php
$productId= $_GET["id"];
include_once("../database/config.php");
$sql= "delete From products where id = $productId";
$result = mysqli_query($connection, $sql);
header('Location: allProducts.php');
?>