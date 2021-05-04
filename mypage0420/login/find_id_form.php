<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/jeh/mypage0420/css/index.css?after2">
    <link rel="stylesheet" href="./css/find_id_pw.css?after3">
    <script src="./js/login.js?after2"></script>
    <script src="https://kit.fontawesome.com/b13f3d49e3.js" crossorigin="anonymous"></script>

</head>
<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT']."/jeh/mypage0420/header.php"; ?>
    </header>

    <main>
        <section class="find_form">
            <form name="find_id_form" method="post" onsubmit="return find_id_check()" action="find_id.php">
                <article>
                    <p>이름</p>
                    <input type="text" name="find_id_name" >
                </article>

                <article>
                    <p>핸드폰번호</p>
                    <input type="text" name="find_id_phone" >
                </article>


                <article>
                    <input type="submit" class="submit_btn" value="아이디찾기">
                </article>
            </form>
        </section>
    </main>

    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT']."/jeh/mypage0420/footer.php"; ?>
    </footer>
    
</body>
</html>