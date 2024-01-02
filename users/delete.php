<?php
$uid= $_GET["id"];
include_once("../database/config.php");
$sql= "delete From users where id = $uid";
$result = mysqli_query($connection, $sql);
header('Location: testingtable.php');
?>