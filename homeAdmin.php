<?php
SESSION_start();
$name = $_SESSION['name'];
require_once('./database/config.php');
$sql = "select * from users where name= '$name'";

$result= mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result);

// echo $name."is admin";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js" integrity="sha512-X/YkDZyjTf4wyc2Vy16YGCPHwAY8rZJY+POgokZjQB2mhIRFJCckEGc6YyX9eNsPfn0PzThEuNs+uaomE5CO6A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
           .gradient-custom-2 {
/* fallback for old browsers */
background: #fccb90;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, #3a2c58, #17395e,#2E4374,#2E4374);

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, #9e93a5, #6c5d74, #6c5d74, #2E4374);
}

@media (min-width: 768px) {
.gradient-form {
height: 100vh !important;
}
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}
}
@import url('https://fonts.googleapis.com/css?family=Roboto:300');

body {
  margin: 0;
  padding: 0;
  font-family: 'Roboto', sans-serif;
}

section {
  width: 100%;
  height: 100vh;
  box-sizing: border-box;
  padding: 140px 0; 
  
}

.card {
  position: relative;
  min-width: 300px;
  height: auto;
  overflow: hidden;
  border-radius: 15px;
  margin: 0 auto;
  padding: 40px 20px;
  box-shadow: 0 10px 15px rgba(0,0,0,0.3);
  transition: .5s;
}
.card:hover {
  transform:scale(1.1);
}
.card_red, .card_red .title .fa {
  background: linear-gradient(-45deg, #478ad1,#75508b);
}
.card_violet, .card_violet .title .fa  {
  background: linear-gradient(-45deg, #75508b,#478ad1);
}
.card_three, .card_three .title .fa  {
  background: linear-gradient(-45deg, #7e58d0, #5485bb);
}

.card:before {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 40%;
  background: rgba(255, 255, 255, .1);
  z-index: 1;
  transform: skewY(-5deg) scale(1.5);
}

.title .fa {
  color: #fff;
  font-size: 60px;
  width: 100px;
  height: 100px;
  border-radius: 50%;
  text-align: center;
  line-height: 100px;
  box-shadow: 0 10px 10px rgba(0, 0, 0, .1);
}
.title h2 {
  position: relative;
  margin: 20px 0 0;
  padding: 0;
  color: #fff;
  font-size: 28px;
  z-index: 2;
}
.price {
  position: relative;
  z-index: 2;
}
.price h4 {
  margin: 0;
  padding: 20px 0;
  color: #fff;
  font-size: 60px;
}
.option {
  position: relative;
  z-index: 2;
}
.option ul {
  margin: 0;
  padding: 0;
}
.option ul li {
  margin: 0 0 10px;
  padding: 0;
  list-style: none;
  color: #fff;
  font-size: 16px;
}
.card a {
  display: block;
  position: relative;
  z-index: 2;
  background-color: #fff;
  color: #262ff;
  width: 150px;
  height: 40px;
  text-align: center;
  margin: 20px auto 0;
  line-height: 40px;
  border-radius: 40px;
  font-size: 16px;
  cursor: pointer;
  text-decoration: none;
  box-shadow: 0 5px 10px rgba(0,0,0, .1);
}
.card a:hover {
  
}
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light p-2" style="background-color:#2E4374;">
      <div class="container-fluid"   >
        <a class="navbar-brand" style="color:#F1EFEF;" href="#">RoboMarket</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto ">
            <li class="nav-item">
              <a class="nav-link mx-2 " style="color:#F1EFEF;" aria-current="page" href="./homeAdmin.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2"style="color:#F1EFEF;"  href="./products/allProducts.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2" style="color:#F1EFEF;" href="./users/testingtable.php">users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2" style="color:#F1EFEF;" href="./orders.php">orders</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link mx-2 dropdown-toggle"style="color:#F1EFEF;"  href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Company
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Blog</a></li>
                <li><a class="dropdown-item" href="#">About Us</a></li>
                <li><a class="dropdown-item" href="#">Contact us</a></li>
              </ul>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto d-none d-lg-inline-flex " >
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle"style="color:#F1EFEF;"  href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             
             <?php  echo "<img src='./users/images/".$row["file"]."' style='width:50px;'>"." Hello, ".$name?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item btn btn-primary" href="./index.php">Sign Out</a></li>

              </ul>
            </li>
          </ul>
          </ul>
        </div>
      </div>
    </nav>

<section>
  <div >
    <div class="container">
      <div class="row" style="position:relative; top: -60px;">
        <div class="col-sm-4">
          <div class="card card_red text-center">
            <div class="title">
              <i class="fa fa-paper-plane" aria-hidden="true"></i>
              <h2>Products</h2>
            </div>
            <div class="price">
              <h4><sup>$</sup>25</h4>
            </div>
            <div class="option">
              <ul>
                <li><i class="fa fa-check" aria-hidden="true"></i>10 GB Space</li>
                <li><i class="fa fa-check" aria-hidden="true"></i>3 Domain Names</li>
                <li><i class="fa fa-check" aria-hidden="true"></i>20 Emails Addresse</li>
                <li><i class="fa fa-times" aria-hidden="true"></i>Live Support</li>
                </ul>
            </div>
            <a href="./products/addProduct.php">Add product</a>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card card_violet text-center">
            <div class="title">
              <i class="fa fa-plane" aria-hidden="true"></i>
              <h2>Customers</h2>
            </div>
            <div class="price">
              <h4><sup>$</sup>25</h4>
            </div>
            <div class="option">
              <ul>
                <li><i class="fa fa-check" aria-hidden="true"></i>10 GB Space</li>
                <li><i class="fa fa-check" aria-hidden="true"></i>3 Domain Names</li>
                <li><i class="fa fa-check" aria-hidden="true"></i>20 Emails Addresse</li>
                <li><i class="fa fa-times" aria-hidden="true"></i>Live Support</li>
                </ul>
            </div>
            <a href="./users/testingtable.php">Customers</a>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card card_three text-center">
            <div class="title">
              <i class="fa fa-rocket" aria-hidden="true"></i>
              <h2>Orders</h2>
            </div>
            <div class="price">
              <h4><sup>$</sup>50</h4>
            </div>
            <div class="option">
              <ul>
                <li><i class="fa fa-check" aria-hidden="true"></i>50 GB Space</li>
                <li><i class="fa fa-check" aria-hidden="true"></i>5 Domain Names</li>
                <li><i class="fa fa-check" aria-hidden="true"></i>20 Emails Addresse</li>
                <li><i class="fa fa-times" aria-hidden="true"></i>Live Support</li>
                </ul>
            </div>
            <a href="./orders.php">Orders</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include_once('./assets/footer.php')?>
</body>
</html>