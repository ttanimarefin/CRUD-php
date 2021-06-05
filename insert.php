<?php


if(isset($_POST['submit'])){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];

    $rec_file=$_FILES['upload_img'];

    $img_name=$rec_file['name'];
    $img_temp_name=$rec_file['tmp_name'];


    if(!empty( $img_name)){
            $loc="image_folder/";
            if(move_uploaded_file($img_temp_name, $loc.$img_name)){
                header("location:index.php");
            }
            else{
              echo "Your File Is Empty";
           }
    }

    $connection= mysqli_connect('localhost','root','','user_info');

if(!$connection){
  die("not connected".mysqli_error($connection));
}
    
    $query="INSERT INTO user (Image,name,email,phone,password) VALUES ('$img_name','$name','$email','$phone','$password')";
    
    
    $result= mysqli_query($connection,$query);
    
    if(!$result){
      die("Not inserted." . mysqli_error());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
        <div class="container">
        
          <div class="card">
              <div class="card-header text-center bg-primary text-colour-light">ADD USER</div>          
              <div class="card-body">
              
                  <form action="login.php" method="post">
                        <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" >
                        </div>
                        <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="phone" name="phone" id="phone" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Go </button>
                  </form>
              
            </div>          
          </div>
        </div>
</body>
</html>