<?
    session_start();

    if(!$_SESSION['ID']) {
        echo"<script>
                alert('로그인 해주세요.');
                document.location.replace('login.php');
            </script>";
    }

?>

<html>
<head>
    <meta charset="utf-8">
    <title>게시글 작성</title>
    <link rel='stylesheet' type='text/css' href='boardStyle.css'>
</head>
<body>
    <form action="updateboard.php" method="post">
            <table align = "center">
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
                            <input type="submit" class="btn_b02" value="작성하기" style="float: left;">
                            <input type="button" class="btn_bo_adm" value="취소" onclick="javascript: document.location.href='board.php';" >
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</body>
</html>
