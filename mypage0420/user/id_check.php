    <?php

    include_once $_SERVER['DOCUMENT_ROOT']."/jeh/mypage0420/db/db_connect.php";
    
    $id   = $_GET["id"];
    $sql = "select * from users where id='$id'";
    $result = mysqli_query($con, $sql);

    $num_match = mysqli_num_rows($result);

    if(!$num_match)
    {
      echo "
      <script>
        history.go(-1);
          
      </script>
    ";
    }

    

    mysqli_close($con);
    
    ?>


