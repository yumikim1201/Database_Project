<?
    session_start();
    if(!$_SESSION['ID']) {
    echo"<script>
            alert('로그인 해주세요.');
            document.location.replace('login.php');
        </script>";
    }

    $TEXTNO = $_SESSION['TEXTNO'];

    $connect = mysql_connect("localhost", "root", "apmsetup");
    mysql_select_db("project", $connect);

    $result = mysql_query("select TITLE, CONTENT from board where TEXTNO = $TEXTNO", $connect);
    $row = mysql_fetch_array($result);
?>

<html>
<head>
    <meta charset="utf-8">
    <title>게시글 수정</title>
    <link rel='stylesheet' type='text/css' href='modiftyStyle.css'>
</head>
<body>
    <form action="modifyAction.php" method="post">
        <div class="tbl_frm01 tbl_wrap">
            <table>
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="title">제목</label>
                        </th>
                        <td>
                            <input type="text" name="title" id="title" required>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                              <label for="content">내용</label>
                        </th>
                        <td>
                              <textarea name="content" cols="100" rows="10" id="content" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" class="btn_b02" value="수정하기" style="float: left;">
                            <input type="button" class="btn_bo_adm" value="취소" onclick="javascript: document.location.href='board.php';" >
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
    <script>
        var title = "<?echo $row['TITLE'];?>";
        var content = "<?echo $row['CONTENT'];?>";

        document.getElementById('title').value = title;
        document.getElementById('content').value = content;
    </script>
</body>
</html>
