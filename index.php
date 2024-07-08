<?php
          // read users
include "conn.php";

$query = "select * from users";

$result = mysqli_query($conn , $query);

if(mysqli_num_rows($result) > 0){
     $users = mysqli_fetch_all($result,MYSQLI_ASSOC);
     foreach ($users as $user) {
          echo $user['fname']."<br>";
          echo $user['lname']."<br>";
          echo $user['email']."<br>";
          echo $user['city']."<br>";
          echo $user['gender']."<hr>";
     }
}else{
     echo "users not found";
}