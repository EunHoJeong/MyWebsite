<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin</title>
		<link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/jeh/mypage0420/css/index.css?after3">
		<link rel="stylesheet" type="text/css"
		      href="http://<?= $_SERVER['HTTP_HOST'] ?>/jeh/mypage0420/admin/admin_css/admin.css?after6">
		
	</head>
	<body>
		<header>
            <?php include $_SERVER['DOCUMENT_ROOT']."/jeh/mypage0420/header.php"; ?>
		</header>
		<main>
		<span>　</span>
			<div id="admin_box">
			<article>
				<ul class="admin_menu">
					<li><a href="admin_user.php">회원관리</a></li>
					<li><a href="admin_notice_board.php">공지사항 관리</a></li>
					<li id="choice"><a href="admin_algorithm_board.php">알고리즘 관리</a></li>
					<li><a href="admin_free_board.php">자유게시판 관리</a></li>
				</ul>
				</article>
				<ul id="board_list">
					<li class="title">
						<span class="col1">선택</span>
						<span class="col2">번호</span>
						<span class="col3">닉네임</span>
						<span class="col4">제목</span>
						<span class="col5">첨부파일명</span>
						<span class="col6">작성일</span>
					</li>
					<form name="board_form" method="post" action="admin_board_delete.php?board=<?='algorithm_board'?>">
                        <?php
                            include_once $_SERVER['DOCUMENT_ROOT']."/jeh/mypage0420/db/db_connect.php";

                            if (!isset($_SESSION['user_id']) && $_SESSION['user_level']!=='0' ) {
                                echo("
                                        <script>
                                        alert('관리자만 접근가능합니다');
                                        history.go(-1)
                                        </script>
                                    ");
                                exit;
                            }
                        
                            $sql = "select * from algorithm_board order by num desc";
                            $result = mysqli_query($con, $sql);
                            $total_record = mysqli_num_rows($result); // 전체 글의 수

                            $number = $total_record;

                            while ($row = mysqli_fetch_array($result)) {
                                $num = $row["num"];
                                $nicname = $row["nicname"];
                                $subject = $row["subject"];
                                $file_name = $row["file_name"];
                                $regist_day = $row["regist_day"];
                                $regist_day = substr($regist_day, 0, 10)
                                ?>
								<li>
									<span class="col1"><input type="checkbox" name="item[]" value="<?= $num ?>"></span>
									<span class="col2"><?= $number ?></span>
									<span class="col3"><?= $nicname ?></span>
									<span class="col4"><?= $subject ?></span>
									<span class="col5"><?= $file_name ?></span>
									<span class="col6"><?= $regist_day ?></span>
								</li>
                                <?php
                                $number--;
                            }
                            mysqli_close($con);
                        ?>
						<button type="submit">선택된 글 삭제</button>
					</form>
				</ul>
				
			</div> <!-- admin_box -->
                    </main>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT']."/jeh/mypage0420/footer.php"; ?>
		</footer>
	</body>
</html>