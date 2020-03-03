<?php
 $connection = mysqli_connect("localhost", "root", "aspire@123", "Data");
 $query = "select *from detail";
 $row = mysqli_query($connection, $query);
 $a=0;
 if(mysqli_num_rows($row)>0) {
     while($rows = mysqli_fetch_assoc($row)) {
         if($_POST['name'] == $rows['first_name'] and $_POST['password'] == $rows['password']) {
              $a = 1;
              $id = $rows['id'];
         }
     }
 }
if($a==1) {
     $extractquery = "select *from detail where id='$id'";
     $extractEmail = "select email_id from email where user_id='$id'";
     $extractmobile = "select mobile_no from mobile where user_id='$id'"; 
     $extractAreaOfIntrest = "select area_of_intrest from area_of_intrest where user_id='$id'"; 
     $rowEmail = mysqli_query($connection, $extractEmail);
     $rowMobile = mysqli_query($connection, $extractmobile);
     $rowAreaOfIntrest = mysqli_query($connection, $extractAreaOfIntrest);
     $row = mysqli_query($connection, $query);

     $emailArray = [];
     if(mysqli_num_rows($rowEmail)>0) {
         while($rowsEmail = mysqli_fetch_assoc($rowEmail)) {
             array_push($emailArray, $rowsEmail['email_id']);
         }
     }
     $email = implode(',',$emailArray);
  
     $mobileArray = [];
     if(mysqli_num_rows($rowMobile)>0) {
         while($rowsMobile = mysqli_fetch_assoc($rowMobile)) {
             array_push($mobileArray, $rowsMobile['mobile_no']);
         }
     }
     $mobile = implode(',',$mobileArray);
     
     $areaOfIntrestArray = [];
     if(mysqli_num_rows($rowAreaOfIntrest)>0) {
         while($rowsAreaOfIntrest = mysqli_fetch_assoc($rowAreaOfIntrest)) {
             array_push($areaOfIntrestArray, $rowsAreaOfIntrest['area_of_intrest']);
         }
     }
     $areaOfIntrest = implode(',',$areaOfIntrestArray);

     echo "<table id='customers' border='1'  style='border-collapse: collapse;'>";
     if(mysqli_num_rows($row)>0) {
         while($rows = mysqli_fetch_assoc($row)) {
          ?>
             <tr><td><?php echo $rows['first_name'] ?></td><td><?php echo $rows['last_name'] ?></td><td><?php echo $rows['date_of_birth'] ?></td><td><?php echo $rows['details_of_graduation'] ?></td><td><?php echo $rows['blood_group'] ?></td><td><?php echo $rows['gender'] ?></td><td><?php echo $rows['profile_picture'] ?></td><td><?php echo $email ?></td><td><?php echo $mobile ?></td></td><td><?php echo $areaOfIntrest ?></td><td><a href='update.php?id=<?php echo $id; ?>'>Update</a></td></tr>;
         <?php
         echo "</table>";
         }
     }
} else {
    echo "user name not exist";
}
mysqli_close($connection);
