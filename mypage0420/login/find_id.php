<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/jeh/mypage0420/db/db_connect.php";

    $name = $_POST["find_id_name"];
    $phone = $_POST["find_id_phone"];

    $sql = "select (id) from users where name='$name' AND phone = '$phone'";
    $result = mysqli_query($con, $sql);

    $num_match = mysqli_num_rows($result);

    if(!$num_match)
    {
        echo("
           <script>
             location.href = 'http://{$_SERVER["HTTP_HOST"]}/jeh/mypage0420/login/find_id_form.php';
             alert('등록되지 않은 사용자입니다!');
           </script>
         ");
        mysqli_close($con);

    }else{
      $row = mysqli_fetch_array($result);
      $id = $row["id"];
      mysqli_close($con);

      echo("
           <script>
              location.href = 'http://{$_SERVER["HTTP_HOST"]}/jeh/mypage0420/login/login_form.php';
              alert('아이디는 $id 입니다');
           </script>
         ");

    }

    


    
?>