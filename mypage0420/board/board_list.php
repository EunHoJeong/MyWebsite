<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Free Board</title>
		<link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/jeh/mypage0420/css/index.css?after3">
		<link rel="stylesheet" type="text/css"
		      href="http://<?= $_SERVER['HTTP_HOST'] ?>/jeh/mypage0420/board/css/board.css?after2">
		
		<script src="https://kit.fontawesome.com/b13f3d49e3.js" crossorigin="anonymous"></script>
		
	</head>
	<body>
		<header>
            <?php include $_SERVER['DOCUMENT_ROOT']."/jeh/mypage0420/header.php"; ?>
		</header>
		<section>
			<div id="board_box">
               <?$tag = $_GET["tag"];?>
				<h3>
					<?=$tag?> > 목록보기
				</h3>
				<ul id="board_list">
					<li>
						<span class="col1">번호</span>
						<span class="col2">제목</span>
						<span class="col3">글쓴이</span>
						<span class="col4">첨부</span>
						<span class="col5">등록일</span>
						<span class="col6">조회</span>
					</li>
                    <?php

                        include_once $_SERVER['DOCUMENT_ROOT']."/jeh/mypage0420/db/db_connect.php";
                        if (isset($_SESSION["user_id"])) $user_id = $_SESSION["user_id"];
                        else $user_id = "";
                        if (isset($_GET["page"]))
                            $page = $_GET["page"];
                        else
                            $page = 1;

                        
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

                        include_once $_SERVER['DOCUMENT_ROOT'] . "/jeh/mypage0420/db/create_table.php";

                        create_table($con, $board);

                        $sql = "select * from $board order by num desc";
                        $result = mysqli_query($con, $sql);
                        $total_record = mysqli_num_rows($result); // 전체 글 수

                        $scale = 10;

                        // 전체 페이지 수($total_page) 계산
                        if ($total_record % $scale == 0)
                            $total_page = floor($total_record / $scale);
                        else
                            $total_page = floor($total_record / $scale) + 1;

                        // 표시할 페이지($page)에 따라 $start 계산
                        $start = ($page - 1) * $scale;

                        $number = $total_record - $start;

                        for ($i = $start; $i < $start + $scale && $i < $total_record; $i++) {
                            mysqli_data_seek($result, $i);
                            // 가져올 레코드로 위치(포인터) 이동
                            $row = mysqli_fetch_array($result);
                            // 하나의 레코드 가져오기
                            $num = $row["num"];
                            $id = $row["id"];
                            $nicname = $row["nicname"];
                            $subject = $row["subject"];
                            $regist_day = $row["regist_day"];
                            $hit = $row["hit"];
                            if ($row["file_name"])
                                $file_image = "<img src='./img/file.gif'>";
                            else
                                $file_image = " ";
                            ?>
							<li>
								<span class="col1"><?= $number ?></span>
								<span class="col2"><a
											href="board_view.php?num=<?= $num ?>&page=<?= $page ?>&tag=<?=$tag?>"><?= $subject ?></a></span>
								<span class="col3"><?= $nicname ?></span>
								<span class="col4"><?= $file_image ?></span>
								<span class="col5"><?= $regist_day ?></span>
								<span class="col6"><?= $hit ?></span>
							</li>
                            <?php
                            $number--;
                        }
                        mysqli_close($con);

                    ?>
				</ul>
				<ul id="page_num">
                    <?php
                        if ($total_page >= 2 && $page >= 2) {
                            $new_page = $page - 1;
                            echo "<li><a href='board_list.php?page=$new_page&tag=$tag'>◀ 이전</a> </li>";
                        } else
                            echo "<li>&nbsp;</li>";

                        // 게시판 목록 하단에 페이지 링크 번호 출력
                        for ($i = 1; $i <= $total_page; $i++) {
                            if ($page == $i)     // 현재 페이지 번호 링크 안함
                            {
                                echo "<li><b> $i </b></li>";
                            } else {
                                echo "<li><a href='board_list.php?page=$i&tag=$tag'> $i </a><li>";
                            }
                        }
                        if ($total_page >= 2 && $page != $total_page) {
                            $new_page = $page + 1;
                            echo "<li> <a href='board_list.php?page=$new_page&tag=$tag'>다음 ▶</a> </li>";
                        } else
                            echo "<li>&nbsp;</li>";
                    ?>
				</ul> <!-- page -->
				<ul class="buttons">
					<li>
						<button onclick="location.href='board_list.php'">목록</button>
					</li>
					<li>
                        <?php
                            if ($user_id) {
                                ?>
								<button onclick="location.href='board_form.php?tag=<?=$tag?>'">글쓰기</button>
                                <?php
                            } else {
                                ?>
								<a href="javascript:alert('로그인 후 이용해 주세요!')">
									<button>글쓰기</button>
								</a>
                                <?php
                            }
                        ?>
					</li>
				</ul>
			</div> <!-- board_box -->
		</section>
		<footer>
            <?php include $_SERVER['DOCUMENT_ROOT']."/jeh/mypage0420/footer.php"; ?>
		</footer>
	</body>
</html>
