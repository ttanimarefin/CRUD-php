<?php
$connection= mysqli_connect('localhost','root','','user_info');

if(!$connection){
  die("not connected".mysqli_error($connection));
}
if(isset($_REQUEST['submit'])){

    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $phone=$_REQUEST['phone'];
    $password=$_REQUEST['password'];
    $gender=$_REQUEST['gender'];
    $country=$_REQUEST['country'];
    $hidden_id=$_REQUEST['hidden_data'];

    $update_query="UPDATE user SET name='$name',email='$email',phone=' $phone',password='$password', gender='$gender', country='$country' WHERE id=$hidden_id ";
    $final_query=mysqli_query($connection,$update_query);

    if($final_query){
      header("location: index.php?updated");
    }

}

?>