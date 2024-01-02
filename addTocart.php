<?php
SESSION_start();
$name = $_SESSION['name'];
// include_once("../database/config.php");
include_once("./database/config.php");
// $sqlUser = "select * from users where name= '$name'";

// $currentUser= mysqli_query($connection, $sqlUser);
// $user = mysqli_fetch_array($currentUser);

$productId= $_GET["id"];
$uidSql= "select * from users where name='$name'";
$uidResult = mysqli_query($connection, $uidSql);
$userInfo = mysqli_fetch_array($uidResult);
$uID= $userInfo['id'];

$sql="select * from products where id =$productId";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result);
// $name_cart= $name."_cart";
$productPrice= $row['price'];
$productName= $row['name'];
$productImg= $row['img'];

// 
// $sqlAdd= 'INSERT INTO '.$name.'_cart (productName,quantity,price,date) VALUES ('$row['name']',1,$row['price'], NOW())';
$exist=  "SELECT EXISTS(SELECT * from cart WHERE userId= $uID AND productId= $productId)";
$existed= mysqli_query($connection, $exist);

$row = mysqli_fetch_row($existed);

if ($row[0] == 1) {
//   echo "existed";
  $sqlUpdate= "UPDATE cart SET quantity= quantity+1, price= quantity*price WHERE userId= $uID AND productId= $productId";
  $update = mysqli_query($connection, $sqlUpdate);
  header("location:homeUser.php");
} else {
//   echo "not existed";
  $sqlAdd= "INSERT INTO cart ( userId, productName ,  price,quantity , img, productId ) VALUES ( $uID,'$productName',$productPrice, 1,'$productImg', $productId)";
$added = mysqli_query($connection, $sqlAdd);
header("location:homeUser.php");
}
// $sqlAdd= "INSERT INTO cart ( userId, productName ,  price,quantity , img, productId ) VALUES ( $uID,'$productName',$productPrice, 1,'$productImg', $productId)";
// $added = mysqli_query($connection, $sqlAdd);
// // header("location:homeUser.php");

?>