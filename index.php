<?php

$error ="";
if(array_key_exists('submit', $_POST)){
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
}

?>

<div id=''> <?php echo $error ?></div>
<form method="post">
  <input type="email" name="email" placeholder="Email" id="" />
  <input type="password" name="password" placeholder="Password" />
  <input type="checkbox" name="stayLoggedIn" value="1" id="" />
  <input type="submit" name="submit" value="Sign Up" />
</form>
