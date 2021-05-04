<section class="main_section">
    <main>
        <div class="slide_show">
            <a href="#"><img src="./img/slide1.jpg" alt="slide1"></a>
            <a href="#"><img src="./img/slide2.jpg" alt="slide2"></a>
            <a href="#"><img src="./img/slide3.jpg" alt="slide3"></a>
            <a href="#"><img src="./img/slide4.jpg" alt="slide4"></a>
        </div>
        
        <div class="slide_nav">
            <a href="#" class="prev">prev</a>
            <a href="#" class="next">next</a>
        </div>
        </section>

        <section class="main_board">
            <article class="skile_borad">
                
            
                <table>
                    <tr>
                        <th>공지사항</th>
                    </tr>
                    <?php

                        include_once $_SERVER['DOCUMENT_ROOT']."/jeh/mypage0420/db/db_connect.php";
                        
                        $page = 1;
                        $sql = "select (num), (subject) from notice_board order by num desc limit 7";
                        $result = mysqli_query($con, $sql);
                        $total_record = mysqli_num_rows($result); // 전체 글 수

                        while($row = mysqli_fetch_array($result)) {
                            
                            // 하나의 레코드 가져오기
                            $num = $row["num"];
                            $subject = $row["subject"];
                            
                            ?>
							<tr>
                                <td><a 
                                href="board/board_view.php?num=<?= $num ?>&page=<?= $page ?>&tag=공지사항"><?= $subject ?></a></td>
                            </tr>
                            <?php
                            
                        }
                        
                        

                    ?>
                    
                </table>
                
            </article>
            <article calss="algorithm">
                <table>
                    <tr>
                        <th>알고리즘</th>
                    </tr>
                    <?php

                        include_once $_SERVER['DOCUMENT_ROOT']."/jeh/mypage0420/db/db_connect.php";
                        
                        
                        $sql2 = "select (num), (subject) from algorithm_board order by num desc limit 7";
                        $result2 = mysqli_query($con, $sql2);

                        while($row2 = mysqli_fetch_array($result2)) {
                            
                            // 하나의 레코드 가져오기
                            $num2 = $row2["num"];
                            $subject2 = $row2["subject"];
                            
                            ?>
							<tr>
                                <td><a 
                                href="board/board_view.php?num=<?= $num2 ?>&page=<?= $page ?>&tag=알고리즘"><?= $subject2 ?></a></td>
                            </tr>
                            <?php
                            
                        }
                        
                        

                    ?>
                   
                </table>
            </article>
            <article class="free_borad">
            <table>
                    <tr>
                        <th>자유게시판</th>
                    </tr>
                    <?php

                        
                        
                        
                        $sql3 = "select (num), (subject) from free_board order by num desc limit 7";
                        $result3 = mysqli_query($con, $sql3);

                        while($row3 = mysqli_fetch_array($result3)) {
                            
                            // 하나의 레코드 가져오기
                            $num3 = $row3["num"];
                            $subject3 = $row3["subject"];
                            
                            ?>
							<tr>
                                <td><a 
                                href="board/board_view.php?num=<?= $num3 ?>&page=<?= $page ?>&tag=자유게시판"><?= $subject3 ?></a></td>
                            </tr>
                            <?php
                            
                        }
                        
                        mysqli_close($con);

                    ?>
                </table>
            </article>
            </main>
</section>