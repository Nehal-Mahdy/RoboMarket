<?php
$orderId= $_GET["id"];
include_once("./database/config.php");
$sql= "UPDATE orders set orderState='processing' where id = $orderId";
$result = mysqli_query($connection, $sql);
header('Location: orders.php');
?>