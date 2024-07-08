<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- styling -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="radio"] {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <?php
         require_once 'errors.php';
         require_once 'conn.php';

        //get user
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "select * from users where id = '$id'";
            $result = mysqli_query($conn , $query);

            if (mysqli_num_rows($result) == 1) {
                $user = mysqli_fetch_assoc($result);
            }else{
                // $_SESSION['errors']=["usernot found"];
                $msg = "user not found";
            }
        }else{
            header("location:index.php");
        }

    ?>
    <?php
        if (!empty($user)) {
    ?>
    <div class="container">
        <h2>Registration Form</h2>
        <form action="deleteHandel.php" method="post">
            <input type="text" id="id" hidden name="id" value="<?php echo $user['id'] ?>" >
        
            <label for="firstName">First Name:</label>
            <input type="text" id="fname" name="fname" value="<?php echo $user['fname'] ?>" required>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lname" name="lname" value="<?php echo $user['lname'] ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email'] ?>" required>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" value="<?php echo $user['city'] ?>" required>

            <label>Gender:</label>
            <input type="radio" id="male" name="gender" value="male" checked>
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label>

            <button type="submit" name=submit class="btn btn-primary">Delete</button>
        </form>
    </div>
    <?php }else { echo $msg; } ?>
</body>
</html>
