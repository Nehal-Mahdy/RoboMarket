
<?php
SESSION_start();
$name = $_SESSION['name'];
require_once('./database/config.php');

$sqlUser = "select * from users where name= '$name'";

$currentUser= mysqli_query($connection, $sqlUser);
$row = mysqli_fetch_array($currentUser);
$sql = "select * from cart where userId= $row[id]";

$result= mysqli_query($connection, $sql);
//checking if cart is empty
if(mysqli_num_rows($result) == 0){
    $cartEmpty= "<div class='alert alert-info mt-4'>Empty cart</div> ";
}
// $table= mysqli_fetch_array($result);
// while($userInfo =  mysqli_fetch_array($result)){
//     echo $userInfo['productName'];
// }

if(isset($_POST['remove'])){
  header("location:homeUser.php");
}

if (isset($_POST['submit'])) {
  // echo "pressed";
  $submit= "SELECT DISTINCT quantity, productName from cart where userId=$row[id]";
  $resultOfsubmit= mysqli_query($connection, $submit);
  while ($newRow = mysqli_fetch_array($resultOfsubmit)) {
    // echo "Quantity: " . $newRow['quantity'] . ", Product Name: " . $newRow['productName'] . "\n";
    // print_r($newRow);
    $decrease= "update products set quantity = quantity-$newRow[quantity] where name= '$newRow[productName]' ";
    $decreaseResult= mysqli_query($connection, $decrease);
   
  }
  $counting="SELECT SUM(quantity) AS q, COUNT(productName) AS p, sum(price) AS s FROM cart WHERE userId=$row[id]";
  $countingResult=  mysqli_query($connection, $counting);
  $countingRow = mysqli_fetch_assoc($countingResult);
  $totalQuantity = $countingRow['q'];
  $productNameCount = $countingRow['p'];
  $totalPrice = $countingRow['s'];
 $addingOrder= "INSERT INTO orders (userId, numOfPruducts, numOfitems,
   totalPrice, orderDate, orderState) VALUES ($row[id], $productNameCount, $totalQuantity,
   $totalPrice, NOW(), 'pending'  )";
   $sendingOrder=mysqli_query($connection, $addingOrder);
}

if (isset($_POST['empty'])) {
 $empty= "DELETE from cart where userId=$row[id]";
  $emptyResult= mysqli_query($connection, $empty);
  header("location:cart.php");

}
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
       html,body,
.intro {
  height: 100%;
}
    a{
        color: #F1EFEF;
    }
    i{
        color:#2E4374;
    }
    .navIcon{
        color:#F1EFEF;
    }
.gradient-custom-1 {

  background: rgb(9,61,119);
background: linear-gradient(0deg, rgba(50,61,119,1) 0%, rgba(207,223,230,1) 32%, rgba(152,180,211,1) 100%);
}

table td,
table th {
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
  border : solid 1px #2E4374;

}
tbody td {
  font-weight: 500;
  color: #999999;

}
img{
  width:100px;
  height:100px;

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
<div class="container text-center mt-3">
    <table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">image</th>
      <th scope="col">name</th>
      <th scope="col">price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Remove</th>

    </tr>
  </thead>
  <tbody>
  
    <tr <?php  $i=0; while($cartInfo =  mysqli_fetch_array($result)){
       
        $i++; ?>>
      <th scope="row"><?php echo $i;?></th>
      <td class="align-middle "><img src='<?php echo "./products/images/".$cartInfo["img"]; ?>' alt="" width="80px" height="80px" class="rounded-5"></td>
      <td class="align-middle "><?php echo $cartInfo["productName"]; ?></td>
      <td class="align-middle "><?php echo $cartInfo["price"]; ?></td>
      <td class="align-middle ">
        <div class="btn-group d-flex" role="group" aria-label="Quantity">
        <?php echo "<a href='minus.php?id=$cartInfo[id]&&pId=$cartInfo[productId]'>" ?>

          <button class="btn btn-secondary">-</button>
    </a>
          <span class="btn btn-light"><?php echo $cartInfo["quantity"]; ?></span>

          <?php echo "<a href='increase.php?id=$cartInfo[id]&&pId=$cartInfo[productId]'>" ?>
          <button  class="btn btn-secondary">+</button>
    </a>
        </div>
      </td>
      <td class="align-middle ">
        <?php echo "<a href='delFromCart.php?id=$cartInfo[id]&&pId=$cartInfo[productId]'>"?>
        <button  class="btn btn-danger mt-2">Remove</button>
    </a>
      </td>
    </tr <?php }?>>
  </tbody>
</table>

   <!-- Display total price -->
   <div class="card mt-4">
    <div class="card-body">
      <h5 class="card-title">Total Price</h5>
      <p class="card-text"><?php 
      $priceSql= "select sum(price) from cart where userId= $row[id] ";
      $price = mysqli_query($connection, $priceSql);
      $totalPrice = mysqli_fetch_row($price)[0];

if ($totalPrice) {
  echo  $totalPrice;
} else {
  echo "0";
}

      ?></p>
    </div>
  </div>

  <!-- Display "Empty cart" or item count -->
  <!-- <div class="alert alert-info mt-4">Empty cart</div> -->
  <!--  -->
  <?php
                    if(!empty($cartEmpty)){
                        echo $cartEmpty;
                    } 
                    ?> 
   <div  class="alert mt-4" style="background-color:#9e93a5 ;">
                    <!-- Button trigger modal -->
<button type="button" class="btn"  style="background-color:#2e3474 ; color:white;" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Confirm Purchaces
</button>
<br>
<br>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
        <h4 class="modal-title" id="myModalLabel">Modal Title</h4>
      </div>
      <div class="modal-body">
        <form action="cart.php" method="POST">
          Do you want to submit your order?
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>
<button type="button" class="btn"  style="background-color:#2e3474 ; color:white;" data-bs-toggle="modal" data-bs-target="#secExampleModal">
 Empty cart
</button>


<div class="modal fade" id="secExampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
        <h4 class="modal-title" id="myModalLabel">Modal Title</h4>
      </div>
      <div class="modal-body">
        <form action="cart.php" method="POST">
          Do you want to empty your cart?
          <button type="submit" name="empty" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <!-- <div class="modal-footer text-center">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
    </div>
  </div>
</div>    
</div>
                  </div>  
<?php
include_once('./assets/userFooter.php')
?>
</body>
</html>