<?php 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      $(".showHideForm").click(function(){
        $('#login').toggle();
        $('#signup').toggle();
      })


      $('#diary').bind('input propertychange',function(){
        $.ajax({
          method: "POST",
          url : "updatedatabase.php",
          data: {content: $("#diary").val()}
        })
      })
    </script>
  </body>
</html>

?>