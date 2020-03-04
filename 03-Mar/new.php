<?php
include "validation.php";
?>
<html>  
<head>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
<script type="text/javascript" src="form.js"></script>  
</head>  
<body>  
<form name="add_name" id="add_name" method="post">
First Name : <input type="text" name="firstName" value="<?php if(isset($_POST['submit'])) {echo $_POST['firstName'];} ?>"><?php echo $error['firstError']; ?><br><br>
Last Name : <input type="text" name="lastName" value="<?php if(isset($_POST['submit'])) {echo $_POST['lastName'];} ?>"><?php echo $error['lastError']; ?><br><br>
Email : <?php include "email.php"; ?> <?php echo $error['emailError']; ?> <br><br>
Mobile No : <?php include "mobileNo.php"; ?><?php echo $error['mobileError']; ?><br><br>
Area Of Intrest :<?php include("areaOfIntrest.php"); ?><?php echo $error['areaOfIntrestError']; ?><br><br>
Date Of Birth : <input type="date" id="date" name="date" value="<?php if(isset($_POST['date'])) { echo $_POST['date'];} ?>"><?php echo $error['dateError']; ?><br><br>
Details Of Graduation : <?php include("detailsOfGraduation.php"); ?><?php echo $error['detailsOfGraduationError']; ?><br><br>
Blood Group : 
<?php include('bloodGroup.php'); ?><?php echo $error['bloodGroupError']; ?><br><br>
Gender : 

<input type="radio" id="gender" name="gender" value="male" <?php if(isset($_POST['gender']) and $_POST['gender'] == "male") {echo "checked";} ?>>Male
<input type="radio" id="gender" name="gender" value="female" <?php if(isset($_POST['gender']) and $_POST['gender'] == "female") {echo "checked";} ?>>Female<?php echo $error['genderError']; ?><br><br>
Profile Picture : 
<input type="file" name="profile"><br><br>
Password : <input type="password" name="password"><br><br>
<input type="submit" name="submit" id="submit" class="btn btn-info" onsubmit="validateForm();">
</form>  
</body>  
</html> 

<script> 
 

 $(document).ready(function(){  
      var i=1;   
           $('#addEmail').click(function(){  
           i++;  
           $('#email').append('<tr id="rowEmail'+i+'"><td><input type="text" id="email" name="email[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="removeEmail" id="'+i+'" class="btn btn-danger removeEmail">X</button></td></tr>');  
      });  
      $(document).on('click', '.removeEmail', function(){  
           var button_id = $(this).attr("id");   
           $('#rowEmail'+button_id+'').remove();  
      });  
       
 });  

///////////////////////////////////////////////////////////////


 $(document).ready(function(){  
      var i=1;   
           $('#addMobile').click(function(){  
           i++;  
           $('#mobileNo').append('<tr id="rowMobile'+i+'"><td><input type="text" name="mobileNo[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="removeMobile" id="'+i+'" class="btn btn-danger removeMobile">X</button></td></tr>');  
      });  
      $(document).on('click', '.removeMobile', function(){  
           var button_id = $(this).attr("id");   
           $('#rowMobile'+button_id+'').remove();  
      });  
       
 });


 </script>


