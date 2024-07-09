<?php
    include "Database.php";



class User extends Database{

    public function store($request){
        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $username = $request['username'];
        $password = $request['password'];

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(`first_name`, `last_name`, `username`, `password`) VALUES ('$firstname','$lastname','$username','$password')";

        if($this->conn->query($sql)){
            header("location:../views");
            exit;
        }else{
            die("error in creating the user". $this->conn->error);
        }
    }

    public function login($request){
        $username = $request["username"];
        $password = $request["password"];


        $sql = "SELECT * FROM `users` WHERE username = '$username'";

        if($result = $this->conn->query($sql)){
            if($result->num_rows == 1){
                $user = $result->fetch_assoc();
                if(password_verify($password, $user["password"])){
                    session_start();
                    $_SESSION["id"] = $user["id"];
                    $_SESSION["username"] = $user["username"];
                    $_SESSION["password"] = $user["password"];
                    $_SESSION["fullname"] = $user["first_name"]." ".$user["last_name"];
                    header("location:../views/dashboard.php");
                    exit;

                }else{
                    echo"password is misstaken";
                }
            }else{
                echo"username not exist or more";
            }
        }else{
            die("table is error");
        }
    }

    public function getAllUsers(){
        $sql = "SELECT * FROM users";

        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("Error in retrieving all users: ". $this->conn->error);
        }

    }

    public function getUser(){   
        $id = $_SESSION["id"];
        $sql = "SELECT * FROM users WHERE id = $id";

        if($result = $this->conn->query($sql)){
            return $result->fetch_assoc();
        }else{
            die("Error in retrieving the user: ". $this->conn->error);
        }

    }

    public function update($request,$files){
        session_start();
        $id = $_SESSION["id"];
        $firstname = $request["firstname"];
        $lastname = $request["lastname"];
        $username = $request["username"];

        $photo    = $files['photo']['name'];
        $photo_tmp    = $files['photo']['tmp_name'];


        $sql = "UPDATE users SET `first_name`='$firstname',
        `last_name`='$lastname',
        `username`='$username'
        WHERE id = '$id'
        ";

        if($this->conn->query($sql)){
            $_SESSION['username'] = $username;
            $_SESSION['fullname'] = $firstname." ".$lastname;

            if($photo){
                $sql = "UPDATE users SET photo = '$photo' WHERE id = $id";
                $destination = "../assets/images/$photo";

                if($this->conn->query($sql)){
                    if(move_uploaded_file($photo_tmp, $destination)){
                        header("location:../views/dashboard.php");
                        exit;

                    }else{
                        die("Error in moving the photo.");
                    }
                }else{
                    die("Error in updaiting the image". $this->conn->error);
                }
            }

            
        }else{
            die("Error in updating profile". $this->conn->error);
        }

    }

    public function delete(){
        session_start();
        $id = $_SESSION["id"];

        $sql ="DELETE FROM users WHERE id = '$id'" ;
        if($this->conn->query($sql)){
            #DESTROY SESSION
            $this->logout();


        }else{
            die("Error in deleting the user : ". $this->conn->error);
        }
    }

    public function logout(){
        session_start();

        session_unset();
        session_destroy();
    
        header("location:../views/");
        exit;

    }
}



?>