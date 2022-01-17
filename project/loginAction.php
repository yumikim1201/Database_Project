<?
    session_start();
    $connect = mysql_connect("localhost", "root", "apmsetup");
    mysql_select_db("project", $connect);

    $id = $_POST['ID'];
    $password = $_POST['PASSWORD'];

    $result = mysql_query("select ID from profile where ID = '$id'", $connect);
    $row = mysql_fetch_array($result);

    if($row[ID] != $id) {
        echo "<script>
                  alert('등록되지 않은 아이디 입니다. ID를 다시 확인해주세요.');
                  document.location.replace('login.php');
              </script>";
    }
    else {
        $result = mysql_query("select PASSWORD from profile where ID = '$id'", $connect);
        $row = mysql_fetch_array($result);

        if($password == $row[PASSWORD]) {
          $_SESSION['ID'] = $id;

          echo  "<script>
                    alert('로그인 되셨습니다.');
                    document.location.replace('board.php');
                </script>";
                
        }
        else {
          echo "<script>
                    alert('비밀번호가 틀렸습니다. 다시 확인해주세요.');
                    document.location.replace('login.php');
                </script>";
        }

    }
?>
    <meta charset="utf-8">
