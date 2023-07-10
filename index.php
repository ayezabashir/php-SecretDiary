<?php

$error ="";

if(array_key_exists('submit', $_POST)){

  $link = mysqli_connect("localhost","root","","secret_diary");

  if(mysqli_connect_error()){
    die('There is problem in your connection or database');
  }

  // print_r($_POST);
  if(!$_POST['email']){
    $error .="Email Address is required!";
  }
  if(!$_POST['password']){
    $error .= "Password is required!";
  }
  if($error!=""){
    $error = "<p>There were error(s) in your form</p>";
  }
  else{
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
        echo "Signed up successfully!";
      }
    }
  }
}

?>

<div id=''> <?php echo $error ?></div>
<form method="post">
  <input type="email" name="email" placeholder="Email" id="" />
  <input type="password" name="password" placeholder="Password" />
  <input type="checkbox" name="stayLoggedIn" value="1" id="" />
  <input type="submit" name="submit" value="Sign Up" />
</form>
