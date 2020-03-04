<?php

class validate {
    public $details;
    public $error;
    public $correctDetails;
    public function __construct ($values) {
        $this->details = $values;
    }
    public function validation() {
        if (isset($this->details['submit'])) {
            if (!empty($this->details['firstName']) and preg_match("/^[a-zA-Z ]*$/", $this->details['firstName']) and strlen($this->details['firstName'])>3  and strlen($this->details['firstName'])<10 and ctype_alpha($this->details['firstName'])) {
                $this->correctDetails['firstName'] = $this->details['firstName'];
            } else {
                $this->error["firstError"] = " *Enter Valid First Name";
            } 
            
            if (!empty($this->details['lastName']) and preg_match("/^[a-zA-Z ]*$/", $this->details['lastName']) and strlen($this->details['lastName'])>3  and strlen($this->details['lastName'])<10 and ctype_alpha($this->details['lastName'])) {
                $this->correctDetails['lastName'] = $this->details['lastName'];
            } else {
                $this->error["lastError"] = " *Enter Valid Last Name";
            }

            if (!empty($this->details['areaOfIntrest'])) {
                $this->correctDetails['areaOfIntrest'] = $this->details['areaOfIntrest'];
            } else {
                $this->error['areaOfIntrestError']  = "*Choose Area Of Intrest";
            }

            if (!empty($this->details['date'])) {
                $this->correctDetails['date'] = $this->details['date'];
            } else {
                $this->error['dateError']  = "*Select Date";
            }

            if (!empty($this->details['detailsOfGraduation'])) {
                $this->correctDetails['detailsOfGraduation'] = $this->details['detailsOfGraduation'];
            } else {
                $this->error['detailsOfGraduationError']  = "*Enter Details Of Graduation";
            }

            if ($this->details['bloodGroup'] != "") {
                $this->correctDetails['bloodGroup'] = $this->details['bloodGroup'];
            } else {
                $this->error['bloodGroupError']  = "*Select Blood Group";
            }

            if ($this->details['gender'] != "") {
                $this->correctDetails['gender'] = $this->details['gender'];
            } else {
                $this->error['genderError']  = "*Select Gender";
            }

            for ($this->i=0; $this->i<count($this->details['email']); $this->i++) {
                if (!empty($this->details['email'][$this->i]) and filter_var($this->details['email'][$this->i], FILTER_VALIDATE_EMAIL)) {
                    $this->correctDetails['email'][$this->i] = $this->details['email'][$this->i];
                } else {
                    $this->error["emailError"] = " *Enter Valid Email ID";
                }
            }

            for ($this->i=0; $this->i<count($this->details['mobileNo']); $this->i++) {
                if (!empty($this->details['mobileNo'][$this->i]) and ctype_digit($this->details['mobileNo'][$this->i])) {
                    $this->correctDetails['mobileNo'][$this->i] = $this->details['mobileNo'][$this->i];
                } else {
                    $this->error['mobileError']  = "*Enter Valid Mobile Number";
                }  
            }
            if($this->error["firstError"] == "" and $this->error["lastError"] == "" and $this->error['areaOfIntrestError'] == "" and $this->error['dateError'] == "" and $this->error['detailsOfGraduationError'] == "" and $this->error['bloodGroupError'] == "" and $this->error['genderError'] == ""  and $this->error["emailError"] == ""  and $this->error['mobileError'] == "") {
                print_r($this->correctDetails);
                $this->display();
            }
        }
    return $this->error;
    }
  
    public function display() {
        echo "coming";
        $firstName = $this->correctDetails['firstName'];
        $lastName = $this->correctDetails['lastName'];
        $areaOfIntrest = $this->correctDetails['areaOfIntrest'];
        $date = $this->correctDetails['date']; 
        $detailsOfGraduation = $this->correctDetails['detailsOfGraduation'];
        $bloodGroup = $this->correctDetails['bloodGroup']; 
        $gender = $this->correctDetails['gender']; 
        $password = $this->details['password'];

        $connection = mysqli_connect("localhost", "root", "aspire@123", "Data");
        $insertQuery = "insert into detail (first_name, last_name, date_of_birth, details_of_graduation, blood_group, gender, profile_picture, password) values('$firstName','$lastName','$date', '$detailsOfGraduation','$bloodGroup','$gender','1','$password')";
        if(mysqli_query($connection, $insertQuery)) {
             echo "inserted";
             $extractQuery = "select id from detail order by id desc limit 1;";
             $rows = mysqli_query($connection, $extractQuery);
             while($row = mysqli_fetch_assoc($rows)) {
                 $id = $row['id'];
             }
             for($i = 0; $i<count($this->correctDetails['email']); $i++) {
                 $email = $this->correctDetails['email'][$i];
                 $emailQuery = "insert into email (user_id, email_id) values('$id', '$email')";
                 mysqli_query($connection, $emailQuery);
             }
             for($i = 0; $i<count($this->correctDetails['mobileNo']); $i++) {
                 $mobileNo = $this->correctDetails['mobileNo'][$i];
                 $mobileNoQuery = "insert into mobile (user_id, mobile_no) values('$id', '$mobileNo')";
                 mysqli_query($connection, $mobileNoQuery);
             }
             for($i = 0; $i<count($this->correctDetails['areaOfIntrest']); $i++) {
                 $areaOfIntrest = $this->correctDetails['areaOfIntrest'][$i];
                 $areaOfIntrestQuery = "insert into  area_of_intrest1 (user_id,  area_of_intrest) values('$id', '$areaOfIntrest')";
                 mysqli_query($connection, $areaOfIntrestQuery);
             }
        }
        mysqli_close($connection);
    }
}

$obj = new validate($_POST);
$error = $obj->validation();

