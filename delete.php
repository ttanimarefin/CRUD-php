<?php 

$connection= mysqli_connect('localhost','root','','user_info');

if(!$connection){
  die("not connected".mysqli_error($connection));
}

$recv=$_REQUEST['id'];
$recv_file_name=$_REQUEST['img'];

$query="DELETE FROM user WHERE id=$recv ";

$delete_query=mysqli_query($connection,$query);


if($delete_query){
    unlink("image_folder/$recv_file_name");
    header("location:index.php?deleted");
}

?>