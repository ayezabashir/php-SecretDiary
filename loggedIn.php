<?php

include('component/header.php');
if(array_key_exists('id',$_COOKIE)){
    $_SESSION['id']= $_COOKIE['id'];
}
if(array_key_exists('id', $_SESSION)){
    include('component/connection.php');
    $query = "SELECT diary FROM `users` WHERE id='".mysqli_real_escape_string($link, $_SESSION['id'])."' LIMIT 1 ";
    $row = mysqli_fetch_array(mysqli_query($link,$query));
    $diaryContent = $row['diary'];
}
else{
    header("Location: index.php");
}

?>

<nav class="navbar navbar-fixed-top">
    <a href="#" class="navbar-brand">Secret Diary</a>
    <div class="form-inline float-xs-right">
      <a href='index.php?logout=1'><button class="btn btn-success mx-3" type="submit">Logout</button></a>
    </div>
</nav>

<div class="container-fluid">
    <textarea class="form-control" id="diary">
        <?php echo $diaryContent; ?>
    </textarea>
</div>

<?php
include('component/footer.php');
?>