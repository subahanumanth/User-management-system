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
Area Of Intrest :
<select name="areaOfIntrest[]" value="" multiple>
<option value="C" <?php if(in_array("C",$_POST['areaOfIntrest'])) {echo "selected";} ?>>C</option>
<option value="C++" <?php if(in_array("C++",$_POST['areaOfIntrest'])) {echo "selected";} ?>>C++</option>
<option value="Python" <?php if(in_array("Python",$_POST['areaOfIntrest'])) {echo "selected";} ?>>Python</option>
<option value="PHP" <?php if(in_array("PHP",$_POST['areaOfIntrest'])) {echo "selected";} ?>>PHP</option>
<option value="Java" <?php if(in_array("Java",$_POST['areaOfIntrest'])) {echo "selected";} ?>>Java</option>
</select><?php echo $error['areaOfIntrestError']; ?><br><br>
Date Of Birth : <input type="date" name="date" value="<?php if(isset($_POST['date'])) { echo $_POST['date'];} ?>"><?php echo $error['dateError']; ?><br><br>
Details Of Graduation : <input type="text" name="detailsOfGraduation" value="<?php if(isset($_POST['submit'])) {echo $_POST['detailsOfGraduation'];} ?>"><?php echo $error['detailsOfGraduationError']; ?><br><br>
Blood Group : 
<select name="bloodGroup">
<option value="">select</option>
<option value="B+ve"  <?php if(isset($_POST['bloodGroup']) and $_POST['bloodGroup'] == "B+ve") {echo "selected";} ?>>B+ve</option>
<option value="A+ve" <?php if(isset($_POST['bloodGroup']) and $_POST['bloodGroup'] == "A+ve") {echo "selected";} ?>>A+ve</option>
<option value="AB+ve" <?php if(isset($_POST['bloodGroup']) and $_POST['bloodGroup'] == "AB+ve") {echo "selected";} ?>>AB+ve</option>
<option value="AB-ve" <?php if(isset($_POST['bloodGroup']) and $_POST['bloodGroup'] == "AB-ve") {echo "selected";} ?>>AB-ve</option>
<option value="O+ve" <?php if(isset($_POST['bloodGroup']) and $_POST['bloodGroup'] == "O+ve") {echo "selected";} ?>>O+ve</option>
</select><?php echo $error['bloodGroupError']; ?><br><br>
Gender : 
<select name="gender">
<option value="">select</option>
<option value="male" <?php if(isset($_POST['gender']) and $_POST['gender'] == "male") {echo "selected";} ?>>Male</option>
<option value="female"  <?php if(isset($_POST['gender']) and $_POST['gender'] == "female") {echo "selected";} ?>>Female</option>
</select><?php echo $error['genderError']; ?><br><br>
Profile Picture : 
<input type="file" name="profile"><br><br>
<input type="submit" name="submit" id="submit" class="btn btn-info">
</form>  
</body>  
</html> 

<script> 
 
 $(document).ready(function(){  
      var i=1;   
           $('#addEmail').click(function(){  
           i++;  
           $('#email').append('<tr id="rowEmail'+i+'"><td><input type="text" name="email[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="removeEmail" id="'+i+'" class="btn btn-danger removeEmail">X</button></td></tr>');  
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
