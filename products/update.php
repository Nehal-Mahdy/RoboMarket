<?php
SESSION_start();
$name = $_SESSION['name'];

$productId= $_GET["id"];
include_once("../database/config.php");
$sql="select * from products where id =$productId";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result);

$sqlUser = "select * from users where name= '$name'";

$currentUser= mysqli_query($connection, $sqlUser);
$user = mysqli_fetch_array($currentUser);
if(isset($_POST['btn'])){
    $name= $_POST["name"];
    $cat= $_POST["cat"];
    $quantity= $_POST["quantity"];
    $price= $_POST["price"];

    // $stock=$_POST["stock"];
    // $fileName = $_FILES["file"]["name"]; 
    // $fileType = $_FILES["file"]["type"];
    // $fileSize = $_FILES["file"]["size"];
    // $filePath = $_FILES["file"]["tmp_name"];

    // $fileArray = explode(".", $fileName); 
    // $lastElementExt = end($fileArray);
    // $arrFile = ["png", "jpg", "gif", "svg","jpeg"];
    if(!str_word_count($name)==0){
        if(!str_word_count($cat)==0){
            if($quantity !=0 ){
              if($price !=0 ){

                
                $sqlUpdate= "update products set name='$name', cat='$cat',quantity=$quantity, 
                price=$price where id= $productId";

                 mysqli_query($connection,$sqlUpdate);
                    // if (in_array(strtolower($lastElementExt), $arrFile) ){
                    //       $fileNewName= time().$fileName;
                    //       $myImgFolder = "./images/".$fileNewName;
                    //       move_uploaded_file( $filePath,$myImgFolder);
                    //       $sql= "insert into products (name, cat, quantity, img) VALUES ('$name','$cat', $quantity,'$fileNewName')";
                    //       mysqli_query($connection, $sql); 
                    //       header("location:allProducts.php");

                    // }else{
                    //     $imgErr="<h6 class='text-danger'>Please, Enter valid Image</h6>";
                    // }


                    header("location: allProducts.php");
                    }else{
                      $priceErr="<h6 class='text-danger'>Please, Enter Product's price</h6>";

                    }

            }else{
                $quantityErr="<h6 class='text-danger'>Please, Enter Product's quantity</h6>";

            }

        }else{
            $catErr="<h6 class='text-danger'>Please, Enter Product's cateogry</h6>";

        }

    }else{
        
        $nameErr="<h6 class='text-danger'>Please, Enter Product's name</h6>";
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-b2QcS5SsA8tZodcDtGRELiGv5SaKSk1vDHDaQRda0htPYWZ6046lr3kJ5bAAQdpV2mmA/4v0wQF9MyU6/pDIAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js" integrity="sha512-X/YkDZyjTf4wyc2Vy16YGCPHwAY8rZJY+POgokZjQB2mhIRFJCckEGc6YyX9eNsPfn0PzThEuNs+uaomE5CO6A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    a{
        color: #F1EFEF;
    }
    i{
        color:#2E4374;
    }
    .navIcon{
        color:#F1EFEF;
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
              <a class="nav-link mx-2 " style="color:#F1EFEF;" aria-current="page" href="../homeAdmin.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2"style="color:#F1EFEF;"  href="../products/allProducts.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2" style="color:#F1EFEF;" href="../users/testingtable.php">users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2" style="color:#F1EFEF;" href="orders.php">orders</a>
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
             <?php  echo "<img src='../users/images/".$user['file']."' style='width:30px; height:30px;'>"." Hello, ".$name?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Blog</a></li>
                <li><a class="dropdown-item" href="#">About Us</a></li>
                <li><a class="dropdown-item" href="#">Contact us</a></li>
              </ul>
            </li>
          </ul>
          </ul>
        </div>
      </div>
    </nav>
<section class="vh-140 p-5" style="background-color: #eee;">
  <div class="container justify-content-center">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11 ">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4" style="color:#2E4374;">Update Product</p>

                <form class="mx-1 mx-md-4" action="" method="POST" enctype="multipart/form-data" >

                  <div class="d-flex flex-row align-items-center mb-4">
                  <i class="fa-solid  fa-lg me-3 fa-pizza-slice"></i>
                      <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" value=<?php echo $row['name']; ?>  name="name" class="form-control" />
                      <label class="form-label" for="form3Example1c">Product Name</label>
                      <?php
                    if(!empty($nameErr)){
                        echo $nameErr;
                    } 
                    ?> 
                  
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                  <i class="fa-solid fa-lg me-3 fa-clipboard"></i>
                  <!-- <i class="fa-solid fa-house" style="color: #262627;"></i> -->
                    <div class="form-outline flex-fill mb-0">
                     <select name="cat" class="form-select" id="select" >
                     <option value=<?php echo $row['cat']; ?>  selected> <?php echo $row['cat']; ?> </option>
                     <option value="food">Food</option>
                     <option value="drinks">Drinks</option>
                     <option value="ice">Ice Cream</option>
                     <option value="chocolate">Chocolate</option>
                     </select> 
                     <label for="cat" for="select" class="form-label" >Category</label>
                     <?php
                     if(!empty($catErr)){
                        echo $catErr;
                    } 
                    ?> 
                     </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa-solid fa-lg me-3 fa-arrow-up-9-1"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="number" id="form3Example3c" value=<?php echo $row['quantity']; ?> 
                       name="quantity" class="form-control" />
                      <label class="form-label" for="form3Example3c">Quantity</label>
                      <?php
                      if(!empty($quantityErr)){
                        echo $quantityErr;
                    } 
                    ?> 
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa-solid  fa-lg me-3 fa-money-bill-wave"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="number" id="form3Example3c" value=<?php echo $row['price']; ?> 
                       name="price" class="form-control" />
                      <label class="form-label" for="form3Example3c">Price</label>
                      <?php
                      if(!empty($priceErr)){
                        echo $priceErr;
                    } 
                    ?> 
                    </div>
                  </div>

              

                     <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="btn"  style="color:#F1EFEF; background-color:#2E4374;" 
                     class="btn btn-lg m-1">
                    Update</button>
                    
                  </div>

                  
                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://cdn-icons-png.flaticon.com/512/6170/6170728.png"
                  class="img-fluid" alt="Sample image">

              </div>
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