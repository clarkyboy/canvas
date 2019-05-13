<?php

    require 'user.php';

    $user = new User;
    if(isset($_POST['login'])){
        $row = $user->login($_POST['username'], md5($_POST['password']));
        if($row['user_type'] == 'A'){
            header('Location: admin.php');
        }elseif($row['user_type'] == 'U'){
            header('Location: users.php');
        }else{
            echo "User not found!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div>
            <label for="">Username</label>
            <input type="text" name="username" id="">
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name="password" id="">
        </div>
        <input type="submit" value="Login" name="login">
    </form>
</body>
</html>