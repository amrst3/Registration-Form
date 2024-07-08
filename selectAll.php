<?php
require_once 'conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

header("Content-Type:application/json; charset-UTF-8");
$query = "select * from users";

$result = mysqli_query($conn , $query);

if (mysqli_num_rows($result)>0) {
    $users = json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));
    print_r($users);
}else{
    echo "users not found";
    http_response_code(404);
}
}else{
    echo "Wrong method";
    http_response_code(502);
}