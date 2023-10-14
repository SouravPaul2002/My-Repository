<?php
include "connect.php";

if(isset($_POST['register'])){
  $name= $_POST['name'];
  $number= $_POST['number'];
  $address= $_POST['address'];
  $email= $_POST['email'];
  $password= $_POST['password'];

  $last_3_dig_cont = substr($number,-3);
    $random_dig = rand(1,999);
    $digit = "";
    if($random_dig>=1 && $random_dig<=9)
    {
      $digit = "00"."$random_dig";
    }
    else if($random_dig>=10 && $random_dig<=99)
    {
      $digit = "0"."$random_dig";
    }
    else
    {
      $digit = "$random_dig";
    }

    $emp_id = "EMP"."$digit"."$last_3_dig_cont";


  $sql="INSERT INTO `employee` (`id`,`name`,`number`,`address`,`email`,`password`) VALUES('$emp_id','$name','$number','$address','$email','$password')";
  $result= mysqli_query($conn,$sql);
  if($result){
    header("location: home.php");
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        form{
            width: 500px;
            position: relative;
            margin-top: 100px;
            margin-left: 30%;
            font-size: 2rem;
            font-weight: 500;
            font-family: 'Courier New', Courier, monospace;
            /* background-color: rgb(230, 238, 241); */
        }
        .btn-primary{
            background-color: rgba(97, 229, 150, 0.84);
            border: none;
            border-radius: 10px;
            
            
        }
        .btn-primary:hover{
            background-color: rgba(97, 229, 150, 0.84);
        }
    </style>
</head>
<body>
    <form method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="name" class="form-control" name="name" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Contact number</label>
            <input type="number" class="form-control" name="number" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" class="form-control" name="address" required>
          </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" name="email" required>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" name="password" required>
        </div>
        <button type="submit" name="register" class="btn-primary">submit</button>
      </form>
</body>
</html>