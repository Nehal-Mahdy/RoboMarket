<?php
$id= $_GET["id"];
$pId= $_GET["pId"];
include_once("./database/config.php");
$sql= "DELETE FROM cart WHERE id=$id AND productId=$pId";
$sqlQuery= mysqli_query($connection,$sql);
// $quant = mysqli_fetch_array($quantity);
header("location:cart.php");
?>