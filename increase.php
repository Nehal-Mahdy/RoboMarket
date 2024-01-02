<?php
$id= $_GET["id"];
$pId= $_GET["pId"];
include_once("./database/config.php");
$sqlPrice="select price from products where id =$pId";
$result = mysqli_query($connection, $sqlPrice);
$row = mysqli_fetch_array($result);
$price =$row[0];
// SELECT quantity from cart WHERE id=56 AND productId=6;
$sqlQuantity= "SELECT quantity from cart WHERE id=$id AND productId=$pId";
$quantity= mysqli_query($connection,$sqlQuantity);
$quant = mysqli_fetch_array($quantity);

$sqlUpdate= "UPDATE cart SET quantity= quantity+1, price = quantity*$price   WHERE id= $id AND productId=$pId ";
$update = mysqli_query($connection, $sqlUpdate);
// print_r($update);
header("location:cart.php");




// header("location:cart.php");

?>