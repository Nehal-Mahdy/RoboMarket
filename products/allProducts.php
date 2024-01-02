<?php
SESSION_start();
$name = $_SESSION['name'];
require_once('../database/config.php');
$sql = "select * from products";

$result= mysqli_query($connection, $sql);
$sqlUser = "select * from users where name= '$name'";

$currentUser= mysqli_query($connection, $sqlUser);
$row = mysqli_fetch_array($currentUser);

// $table= mysqli_fetch_array($result);
// print_r($table);

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
              <a class="nav-link mx-2 " style="color:#F1EFEF;" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2"style="color:#F1EFEF;"  href="../products/allProducts.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2" style="color:#F1EFEF;" href="../users/testingtable.php">users</a>
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
             <!-- <img src="../users/images/1696111817Screenshot 2023-09-02 005001.png" alt=""> -->
             <?php  echo "<img src='../users/images/".$row['file']."' style='width:30px; height:30px;'>"." Hello, ".$name?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item btn btn-primary" href="../index.php">Sign Out</a></li>
                
              </ul>
            </li>
          </ul>
          </ul>
        </div>
      </div>
    </nav>


<section class="intro gradient-custom-1">
  <div class="gradient-custom-1 h-100">
    <div class="mask d-flex align-items-center h-100">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 ">
            <div class="table-responsive bg-white ">
              <table class="table mb-0">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Update</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  
                  while($productInfo =  mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>".$productInfo["id"]."</td>";
                    echo "<td>".$productInfo["name"]."</td>";
                    echo "<td>".$productInfo["cat"]."</td>";
                    echo "<td>".$productInfo["quantity"]."</td>";
                    echo "<td>".$productInfo["price"]."</td>";
                    echo "<td> <img src='./images/".$productInfo["img"]."'></td>";
                    echo "<td><a href='delete.php?id=$productInfo[id]'> <i class='fa-solid fa-user-minus text-danger'></i></a> </td>";
                    echo "<td><a href='update.php?id=$productInfo[id]'> <i class='fa-solid fa-pen-to-square'></i></a> </td>";
                    echo "</tr>";

                  }

                  
                  ?>

                  <!-- <img src = "./images/1696111817Screenshot 2023-09-02 005001.png"> -->
                
                
                </tbody>
              </table>
            
            </div> 
            <div class="text-end">
             <button class ="btn mt-3"  style="background-color:grey;"><a  href="./addProduct.php" 
              style="text-decoration:none; color:white;">Add Product</a></button>
                </div>
                
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?php
include_once "../assets/footer.php";
?>
</body>
</html>