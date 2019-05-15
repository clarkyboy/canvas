<?php
    
    require 'user.php';
    $user = new User;

    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        //md5
        $password = md5($password);
        //echo $password;
        $count = $user->checksDuplicate($username, $password);
        if($count['noofduplicate'] > 0){
            echo "User already existing";
        }else{
            echo "Added successfully";
            $user->register($username, $password);
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
        <p>
            <label for="">Username</label>
            <input type="text" name="username" id="">
        </p>
        <p>
            <label for="">Password</label>
            <input type="password" name="password" id="">
        </p>
        <input type="submit" value="Register" name="register">
    </form>
</body>
</html>