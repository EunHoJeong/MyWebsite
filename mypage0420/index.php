<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY HomePage</title>
    <link rel="stylesheet" href="./css/index.css?after3">
    <script src="https://kit.fontawesome.com/b13f3d49e3.js" crossorigin="anonymous"></script>
    <script src="./js/main_slide.js?after2"></script>
    
</head>
<body onload="main_slide_func()">
    <header>
    <?php include $_SERVER['DOCUMENT_ROOT']."/jeh/mypage0420/header.php"; ?>
    </header>
    <main class="main">
    <?php include $_SERVER['DOCUMENT_ROOT']."/jeh/mypage0420/main.php"; ?>
    </main>
    <footer>
    <?php include $_SERVER['DOCUMENT_ROOT']."/jeh/mypage0420/footer.php"; ?>
    </footer>
    
</body>
</html>