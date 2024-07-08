<?php
require_once 'conn.php';
            // chik if ther is any empty inputs
if (isset($_POST['submit'])) {
    extract($_POST);
    $error =[];
    if (empty($fname)) {
        $errors[]="first name is requeird";
    }
    if (empty($lname)) {
        $errors[]="last name is requeird";
    }
    if (empty($email)) {
        $errors[]="email is requeird";
    }
    if (empty($city)) {
        $errors[]="city is requeird";
    }
    if (empty($gender)) {
        $errors[]="gender is requeird";
    }

    
    if (empty($errors)) {
        //insert
        $query = "insert into users(`fname`,`lname`,`email`,`city`,`gender`) values('$fname','$lname','$email','$city','$gender')";
        $result = mysqli_query($conn , $query);

        if ($result == true) {
            $_SESSION['success'] = "Data created successfuly";
            header("location:create.php");
        }else{
            $_SESSION['errors'] = "error when create";
            header("location:create.php");
        }
    }else{
        $_SESSION['name']= $fname;
        $_SESSION['email']= $email;
        $_SESSION['errors']= $errors;
    }


}else{
    header("location:create.php");
}