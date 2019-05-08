<?php

require 'connection.php';

class Product extends Database{

    public function addProduct($prod_name, $prod_desc, $prod_img, $tmp_file_name, $directory){
        //this will get the file extension of the uploaded file
        $extension = pathinfo($prod_img, PATHINFO_EXTENSION);
        //apple.png
        $array_extensions = array('png', 'jpg', 'jpeg', 'gif');

        if(in_array($extension, $array_extensions)){
            // this will check if the extension is in the list of accepted file extensions
            $new_directory = $directory.$prod_img;
            if(move_uploaded_file($tmp_file_name, $new_directory)){
                $sql = "INSERT INTO product (prod_name, prod_desc, prod_img) VALUES ('$prod_name', '$prod_desc', '$new_directory')";
                $result = $this->conn->query($sql);
                return "Successfully Uploaded";
            }else{
                return $result = "Error in uploading the file";
            }
            
        }else{
            return $result = "Error! Unsupported file extension!";
        }
        
        
    }
    public function getAllProduct(){
        $sql = "SELECT * FROM product";
        $result = $this->conn->query($sql);
        $rows = array();
        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        return $rows;
    }
}


?>