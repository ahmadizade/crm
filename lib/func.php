<?php
require "../php/mysql.php";
// Variable to check
//$email = "john.doe@example.com";          //مثال

// FILTER_VALIDATE_EMAIL
function email_validate($email){
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        $email_validate_status = true;
    }else{
        echo " Wrong email address ";
// stop execution or ask to re-submit
    }
}


