<?php
$id= $_GET["id"];
require_once('../database/config.php');
$sql="select * from users where id =$id";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editing User Info</title>
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
<?php include_once "../assets/navbar.php" ?>

<section class="vh-140 p-5" style="background-color: #eee;">
  <div class="container justify-content-center">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11 ">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4" style="color:#2E4374;">Editing User Info</p>

                <form class="mx-1 mx-md-4" action="" method="POST" enctype="multipart/form-data" >

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" name="name"
                       class="form-control" value=<?php echo $row['name']; ?> />
                      <label class="form-label" for="form3Example1c">Name</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="form3Example3c"
                      value=<?php echo $row['email']; ?> name="email" class="form-control" />
                      <label class="form-label" for="form3Example3c">Your Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password"
                      value=<?php echo $row['pass']; ?>
                      id="form3Example4c" name="pass" class="form-control" />
                      <label class="form-label" for="form3Example4c">Password</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password"
                      value=<?php echo $row['pass']; ?>
                       id="form3Example4cd" name="confpass" class="form-control" />
                      <label class="form-label" for="form3Example4cd">Repeat your password</label>
                    </div>
                  </div>


                   <div class="d-flex flex-row align-items-center mb-4">

                  <i class="fa-solid fa-lg fa-user me-3 "></i>
                    <div class="form-outline flex-fill mb-0">
                     <select name="role" class="form-select" id="select" >
                     <option value="<?php echo $row['role']; ?>" selected><?php echo $row['role']; ?></option>
                     <option value="admin">Admin</option>
                     <option value="customer">Customer</option>
                     </select> 
                     <label for="role" for="select" class="form-label" >Role :</label>
                     </div>
                  </div>


                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-house fa-lg me-3 fa-fw"></i>
                    <!-- <i class="fa-solid fa-house" style="color: #262627;"></i> -->
                    <div class="form-outline flex-fill mb-0">
                     <select name="roomNum" class="form-select"
                       id="select" >
                     <option value=<?php echo $row['roomNum']; ?> selected><?php echo $row['roomNum']; ?></option>
                     <option value="Application 1">Application 1</option>
                     <option value="Application 2">Application 2</option>
                     <option value="Application 3">Application 3</option>
                     </select> 
                     <label for="roomNum" for="select" class="form-label" >Room No:</label>
                     </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="number" value=<?php echo $row['ext']; ?>  id="ext" name="ext" class="form-control" />
                      <label class="form-label" for="ext">Ext</label>
                    </div>
                  </div>

                  <!-- <div class="d-flex flex-row align-items-center mb-4">
                  <div class="form-outline flex-fill mb-0">
                  <input class="form-control" value=<?php echo $row['file']; ?>  type="file" name="file" id="formFile">
                  <i class="fas fa-image fa-lg me-3 fa-fw"></i>
                  <label for="formFile" class="form-label">Enter Profile Image</label>
                    </div>                         
                     </div> -->
<?php 

 if(isset($_POST["btn"])){


    $name= $_POST["name"];
    $email= $_POST["email"];
    $pass= $_POST["pass"];
    $confPass= $_POST["confpass"];
    $roomNum = $_POST["roomNum"];
    $ext = $_POST["ext"];
    $role= $_POST["role"];

     $passPattern= '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';
     $namePattern= "/^(?!.*\.\.)(?!.*\.$)[^\W][\w.]{0,29}$/";
     $emailPattern= '/^[^@]+@[^@]+\.[^@]{2,4}$/';

     $inputs = [$name, $email, $pass];

    //  echo $confPass;
     if(!str_word_count($name)==0){
        if(preg_match($namePattern,$name)){
            if(!str_word_count($email)==0){
                // if(preg_match($emailPattern,$email))
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    // echo "<br>correct email format<br>";
                    if(!str_word_count($pass) ==0){

                        // echo $pass;
                        if(preg_match($passPattern, $pass)){
                            if(!str_word_count($confPass)==0){
                                // echo $confPass;
                                if($confPass==$pass){
                                    // echo "<br>matched<br>";
                                 if(!str_word_count($roomNum)==0){
                                    // echo "<br>roomnum<br>";
                                    if($ext != 0){
                                

                                              $hash = md5($pass);
                                            

                                              $sqlUpdate= "update users set name='$name', email='$email',pass='$pass', 
                                              ext=$ext, roomNum= '$roomNum', role= '$role' where id= $id";
                   
                                         mysqli_query($connection,$sqlUpdate);
                                        //  header("location: addUser.php");


                                    }else{
                                        echo "<h6 class='text-danger'>please enter ext</h6>";
                                    }
                                 }else{
                                    echo "<h6 class='text-danger'>Please, enter room number</h6>";
                                 }

                             

                                }else{
                                    echo "<h6 class='text-danger'>Passwords don't match</h6>";
                                }
                            }else{
                            echo "<h6 class='text-danger'>Please, confirm your pass</h6>";
                            }
                        }else{
                            echo "<h6 class='text-danger'>Wrong password format</h6>";
                        }
                    }else{
                        echo "<h6 class='text-danger'>Please enter password</h6>";
                    }
                }else{
                    echo "<h6 class='text-danger'>Email is written in wrong format</h6>";
                }
            }else{
                echo "<h6 class='text-danger'>Email is required<h6>";
            }
        }else{
            echo "<h6 class='text-danger'>Name is written in wrong format</h6>";
        }
     }else{
        echo "<h6 class='text-danger'>name is required</h6>";
     }
    
     }

?>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="btn"  style="color:#F1EFEF; background-color:#2E4374;" 
                     class="btn btn-lg m-1">
                    Update</button>
                    
                  </div>
                  <div class="d-flex justify-content-center mx-4 mb-3 ms-3 mb-lg-4">
                    <button type="submit"  style="color:#F1EFEF; background-color:#2E4374;" 
                     class="btn btn-lg m-1">
                   <a href="./testingtable.php" style="text-decoration:none;"> Show all users</a></button>
                    
                  </div>
                  
                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://img.freepik.com/premium-vector/website-development-concept-illustration_584524-276.jpg?size=626&ext=jpg&ga=GA1.2.388227192.1694264810&semt=ais"
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
</body>
</html>