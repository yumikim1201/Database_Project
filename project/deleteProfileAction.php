<?
    session_start();
    if(!$_SESSION['ID']) {
        echo"<script>
                alert('로그인 해주세요.');
                document.location.replace('login.php');
             </script>";
    }
    echo"<meta charset='utf-8'>";
    $connect = mysql_connect("localhost", "root", "apmsetup");
    mysql_select_db("project", $connect);

    $id = $_SESSION['ID'];
    $password = $_POST['PASSWORD'];

    $result = mysql_query("select PASSWORD from profile where ID = '$id'", $connect);
    $row = mysql_fetch_array($result);

    if($password != $row[PASSWORD]) {
      echo "<script>
                alert('비밀번호가 틀렸습니다. 다시 입력해 주세요.');
                document.location.replace('deleteProfile.php');
            </script>";
    }
    else{
      $result =  mysql_query("delete from board where ID = '$id'", $connect);
      $result =  mysql_query("delete from profile where ID = '$id'", $connect);
      unset($_SESSION['ID']);
      echo "<script>
                alert('탈퇴되었습니다.');
                document.location.replace('login.php');
            </script>";
    }


?>
