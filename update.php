<?php
require_once 'conn.php';

if (isset($_POST['submit']) && isset($_GET['id'])) {
    
    $id = $_GET['id'];
    extract($_POST);

    $query = "select * from users where id = '$id'";
    $result = mysqli_query($conn , $query);

    if(mysqli_num_rows($result) == 1){
        $query = "update users set `fname` = '$fname', `lname` = '$lname', `email` = '$email', `city` = '$city', `gender` = '$gender' where id ='$id'";
        $result = mysqli_query($conn , $query);
        if ($result) {
            $_SESSION['success']= "user updated successfuly";
            header("location:index.php");
        }else{
            $_SESSION['errors'] = ["user not found"];
            header("location:index.php");
        }
    }

}else{
    header("location:index.php");
}