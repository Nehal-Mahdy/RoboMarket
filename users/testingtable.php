<?php
require_once('../database/config.php');
$sql = "select * from users";

$result= mysqli_query($connection, $sql);
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
background: linear-gradient(0deg, rgba(9,61,119,1) 0%, rgba(207,223,230,1) 32%, rgba(152,180,211,1) 100%);
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
<?php include_once "../assets/navbar.php" ?>

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
                    <th scope="col">Email</th>
                    <th scope="col">Room Num</th>
                    <th scope="col">Ext</th>
                    <th scope="col">Role</th>
                    <th scope="col">Image</th>
                    <th scope="col">Delete User</th>
                    <th scope="col">Update User</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  
                  while($userInfo =  mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>".$userInfo["id"]."</td>";
                    echo "<td>".$userInfo["name"]."</td>";
                    echo "<td>".$userInfo["email"]."</td>";
                    echo "<td>".$userInfo["roomNum"]."</td>";
                    echo "<td>".$userInfo["ext"]."</td>";
                    echo "<td>".$userInfo["role"]."</td>";
                    echo "<td> <img src='./images/".$userInfo["file"]."'></td>";
                    echo "<td><a href='delete.php?id=$userInfo[id]'> <i class='fa-solid fa-user-minus text-danger'></i></a> </td>";
                    echo "<td><a href='update.php?id=$userInfo[id]'> <i class='fa-solid fa-pen-to-square'></i></a> </td>";
                    echo "</tr>";

                  }

                  
                  ?>

                  <!-- <img src = "./images/1696111817Screenshot 2023-09-02 005001.png"> -->
                
                
                </tbody>
              </table>
            
            </div> 
            <div class="text-end">
             <button class ="btn mt-3"  style="background-color:grey;"><a  href="./addUser.php" 
              style="text-decoration:none; color:white;">Add User</a></button>
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