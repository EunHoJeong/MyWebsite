<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Free Board</title>
		<link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/jeh/mypage0420/css/index.css?after3">
		<link rel="stylesheet" type="text/css"
			href="http://<?= $_SERVER['HTTP_HOST'] ?>/jeh/mypage0420/board/css/board.css?after2">
		<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/jeh/mypage0420/board/js/board.js"></script>
		<script src="https://kit.fontawesome.com/b13f3d49e3.js" crossorigin="anonymous"></script>
		
	</head>
	<body>
		<header>
			<?php include $_SERVER['DOCUMENT_ROOT']."/jeh/mypage0420/header.php"; ?>
		</header>
		<section>
            
			<div id="board_box">
				<h3 class="title">
					게시판 > 내용보기
				</h3>
                <?php
                    if (!$user_id) {
                        echo("<script>
							alert('로그인 후 이용해주세요!');
							history.go(-1);
							</script>
						");
                        exit;
                    }

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
                    $num = $_GET["num"];
                    if (isset($_GET["page"]))
                            $page = $_GET["page"];
                        else
                            $page = 1;

                    $sql = "select * from $board where num=$num";
                    $result = mysqli_query($con, $sql);

                    $row = mysqli_fetch_array($result);
                    $id = $row["id"];
                    $nicname = $row["nicname"];
                    $regist_day = $row["regist_day"];
                    $subject = $row["subject"];
                    $content = $row["content"];
                    $file_name = $row["file_name"];
                    $file_type = $row["file_type"];
                    $file_copied = $row["file_copied"];
                    $hit = $row["hit"];

                    $content = str_replace(" ", "&nbsp;", $content);
                    $content = str_replace("\n", "<br>", $content);
                    if ($user_id !== $id) {
                        $new_hit = $hit + 1;
                        $sql = "update $tag set hit=$new_hit where num=$num";
                        mysqli_query($con, $sql);
                    }
					
                ?>
				<ul id="view_content">
					<li>
						<span class="col1"><b>제목 :</b> <?= $subject ?></span>
						<span class="col2"><b>닉네임 :</b><?= $nicname ?> | <?= $regist_day ?></span>
					</li>
					<li>
                        <?php
                            if ($file_name) {
                                $real_name = $file_copied;
                                $file_path = "./data/" . $real_name;
                                $file_size = filesize($file_path);  //파일사이즈를 구해주는 함수

                                echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
			       		<a href='board_download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
                            }
                        ?>
                        <?= $content ?>
					</li>
				</ul>
				<ul class="buttons">
					<li>
						<button onclick="location.href='board_list.php?page=<?= $page ?>&tag=<?=$tag?>'">목록</button>
					</li>
					<?php
					if($nicname === $_SESSION["user_nicname"]){
						?>
						<li>
						<form action="board_form.php?tag=<?=$tag?>" method="post">
							<button>수정</button>
							<input type="hidden" name="num" value=<?= $num ?>>
							<input type="hidden" name="page" value=<?= $page ?>>
							<input type="hidden" name="mode" value="modify">
						</form>
						</li>
						<?php
					}
					?>
					<?php
					if($nicname === $_SESSION["user_nicname"] || $user_level == 0){
						?>
						<li>
						<form action="dmi_board.php?tag=<?=$tag?>" method="post">
							<button>삭제</button>
							<input type="hidden" name="num" value=<?= $num ?>>
							<input type="hidden" name="page" value=<?= $page ?>>
							<input type="hidden" name="mode" value="delete">
						</form>
					</li>
					<?php
					}
					?>
					
					<li>
						<button onclick="location.href='board_form.php?tag=<?=$tag?>'">글쓰기</button>
					</li>
				</ul>
			</div> <!-- board_box -->
		</section>
		<footer>
			<?php include $_SERVER['DOCUMENT_ROOT']."/jeh/mypage0420/footer.php"; ?>
		</footer>
	</body>
</html>
