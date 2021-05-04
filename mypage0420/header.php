<?php
    session_start();
    if (isset($_SESSION["user_id"])) $user_id = $_SESSION["user_id"];
    else $user_id = "";

    if (isset($_SESSION["user_level"])) $user_level = $_SESSION["user_level"];
    else $user_level = "1";
    
    if (isset($_SESSION["user_nicname"])) $user_nicname = $_SESSION["user_nicname"];
    else $user_nicname = "";
?>

<section class="top">
    <ul class="top_left">
        <li><i class="fab fa-android"></i></li>
        <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/jeh/mypage0420/index.php">JHDeveloper</a>  </li>
    </ul>

    <ul class="menu">
            <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/jeh/mypage0420/memo/message_form.php">쪽지</a></li>
            <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/jeh/mypage0420/board/board_list.php?tag=공지사항">공지사항</a></li>
            <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/jeh/mypage0420/board/board_list.php?tag=알고리즘">알고리즘</a></li>
            <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/jeh/mypage0420/board/board_list.php?tag=자유게시판">자유게시판</a></li>
            <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/jeh/mypage0420/free/list.php">Q&A</a></li>
    </ul>
    
    <ul class="top_right">
        <?php
            if(!$user_id){
                ?>
                <li id="signup_show"><a href="http://<?=$_SERVER['HTTP_HOST'];?>/jeh/mypage0420/user/user_form.php">회원가입</a></li>
                <li>ㅣ</li>
                <li id="login_show"><a href="http://<?=$_SERVER['HTTP_HOST'];?>/jeh/mypage0420/login/login_form.php">로그인</a></li>
                <?php
            }else {
                ?>
                <li id="signup_show"><a href="http://<?=$_SERVER['HTTP_HOST'];?>/jeh/mypage0420/user/user_modify_form.php">정보수정</a></li>
                <li>ㅣ</li>
                <li id="login_show"><a href="http://<?=$_SERVER['HTTP_HOST'];?>/jeh/mypage0420/login/logout.php">로그아웃</a></li>
                <?php
            }

            if($user_level==0) {
                ?>
                <li>ㅣ</li>
                <li><a href="http://<?=$_SERVER['HTTP_HOST'];?>/jeh/mypage0420/admin/admin_user.php"> 관리자 모드</a></li>
                <?php
            }
            ?>


    </ul>
    </section>
