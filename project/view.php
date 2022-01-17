<?
    session_start();
    if(!$_SESSION['ID']) {
        echo"<script>
                alert('로그인 해주세요.');
                document.location.replace('login.php');
            </script>";
      }
    $TEXTNO = $_GET['TEXTNO'];

    $connect = mysql_connect("localhost", "root", "apmsetup");
    mysql_select_db("project", $connect);

    $sql = "update board set HIT = HIT + 1 where TEXTNO = '$TEXTNO'";

    $result = mysql_query($sql, $connect);
    setcookie('board'.$TEXTNO, 1, time() + (60 * 60 * 24), '/');

    echo "<meta charset='utf-8'>
          <link rel='stylesheet' type='text/css' href='viewStyle.css'>
    ";

    $sql = "select * from board where TEXTNO = '$TEXTNO'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);
?>
    <article id="bo_v">
        <header>
            <h1 id="bo_v_title">
                <?
                    echo $row['TITLE'];
                ?>
            </h1>
        </header>
        <section id="bo_v_info">
            작성자:<strong><?echo $row['ID'];?></strong>
            작성일:<strong><?echo $row['DATE'];?></strong>
            조회:<strong><?echo $row['HIT'];?></strong>
        </section>
        <section id="bo_v_atc">
            <div id="bo_v_con"><?echo $row['CONTENT'];?></div>
        </section>
    </article>
<?
    if($row[ID] == $_SESSION['ID']) {
        $_SESSION['TEXTNO'] = $TEXTNO;
        ?>
            <ul class="btn_bo_user">
                <li><input type='button' class="btn_b02" value='수정하기' onclick="javascript: document.location.href='modify.php';"></li>
                <li><input type='button' class="btn_b02" value='삭제하기' onclick="deleteContent()"></li>
            </ul>
        <?
    }
?>

<input type='button' value='이전 페이지' class="btn_bo_adm" onclick="javascript: document.location.href='board.php';">

<script>
    function deleteContent() {
        var check = confirm("정말 삭제하시겠습니까?");
        if(check) {
            document.location.replace('deleteBoard.php');
        }
        else {
            alert("취소되었습니다.");
        }
    }
</script>
