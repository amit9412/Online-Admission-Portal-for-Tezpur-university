<?php
session_start();
require 'vendor/autoload.php'; // include Composer's autoloader
global $db;
$conn = new MongoDB\Client("mongodb://localhost:27017");
$db = $conn->Admission_portal;
    function register($document){
        global $collection;
        $collection->insert($document);
        return true;
    }
    
    function checkmail($email){
        require 'vendor/autoload.php';
        $conn = new MongoDB\Client("mongodb://localhost:27017");
$db = $conn->Admission_portal;
         $collection=$db->account;
        $temp = $collection->findOne(array('Email'=> $email));
        if(empty($temp)){
        return true;
        }
        else{
            return false;
        }
    }
    function setsession($email){
        $_SESSION["userLoggedIn"] = 1;
        global $collection;
        $temp = $collection->findOne(array('Email'=> $email));
        $_SESSION["uname"] = $temp["First Name"];
        $_SESSION["email"] = $email;
        return true;
        
    }
    function generateNumericOTP() {
        $generator = "1850462739";
        $result = "";
        for ($i = 1; $i <= 6; $i++) {
            $result .= substr($generator, (rand()%(strlen($generator))), 1);
        }
        // Return result
        return $result;
    }
    function chkLogin(){
        //var_dump($_SESSION);
        if($_SESSION["userLoggedIn"]== 1){
            return true;
        }
        else{
            return false;
        }
    }
    function removeall(){
        //session_abort();
        $_SESSION["userLoggedIn"] = 5;
        unset($_SESSION["uname"]);
        unset($_SESSION["email"]);
        return true;
    }
    function UploadFilenameGenerator($str1, $str2) {
      
        // Using Concatenation assignment
        // operator (.=)
        $str1 .=$str2;
          
        // Returning the result 
        return $str1;
    }

?>