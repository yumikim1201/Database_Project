<?
    session_start();
    if(!$_SESSION['ID']) {
        echo"<script>
                alert('로그인 해주세요.');
                document.location.replace('login.php');
             </script>";
    }
    echo"<meta charset='utf-8'>";

    $TEXTNO = $_SESSION['TEXTNO'];
    $connect = mysql_connect("localhost", "root", "apmsetup");
    mysql_select_db("project", $connect);

    $result =  mysql_query("delete from board where TEXTNO = $TEXTNO", $connect);
    unset($_SESSION['TEXTNO']);
    echo "<script>
              alert('삭제가 완료되었습니다.');
              document.location.replace('board.php');
          </script>";

?>
