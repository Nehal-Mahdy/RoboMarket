<nav class="navbar navbar-expand-lg navbar-light p-2 gradient-custom-2" >
      <div class="container-fluid"   >
        <a class="navbar-brand" style="color:#F1EFEF;" href="#">RoboMarket</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto ">
            <li class="nav-item">
              <a class="nav-link mx-2 " style="color:#F1EFEF;" aria-current="page" href="./homeUser.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link mx-2" style="color:#F1EFEF;" href="./cart.php">cart</a>
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
             <?php  echo "<img src='./users/images/".$row['file']."' style='width:30px; height:30px;'>"." Hello, ".$name?>
            </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item btn btn-primary" href="./index.php" >Sign Out</a></li>

              </ul>
            </li>
          </ul>
          </ul>
        </div>
      </div>
    </nav>

