<?php

if(array_key_exists('id',$_COOKIE)){
    $_SESSION['id']= $_COOKIE['id'];
}
if(array_key_exists('id', $_SESSION)){
    echo "<p>Logged in! <a href='index.php?logout=1'>Log out</a> </p>";
}
else{
    header("Location: index.php");
}

?>
<?php
include('component/header.php');
?>

<div class="container-fluid">
    <textarea class="form-control"></textarea>
</div>

<?php
include('component/footer.php');
?>