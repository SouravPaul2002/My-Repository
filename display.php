<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>display</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">number</th>
            <th scope="col">address</th>
            <th scope="col">email</th>
            <th scope="col">password</th>
          </tr>
        </thead>
        <?php
        $sql="SELECT * FROM `employee`";
        $result=mysqli_query($conn,$sql);
        if($result){
          while($row=mysqli_fetch_assoc($result)){
              $id=$row['id'];
              $name=$row['name'];
              $number=$row['number'];
              $address=$row['address'];
              $email=$row['email'];
              $password=$row['password'];


              echo"<tbody>
              <tr>
                <td scope='row'>$id</td>
                <td>$name</td>
                <td>$number</td>
                <td>$address</td>
                <td>$email</td>
                <td>$password</td>
              </tr>
            </tbody>";
          }
      }
        ?>
    </table>
    <button class="btn btn-primary"><a href="home.php" class="text-light">go to Homepage</a></button>
</html>