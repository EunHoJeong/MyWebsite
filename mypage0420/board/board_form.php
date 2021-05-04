<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>Create Board</title>
		<link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/jeh/mypage0420/css/index.css?after3">
		<link rel="stylesheet" type="text/css"
			href="http://<?= $_SERVER['HTTP_HOST'] ?>/jeh/mypage0420/board/css/board.css?after2">
			  <script src="https://kit.fontawesome.com/b13f3d49e3.js" crossorigin="anonymous"></script>
	</head>

	<body>
		<header>
			<?php include $_SERVER['DOCUMENT_ROOT']."/jeh/mypage0420/header.php"; ?>
		</header>
        <?php
            if (!$user_id) {
                echo("<script>
				alert('로그인 후 이용해주세요!');
				history.go(-1);
				</script>
			");
                exit;
            }
        ?>
		<section>
            <?php 
				$tag = $_GET["tag"];
				switch($tag){
					case '자유게시판':
						$board = 'free_board';
						break;
					case '알고리즘':
						$board = 'algorithm_board';
						break;
					case '공지사항':
						$board = 'notice_board';
						break;
				}
                include_once $_SERVER['DOCUMENT_ROOT']."/jeh/mypage0420/db/db_connect.php";
                $mode = isset($_POST["mode"])?$_POST["mode"]:"insert";
                $subject = "";
                $content = "";
                $file_name = "";
				
                if (isset($_POST["mode"]) && $_POST["mode"] === "modify") {
                    $num = $_POST["num"];
                    $page = $_POST["page"];

					$sql = "select * from $board where num=$num";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($result);
                    $writer = $row["id"];
                    if (!isset($user_id) || ($user_id !== $writer && $user_level !== '0')) {
                        alert_back('수정권한이 없습니다.');
                        exit;
                    }
                    
                    $subject = $row["subject"];
                    $content = $row["content"];
                    $file_name = $row["file_name"];
                    if (empty($file_name)) $file_name = "없음";
                }
            ?>

			<div id="board_box">
				<h3 id="board_title">
                    <?php if ($mode === "modify"): ?>
						게시판 > 수정 하기
                    <?php else: ?>
						게시판 > 글 쓰기
                    <?php endif; ?>
				</h3>
				<form name="board_form" method="post" action="dmi_board.php?tag=<?=$tag?>" enctype="multipart/form-data">
                    <?php if ($mode === "modify"): ?>
	                    <input type="hidden" name="num" value=<?= $num ?>>
	                    <input type="hidden" name="page" value=<?= $page ?>>
                    <?php endif; ?>

					<input type="hidden" name="mode" value=<?= $mode ?>>
					<ul id="board_form">
						<li>
							<span class="col1">닉네임 : </span>
							<span class="col2"><?= $user_nicname ?></span>
						</li>
						<li>
							<span class="col1">제목 : </span>
							<span class="col2"><input name="subject" type="text" value=<?= $subject ?>></span>
						</li>
						<li id="text_area">
							<span class="col1">내용 : </span>
							<span class="col2">
							<textarea name="content"><?= $content ?></textarea>
						</span>
						</li>
						<li>
							<span class="col1"> 첨부 파일 : </span>
							<span class="col2"><input type="file" name="upfile">
							<?php if ($mode === "modify"): ?>
								<input type="checkbox" value="yes"
								       name="file_delete">&nbsp;파일 삭제하기
								<br>현재 파일 : <?= $file_name ?>
                            <?php endif; ?>
							 </span>
						</li>
					</ul>
					<ul class="buttons">
						<li>
							<button type="submit" onclick="check_input()">완료</button>
						</li>
						<li>
							<button type="button" onclick="location.href='board_list.php?tag=<?=$tag?>'">목록</button>
						</li>
					</ul>
				</form>
			</div> <!-- board_box -->
		</section>
		<footer>
			<?php include $_SERVER['DOCUMENT_ROOT']."/jeh/mypage0420/footer.php"; ?>
		</footer>
	</body>

</html>