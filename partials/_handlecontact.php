<?php
include '_dbconnect.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
$name=$_POST['name'];
$mobileno=$_POST['mobileno'];
$email=$_POST['email'];
$message=$_POST['message'];

$sql="INSERT INTO `contact` (`name`, `mobileno`, `email`, `message`, `contact_time`) VALUES ('$name', '$mobileno', '$email', '$message', current_timestamp())";
$result=mysqli_query($conn,$sql);
header('location:../contact.php?formfill=true');
}

?>