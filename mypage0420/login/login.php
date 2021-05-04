<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/jeh/mypage0420/db/db_connect.php";
    
    $id   = $_POST["login_id"];
    $pass = $_POST["login_password"];

    $sql = "select (id), (pass), (level), (nicname) from users where id='$id'";
    $result = mysqli_query($con, $sql);

    $num_match = mysqli_num_rows($result);
    

    if(!$num_match)
    {
        echo("
           <script>
             window.alert('등록되지 않은 아이디입니다!');
             history.go(-1);
           </script>
         ");
    }
    else
    {
        $row = mysqli_fetch_array($result);
        $db_pass = $row["pass"];

        mysqli_close($con);

        if($pass != $db_pass)
        {

            echo("
              <script>
                window.alert('비밀번호가 틀립니다!');
                history.go(-1);
              </script>
           ");
            exit;
        }
        else
        {
            session_start();
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["user_level"] = $row["level"];
            $_SESSION["user_nicname"] = $row["nicname"];

            echo("
              <script>
                location.href = 'http://{$_SERVER["HTTP_HOST"]}/jeh/mypage0420/index.php';
              </script>
            ");
        }
    }
?>