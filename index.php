
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
            <div class="card-header text-center"></div>
            <div class="card-body">

            <div class="card-header text-center ">Add User</div>
       
                <form action="insert.php" method="post" enctype="multipart/form-data">
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

                        <div class="form-group mb-3">
                        <label for="Upload">Image</label>
                        <input type="file"  name="upload_img" value="upload" class="btn btn-Secondary" class="form-control">
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-primary">Sign Up </button>
                        
                  </form>

            <form action="" method="post">
                        <input type="text" name="search_name" placeholder="search name">
                        <input type="submit" name="search" value="Search" class="btn btn-info">
                  
                  
                    </form>
            <?php



$connection= mysqli_connect('localhost','root','','user_info');

if(!$connection){
  die("not connected".mysqli_error($connection));
}

if(isset($_REQUEST['search'])){
  $recver_nam=$_REQUEST['search_name'];



$query=" SELECT * FROM user WHERE name LIKE '%$recver_nam%' ";
$newcon=mysqli_query($connection,$query);
$count= mysqli_num_rows($newcon);






if(isset($_REQUEST['deleted'])){
    echo "<font color='red'>Data Deleted</font>" ;
    header("location:index.php");
}
if(isset($_REQUEST['updated'])){
  echo "<font color='green'>Data updated</font>" ;
}



?>
              

                  <hr>
                  <br>


  <div class="card-header text-center">All User Details</div>
                  
                  
                   
                  
                  
    <table class="table table-hover ">
     <tr> 
     <thead>
     <th scope="col">Serial No.</th>
     <th scope="col">DB Id</th>
     <th scope="col">Image</th>
     <th scope="col">Name</th>
     <th scope="col">Email</th>
     <th scope="col">Phone</th>
     <th scope="col">Password</th>
     <th scope="col">Action</th>
   </tr>
 </thead>

<?php

$serial_number=0;

while( $row = mysqli_fetch_assoc($newcon)){

     $db_id=   $row['id'];
     
     $name=   $row['name'];
     $img=   $row['Image'];
     $email=   $row['email'];
     $phone=   $row['phone'];
     $password=   $row['password'];
     $serial_number++;


 ?>
 <tbody>
   <tr>
     
     <td><?php echo $serial_number; ?></td>
     <td><?php echo $db_id; ?></td>
     <td><img width="40px" src="image_folder/<?php echo $img; ?>" alt=""></td>
     <td><?php echo $name; ?></td>
     <td><?php echo $email; ?></td>
     <td><?php echo $phone; ?></td>
     <td><?php echo $password; ?></td>
     <td ><a class="text-decoration-none" href="single_edit.php?edit_id=<?php echo $db_id?>">Edit</a> || <a onclick="return confirm('Are You Sure?')" class="text-decoration-none" href="delete.php?id=<?php echo $db_id ?>&img=<?php echo  $img; ?>">Delete</a></td>
   </tr>
 </tbody>

<?php

}
?>

</table>
<?php




}

?>
            
            </div>
         
         
         </div>
      
      
      </div>
  





</body>
</html>





