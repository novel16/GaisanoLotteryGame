<?php
session_start();
include('../connect.php');

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM `user` WHERE username = :username LIMIT 1";
    $verify_user = $conn->prepare($sql);
    $verify_user->bindparam(':username',$username);
    $verify_user->execute();

    if($verify_user->rowCount() > 0)
    {
        $fetch = $verify_user->fetch(PDO:: FETCH_ASSOC);
        $verify_pass = password_verify($password, $fetch['password']);

        if($verify_pass == 1 && $fetch['role'] == 'Admin')
        {
            $_SESSION['admin'] = $fetch['username'];
            $_SESSION['admin-success'] = 'Welcome Back!';
            header('location: home.php');
            
        }
        else
        {
            header('location: index.php');
            $_SESSION['error'] = 'Password did not match';
        }
    }
    else{
        header('location: index.php');
        $_SESSION['error'] = 'Username not found';
    }   

}
else{
    header('location: index.php');
}



?>