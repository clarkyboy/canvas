<?php

    require 'connection.php';

    class User extends Database{

        public function login($username, $password){
            $sql = "SELECT * FROM user WHERE user_login_name = '$username' AND user_login_pass = '$password'";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row;
        }   
        public function register($username, $password){
            $sql = "INSERT INTO user (user_login_name, user_login_pass, user_type) 
                    VALUES ('$username', '$password', 'U')";
            $result = $this->conn->query($sql);
        }

        public function checksDuplicate($username, $password){
            $sql = "SELECT count(*) AS noofduplicate FROM user WHERE user_login_name = '$username' OR user_login_pass = '$password'";
            $result = $this->conn->query($sql);
            $row = $result->fetch_assoc();
            return $row;
        }
    }


?>