<?php
require_once './database/config.php';
SESSION_start();
if(isset($_POST['btn'])){
    $name= $_POST["userName"];
    $pass= $_POST["pass"];

    if(!empty($name)){
        if(!empty($pass)){
            $sql= "select * from users where name='$name'";
            $result= mysqli_query($connection, $sql);
            if(mysqli_num_rows($result) != 0){
            $userInfo =   mysqli_fetch_assoc($result);
            $nameDB=$userInfo['name'];
            $passDB=$userInfo['pass'];
            $roleDB=$userInfo['role'];
            if(md5($pass)== $passDB){
                
                $_SESSION['name'] = $nameDB;
                // print_r($_SESSION['name']);
                if($roleDB != 'admin'){
                    header("location:homeUser.php");
                }else{
                    header("location:homeAdmin.php");

                }
            }else{
                $invalidPass = "<h6 class='text-danger' style='font-size:15px'> Invalid Password</h6>";

            }

        }else{
            $invalidName = "<h6 class='text-danger' style='font-size:15px'> Invalid User Name</h6>";

        }
        }else{
            $errPass="<h6 class='text-danger' style='font-size:15px'> please, Enter Password</h6>";

        }
    }else{
        $errName="<h6 class='text-danger' style='font-size:15px'> please, Enter User Name</h6>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn</title>
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
    /* body{
        color:#3a2c58;
    } */
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
          <ul class="navbar-nav ms-auto text-center ">
            <li class="nav-item" style="font-weight:bold; color:white;">
             The market of your Dreams
            </li>
          </ul>
          <ul class="navbar-nav ms-auto d-none d-lg-inline-flex">
            <li class="nav-item mx-2">
              <a class="nav-link text-dark h5" href="" target="blank"><i class="fab navIcon fa-google-plus-square"></i></a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link text-dark h5" href="" target="blank"><i class="fab navIcon fa-twitter"></i></a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link text-dark h5" href="" target="blank"><i class="fab navIcon fa-facebook-square"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container mb-5 py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100 mb-3">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="./robot.png"
                    class="w-25" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1" style="color:#402b6e; font-weight:bold">We are RoboMarket</h4>
                </div>
                <form method="POST" >
                  <p style="color:#402b6e; font-weight:bold">Please login to your account</p>

                  <div class="form-outline mb-4">
                  
                      <input type="text" id="form2Example11" name="userName" class="form-control"
                      placeholder="User Name" />
                 
                    <label class="form-label" for="form2Example11" style="color:#402b6e; font-weight:bold">Username</label>
                    <?php
                    if(!empty($errName)){
                        echo $errName;
                    } 
                    ?> 
                  
                    </div>
                   
                  <div class="form-outline mb-4">
                    <input type="password" name="pass" id="form2Example22" class="form-control" />
                    <label class="form-label" for="form2Example22" style="color:#402b6e; font-weight:bold">Password</label>
                 
                    <?php
                    if(!empty($errPass)){
                        echo $errPass;
                    } 
                    ?> 
                </div>
                 
                  
                <?php
                    if(!empty($invalidName)){
                        echo $invalidName;
                    } 
                    ?> 
                 <?php
                    if(!empty($invalidPass)){
                        echo $invalidPass;
                    } 
                    ?> 


                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary w-25 gradient-custom-2 mb-3"
                     type="submit"
                     style="" name="btn">Log
                      in</button>
                    </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2" style="color:#402b6e;">Don't have an account?</p>
                    <a href="./createAccount.php" style="color:#402b6e;">Create new</a>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">We are more than just a company</h4>
                <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                  exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include_once "./assets/footer.php"; 
?>
</body>
</html>