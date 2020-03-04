<?php

$id = $_POST['button'];
$fname = $_POST['firstName'];
$lname = $_POST['lastName'];
$email = $_POST['email'];

$bg = $_POST['bloodGroup'];
$aoi = $_POST['areaOfIntrest'];
$dog = $_POST['detailsOfGraduation'];
$mobile = $_POST['mobileNo'];
$gender = $_POST['gender'];
$dob = $_POST['date'];
$pw = $_POST['password'];

echo $dog;
echo $fname;
echo $email[0];
echo $aoi[0];
echo $mobile[0];

$connection = mysqli_connect("localhost", "root", "aspire@123", "Data");
$query = "update detail set first_name = '$fname',last_name = '$lname', date_of_birth = '$dob',details_of_graduation = '$dog',blood_group  = '$bg',gender = '$gender',password = '$pw' where id='$id'";

$queryEmail = "update email set email_id='$email[0]' where user_id = '$id'";
$queryArea = "update area_of_intrest1 set area_of_intrest = '$aoi[0]' where user_id = '$id'";
$queryMobile = "update mobile set mobile_no='$mobile[0]' where user_id = '$id'";
mysqli_query($connection, $queryEmail);
mysqli_query($connection, $queryArea);
mysqli_query($connection, $queryMobile);
mysqli_query($connection, $query);
mysqli_close($connection);
