<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/jeh/mypage0420/db/db_connect.php";

    $id = $_POST["find_pw_id"];
    $name = $_POST["find_pw_name"];
    $phone = $_POST["find_pw_phone"];

    $sql = "select (pass) from users where id = '$id' AND name='$name' AND phone = '$phone'";
    $result = mysqli_query($con, $sql);

    $num_match = mysqli_num_rows($result);

    if(!$num_match)
    {
        echo("
           <script>
             location.href = 'http://{$_SERVER["HTTP_HOST"]}/jeh/mypage0420/login/find_pw_form.php';
             alert('등록되지 않은 사용자입니다!');
           </script>
         ");
        mysqli_close($con);

    }else{
      $row = mysqli_fetch_array($result);
      $pw = $row["pass"];
      mysqli_close($con);

      echo("
           <script>
              location.href = 'http://{$_SERVER["HTTP_HOST"]}/jeh/mypage0420/login/login_form.php';
              alert('비밀번호는 $pw 입니다');
           </script>
         ");

    }

?>