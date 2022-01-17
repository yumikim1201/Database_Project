<meta charset="utf-8">
<?
    $connect = mysql_connect("localhost", "root", "apmsetup");
    mysql_select_db("project", $connect);

    $userID = $_POST['userID'];
    $userPW = $_POST['userPW'];
    $userName = $_POST['userName'];

    $sql = "select ID from profile where ID='$userID'";
    $result = mysql_query($sql, $connect);
    $row = mysql_fetch_array($result);

    if($row[ID] == $userID) {
        echo "<script>
                  alert('ID가 중복됩니다. 다른 ID를 입력하세요.');
                  document.location.replace('join.html');
              </script>";
    }
    else {
        mysql_query("insert into profile values ('$userID', '$userPW', '$userName')", $connect);
        echo "<script>
                  alert('회원가입이 되었습니다. 로그인 해주세요.');
                  document.location.replace('login.php');
              </script>";
    }

    mysql_close($connect);
?>
