<?php
$connection= mysqli_connect('localhost','root','','user_info');

if(!$connection){
  die("not connected".mysqli_error($connection));
}

if(isset($_REQUEST['edit_id'])){
    $edt_id=$_REQUEST['edit_id'];

    $get_info= " SELECT * FROM user WHERE id= $edt_id ";
    $update_info= mysqli_query($connection,$get_info);
    

    while($row=mysqli_fetch_array($update_info)){
    


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
              <div class="card-header text-center"></div>          
              <div class="card-body">
              
                  <form action="update_data.php" method="post">
                        <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="<?php echo $row['name'];?>" id="name" class="form-control" >
                        </div>
                        <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?php echo $row['email'];?>" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="phone" name="phone" value="<?php echo $row['phone'];?>" id="phone" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" value="<?php echo $row['password'];?>" id="password" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                        <label for="radio">Gender</label>
                        <input type="radio" name="gender" id=""  value="Male" <?php if ($row['gender'] == 'male') { echo ' selected="selected"'; } ?>>Male
                        <input type="radio" name="gender" id=""   value="Female" <?php if ($row['gender'] == 'female') { echo ' selected="selected"'; } ?>>">Female
                        </div>


                        <div class="form-group mb-3">
                        <label for="Country">Country</label>
                        <select name="country" >
                        
                              <option value="">Select your country</option>
                              <option value="Bangladesh" <?php if ($row['country'] == 'Bangladesh') { echo ' selected="selected"'; } ?>>Bangladesh</option>
                              <option value="india" <?php if ($row['country'] == 'india') { echo ' selected="selected"'; } ?>>india</option>
                              <option value="usa">usa</option>
                        </select>
                        </div>



                        <button type="submit" name="submit" class="btn btn-primary"  value="update">update </button>
                        <input type="hidden" name="hidden_data" value="<?php echo $edt_id;?>" >


                  </form>
              
            </div>          
          </div>
        </div>
 </body>
</html>
    <?php
    }
}
?>




