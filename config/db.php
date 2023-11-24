<?php 
$conn = mysqli_connect('localhost' ,'lena', 'lena', 'american_school');
if(!$conn){
  echo 'Error'. mysqli_connect_error();
}
?>