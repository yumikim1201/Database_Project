<?
    session_start();
    if(!isset($_SESSION['ID'])) {
        echo"<script>
                alert('로그인 해주세요.');
                document.location.replace('login.php');
            </script>";
    }
    $connect = mysql_connect("localhost", "root", "apmsetup");
    mysql_select_db("project", $connect);

    $result = mysql_query("select * from board", $connect);
?>
    <meta charset="utf-8">
    <body>
    <link rel="stylesheet" type="text/css" href="boardStyle.css">
    <div id="mainWrapper">
    <h1 id="container_title">게시판</h1>
    <ul><?
          $_SESSION['ID'] = $ID;
          ?>
          <li>
              <button class="btn_bo_adm" type="submit" onclick="javascript: document.location.replace('deleteProfile.php');">회원탈퇴</button>
              <button class="btn_bo_adm" type="submit" onclick="javascript: document.location.replace('logout.php');">로그아웃</button>
          </li>
    </ul>
    <div class="tbl_head01 tbl_wrap">
        <table>
            <thead>
                <tr>
                    <th scope="col">번호</th>
                    <th scope="col">제목</th>
                    <th scope="col">작성자</th>
                    <th scope="col">작성일</th>
                    <th scope="col">조회</th>
                </tr>
            </thead>
            <tbody>
<?
    while($row = mysql_fetch_array($result)) {
        echo "<tr>";
        echo "<td align='center'>$row[TEXTNO]</td>";
        echo "<td align='center'><a href='view.php?TEXTNO=$row[TEXTNO]'>$row[TITLE]</a></td>";
        echo "<td align='center'>$row[ID]</td>";
        echo "<td align='center'>$row[DATE]</td>";
        echo "<td align='center'>$row[HIT]</td>";
        echo "</tr>";
    }
?>
            </tbody>
        </table>
    </div>

  <input type='button' class="btn_b02" value='작성하기' onclick="javascript: document.location.replace('writeboard.php');">
