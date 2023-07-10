<?php
session_start();
$error ="";

if(array_key_exists('logout', $_GET)){
  unset($_SESSION);
  setcookie('id', '', time() - 60*60);
  $_COOKIE['id'] = '';
} else if((array_key_exists('id',$_SESSION) AND $_SESSION['id'] ) AND array_key_exists('id',$_COOKIE) AND $_COOKIE['id']){
  header("loggedIn.php");
}

if(array_key_exists('submit', $_POST)){

    include('connection.php');

  // print_r($_POST);
  if(!$_POST['email']){
    $error .="Email Address is required!";
  }
  if(!$_POST['password']){
    $error .= "Password is required!";
  }
  if($error!=""){
    $error .= "<p>There were error(s) in your form</p>";
  }
  else{
    if(isset($_POST['signUp'])){

        $query = "SELECT id FROM `users` WHERE email='".mysqli_real_escape_string($link,$_POST['email'])."' LIMIT 1 ";
        $result = mysqli_query($link, $query);

        if(mysqli_num_rows($result)>0){
        $error = "Email address is already taken";
        }
        else{

            $query = "INSERT INTO `users` (`email`,`password`) VALUES ('".mysqli_real_escape_string($link,$_POST['email'])."','".mysqli_real_escape_string($link,$_POST['password'])."')"; 
            if(!mysqli_query($link, $query)){
            $error = "<p>Could not Sign up! Please try again.</p>";
            }
            else{
                $query = "UPDATE `users` SET password = 
                            '".md5(mysqli_insert_id($link).$_POST['password'])."'
                            WHERE id= '".mysqli_insert_id($link)."'
                            LIMIT 1
                        ";

                mysqli_query($link, $query);

                $_SESSION['id'] = mysqli_insert_id($link);
                if($_POST['stayLoggedIn'] == '1'){
                setcookie('id', mysqli_insert_id($link), time()+ 60*60*24*365);
                }

                header('Location: loggedIn.php');
            }
        }
    }else{
        $query = "SELECT * FROM `users` WHERE email='".mysqli_real_escape_string($link, $_POST['email'])."' ";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
        if(isset($row)){
          $hashedPassword = md5(md5($row['id']).$_POST['password']);
          if($hashedPassword = $row['password']){
            $_SESSION['id'] = $row['id'];
            if($_POST['stayLoggedIn'] = '1'){
              setcookie('id', mysqli_insert_id($link), time()+ 60*60*24*365);
            }
            header('Location: loggedIn.php');
          }
          else{
            $error = 'email/password combination could not be found';
          }
        }
        else{
          $error = 'email/password combination could not be found';
        }
    }
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" integrity="sha384-PJsj/BTMqILvmcej7ulplguok8ag4xFTPryRq8xevL7eBYSmpXKcbNVuy+P0RMgq" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">
    <title>Secret Diary</title>
  </head>
  <body>