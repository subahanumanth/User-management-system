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
                $this->correctDetails = $this->details['areaOfIntrest'];
            } else {
                $this->error['areaOfIntrestError']  = "*Choose Area Of Intrest";
            }

            if (!empty($this->details['date'])) {
                $this->correctDetails = $this->details['date'];
            } else {
                $this->error['dateError']  = "*Select Date";
            }

            if (!empty($this->details['detailsOfGraduation'])) {
                $this->correctDetails = $this->details['detailsOfGraduation'];
            } else {
                $this->error['detailsOfGraduationError']  = "*Enter Details Of Graduation";
            }

            if ($this->details['bloodGroup'] != "") {
                $this->correctDetails = $this->details['bloodGroup'];
            } else {
                $this->error['bloodGroupError']  = "*Select Blood Group";
            }

            if ($this->details['gender'] != "") {
                $this->correctDetails = $this->details['gender'];
            } else {
                $this->error['genderError']  = "*Select Gender";
            }
     
            if (!empty($this->details['email']) and filter_var($this->details['email'], FILTER_VALIDATE_EMAIL)) {
                $this->correctDetails['email'] = $this->details['email'];
            } else {
                $this->error["emailError"] = " *Enter Valid Email ID";
            }
 
            if (!empty($this->details['mobileNo']) and ctype_digit($this->details['mobileNo'])) {
                $this->correctDetails['mobileNo'] = $this->details['mobileNo'];
            } else {
                $this->error['mobileError']  = "*Enter Valid Mobile Number";
            }
        }
    return $this->error;
    }
}

$obj = new validate($_POST);
$error = $obj->validation();
