<?php
include_once 'includes/db.php';

function createUser(){
    global $connection;

    // if(!isset($_SESSION)){
    //     session_start();
    // }

   
            $user_username     = mysqli_real_escape_string($connection, $_POST['username']);
            $user_password     = mysqli_real_escape_string($connection, $_POST['password']);
            $user_firstname    = mysqli_real_escape_string($connection, $_POST['firstname']);
            $user_lastname     = mysqli_real_escape_string($connection, $_POST['lastname']);
            $user_email        = mysqli_real_escape_string($connection, $_POST['email']);
         
            
            $user_phone        = mysqli_real_escape_string($connection, $_POST['phone']);
         
          
            $user_role         = "User";

            $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));
            
            
            $current_date = date("Y-m-d");
            $current_time = time();
            $user_password = md5($user_password);
        
            $current_date = date("Y-m-d H:i:s");
            $update_date = date("Y-m-d H:i:s");
            $current_time = time();
            if (checkUsername($user_username)){
                $message = "The username you have entered already exists";
                    }
            else {
            $message = null;
            $query = "INSERT INTO users(username,password,firstname,lastname,email,phone,created_at,updated_at,role) ";
            $query .= "VALUES('$user_username','$user_password','$user_firstname','$user_lastname','$user_email',
                        '$user_phone','$current_date','$update_date','$user_role') " ;
                

            $create_user_query = mysqli_query($connection, $query);
       
     }
}


function checkUsername($user_username){
    global $connection;
    $query = "SELECT username FROM users WHERE username='{$user_username}'";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) > 0){
        return true;
    }
        else{
            return false;
        }
}

function checkEmail($user_email,$column = 'username'){
    global $connection;
    $query = "SELECT username FROM users WHERE ".$column."='{$user_email}'";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) > 0){
        return true;
    }
        else{
            return false;
        }
}


function loginUser(){
    if(!isset($_SESSION)){
        session_start();
    }
    global $connection;
    if (isset($_POST['username']) and !empty($_POST['password'])){
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $password = md5($password);
    $select = "SELECT id,username,password,firstname,lastname,email,phone, role FROM users WHERE username='$username'";
    
    $query = mysqli_query($connection,$select);
    $row = mysqli_num_rows($query);
    $fetch = mysqli_fetch_array($query);
    
       
    if($row == 1){
        // $username = $fetch['username'];
        // $id = $fetch['id'];
        // session_start();
        // $_SESSION['username'] = $username;
        // $_SESSION['id'] = $id;

        $user_user_id      = $fetch['id'];
        $user_username    = $fetch['username'];
        $user_password    = $fetch['password'];
        $user_firstname   = $fetch['firstname'];
        $user_lastname    = $fetch['lastname'];
        $user_email    = $fetch['email'];
        $user_phone    = $fetch['phone'];
        $user_role        = $fetch['role'];

        session_start();
        $_SESSION['id'] = $user_user_id;
        $_SESSION['username'] = $user_username;
        $_SESSION['firstname'] = $user_firstname;
        $_SESSION['lastname'] = $user_lastname;
        $_SESSION['email'] =     $user_email;
        $_SESSION['phone'] =     $user_phone;
        $_SESSION['role'] =      $user_role;
    
        header("Location: /user/dashboard.php");
    
    }
    else{
        echo "invalid email/password";
    }
   
    }
    else{
        
     }
    }
    


?>