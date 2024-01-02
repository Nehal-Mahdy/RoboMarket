<?php
SESSION_start();
$name = $_SESSION['name'];
// echo $name."user";
require_once('./database/config.php');
$sql = "select * from products";

$result= mysqli_query($connection, $sql);

$sqlUser = "select * from users where name= '$name'";

$currentUser= mysqli_query($connection, $sqlUser);
$row = mysqli_fetch_array($currentUser);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js" integrity="sha512-X/YkDZyjTf4wyc2Vy16YGCPHwAY8rZJY+POgokZjQB2mhIRFJCckEGc6YyX9eNsPfn0PzThEuNs+uaomE5CO6A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        img{
            width:200px;
            height:200px;
        }
        .gradient-custom-2 {
/* fallback for old browsers */
background: #fccb90;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, #3a2c58, #17395e,#2E4374,#2E4374);

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, #9e93a5, #6c5d74, #6c5d74, #2E4374);
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}
}
    </style>
</head>
<body>
<?php
include_once('./assets/userNav.php')
?>

<div class= "container mt-5 text-center mb-5" >
    <h5 style="color:#4e3474;" class="m-5">
Feeding your family the best
</h5>
    <div class="row row-cols-3 g-3"  <?php
                  
                  while($productInfo =  mysqli_fetch_array($result)){ ?>>
  <div class="col">
    <div class="card">
   <?php echo "<img src='./products/images/".$productInfo["img"]."' class='card-img-top'>"?>
      <div class="card-body">
        <h5 class="card-title"><?php echo $productInfo['name']?></h5>
        <p class="card-text">
        <?php echo $productInfo['price']?> $
        </p>

        <?php 
if ($productInfo['quantity']==0){
  echo "<p class='card-text text-danger' >Out of Stock</p>";
}else{
  
 echo  "<a href='addTocart.php?id=$productInfo[id]'> 
 <button class='btn' 
  name='cartBtn' style='background-color:#4e3474; color:white;' >
  Add to cart</button>
       </a>";
}
?>




      </div>
    </div>
  </div <?php }?>>

</div>
</div>

<?php
include_once('./assets/userFooter.php')
?>

</body>
</html>