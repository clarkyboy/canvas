<?php

    require 'connection.php';

    class User extends Database{

        public function login($username, $password){
            $sql = "SELECT * FROM user WHERE user_login_name = '$username' AND user_login_pass = '$password'";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row;
        }   

    }


?>