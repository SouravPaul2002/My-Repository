<?php
include "connect.php";
session_start();
?>
<?php
if(isset($_POST['submit'])){
    $email= $_POST['email'];
    $password= $_POST['password'];

    $sql= "SELECT * FROM `employee` WHERE email='$email'";
    $result= mysqli_query($conn,$sql);

    if($result && $result-> num_rows==1){
        $row=mysqli_fetch_assoc($result);
        $storedpassword= $row['password'];

        if($password===$storedpassword){
            $_SESSION['isloggedin']=1;
            header("location: home.php");
        }else{
            echo "<script>alert('Wrong password!!')</script>";
        }
    }
    else{
        $_SESSION['is_logged_in'] = 0;
        echo "<script>alert('email already exsist!!')</script>";
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
            margin-top: 200px;
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
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" name="email" required>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" name="password" required>
        </div>
        <button type="submit" name="submit" class="btn-primary">Submit</button>
      </form>
</body>
</html>