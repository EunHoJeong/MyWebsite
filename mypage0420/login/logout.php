<?php
  session_start();
  unset($_SESSION["user_id"]);
  unset($_SESSION["user_level"]);
  
  
  echo("
       <script>
          location.href = 'http://{$_SERVER['HTTP_HOST']}/jeh/mypage0420/index.php';
         </script>
       ");
?>