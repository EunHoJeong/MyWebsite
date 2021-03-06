<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Message</title>
		<link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/jeh/mypage0420/css/index.css?after3">
		<link rel="stylesheet" type="text/css" href="css/message.css?after2">
		
		<script src="js/message.js"></script>
		
	</head>
	<body>
		<header>
			<?php include $_SERVER['DOCUMENT_ROOT']."/jeh/mypage0420/header.php"; ?>
		</header>
        <?php
            include_once $_SERVER['DOCUMENT_ROOT'] . "/jeh/mypage0420/db/db_connect.php";
            include_once $_SERVER['DOCUMENT_ROOT'] . "/jeh/mypage0420/db/create_table.php";
            create_table($con, 'message');
            if (!$user_id) {
                echo("<script>
				alert('로그인 후 이용해주세요!');
				history.go(-1);
				</script>
			");
                exit;
            }
        ?>
		<section class="message_section">
            
			<div id="message_box">
				<h3 id="write_title">
					쪽지 보내기
				</h3>
				<ul class="top_buttons">
					<li><span><a href="message_box.php?mode=rv">수신 쪽지함 </a></span></li>
					<li><span><a href="message_box.php?mode=send">송신 쪽지함</a></span></li>
				</ul>
				<form name="message_form" method="post" action="message_insert.php">
					<div id="write_msg">
						<ul>
							<li>
								<span class="col1">보내는 사람 : </span>
								<span class="col2"><?= $user_id ?></span>
								<input type="hidden" value=<?=$user_id?> name="send_id">
							</li>
							<li>
								<span class="col1">수신 아이디 : </span>
								<span class="col2"><input name="rv_id" type="text"></span>
							</li>
							<li>
								<span class="col1">제목 : </span>
								<span class="col2"><input name="subject" type="text"></span>
							</li>
							<li id="text_area">
								<span class="col1">내용 : </span>
								<span class="col2">
	    				<textarea name="content"></textarea>
	    			</span>
							</li>
						</ul>
						<button type="button" onclick="check_input()">보내기</button>
					</div>
				</form>
			</div> <!-- message_box -->
		</section>
		<footer>
			<?php include $_SERVER['DOCUMENT_ROOT']."/jeh/mypage0420/footer.php"; ?>
		</footer>
	</body>
</html>
