<?php
    date_default_timezone_set("Asia/Seoul");
    $server_name = "localhost";
    $user_name = "root";
    $pass = "2737";
    $db_name = "sample";

    $con = mysqli_connect($server_name, $user_name, $pass);
    $query = "create database if not exists sample";
    // die($con->error) : 쿼리문실행하고 결과값이 오류가나오면 프로그램을 멈춤, 에러메시지출력
    $result = $con->query($query) or die($con->error);

    // 데이타베이스 선택(sample 선택)
    $con->select_db($db_name) or die($con->error);

    function alert_back($message){
        echo("
			<script>
			alert('$message');
			history.go(-1)
			</script>
			");
    }

    function input_set($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>