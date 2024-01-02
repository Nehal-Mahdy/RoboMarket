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
// echo $quant[0];
if($quant[0] > 0){
$sqlUpdate= "UPDATE cart SET quantity= quantity-1, price = quantity*$price   WHERE id= $id AND productId=$pId ";
$update = mysqli_query($connection, $sqlUpdate);
// print_r($update);
header("location:cart.php");
}else{
$setQuantity= "DELETE from cart WHERE id= $id";
$deleteProduct = mysqli_query($connection, $setQuantity);
header("location:cart.php");

// print_r($deleteProduct);
}


// header("location:cart.php");

?>