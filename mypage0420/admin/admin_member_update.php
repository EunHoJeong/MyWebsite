<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/jeh/mypage0420/db/db_connect.php";

    session_start();
    if (isset($_SESSION["user_level"])&& $_SESSION["user_level"] != 0 )
    {
        echo("
            <script>
            alert('관리자가 아닙니다! 회원정보 수정은 관리자만 가능합니다!');
            history.go(-1)
            </script>
        ");
        exit;
    }

    $num   = $_POST["num"];
    $level = $_POST["level"];
    $point = $_POST["point"];

    $sql = "update users set level=$level, point=$point where num=$num";
    mysqli_query($con, $sql);

    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'admin_user.php';
	     </script>
	   ";
?>

