<?
    session_start();
    echo "<meta charset='utf-8'>";
    if(!$_SESSION['ID']) {
        echo"<script>
                alert('로그인 해주세요.');
                document.location.replace('login.php');
            </script>";
    }
    $connect = mysql_connect("localhost", "root", "apmsetup");

    mysql_select_db("project", $connect);

    $id = $_SESSION['ID'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $DATE = date('Y-m-d H:i:s');


   mysql_query("alter table board auto_increment = 1", $connect);

    $sql = "insert into board values (null, '$title', '$content', '$id', '$DATE', 0)";
    $result = mysql_query($sql, $connect);

    if($result) {
        echo "<script>
                  alert('게시글이 등록되었습니다.');
                  document.location.replace('board.php');
              </script>";
    }

   else {
      echo "<script>
                alert('게시글 등록에 실패하였습니다. 다시 작성해주세요.');
                document.location.replace('writeboard.php');
            </script>";
    }

?>
