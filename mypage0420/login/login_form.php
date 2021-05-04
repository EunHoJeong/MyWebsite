<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/jeh/mypage0420/css/index.css?after3">
    <link rel="stylesheet" href="./css/login.css?after3">
    <script src="./js/login.js"></script>
    <script src="https://kit.fontawesome.com/b13f3d49e3.js" crossorigin="anonymous"></script>

</head>
<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT']."/jeh/mypage0420/header.php"; ?>
    </header>

    <main>
        <section>
            <form name="login_form" method="post" onsubmit="return login_check()" action="login.php">
                <article>
                    <input type="text" name="login_id" placeholder="아이디를 입력해주세요.">
                </article>

                <article>
                    <input type="password" name="login_password" placeholder="비밀번호를 입력해주세요.">
                </article>

                <article>
                    <input type="submit" id="login_submit" value="로그인">
                </article>
            </form>

            <article>
                <ul>
                    <li><a href="find_id_form.php">아이디 찾기</a></li>
                    <li>ㅣ</li>
                    <li><a href="find_pw_form.php">비밀번호 찾기</a></li>
                </ul>
            </article>
            
        </section>
    </main>

    <footer>
        <?php include $_SERVER['DOCUMENT_ROOT']."/jeh/mypage0420/footer.php"; ?>
    </footer>
    
</body>
</html>

