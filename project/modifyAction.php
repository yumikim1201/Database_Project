<?
    session_start();
    if(!$_SESSION['ID']) {
        echo"<script>
                alert('로그인 해주세요.');
                document.location.replace('login.php');
             </script>";
    }

    $TEXTNO = $_SESSION['TEXTNO'];
    $TITLE = $_POST['title'];
    $CONTENT = $_POST['content'];

    $connect = mysql_connect("localhost", "root", "apmsetup");
    mysql_select_db("project", $connect);

    $sql = "update board set TITLE = '$TITLE', CONTENT = '$CONTENT' where TEXTNO = $TEXTNO";

    mysql_query($sql, $connect);
?>
<meta charset="utf-8">
<script>
    alert("수정이 완료되었습니다.");
    document.location.replace('board.php');
</script>
