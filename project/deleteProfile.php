<?
    session_start();
    if(!$_SESSION['ID']) {
        echo"<script>
                alert('로그인 해주세요.');
                document.location.replace('login.php');
             </script>";
    }
    echo"<meta charset='utf-8'>";
?>
<body>
    <form method="POST">
      <link rel="stylesheet" type="text/css" href="boardStyle.css">
        <h2> <center>비밀번호를 입력해주세요.</center></h2>
      <ul>
        <li><input type="password" id="userPW" name="PASSWORD" class="pw" placeholder="Password" required><br><br>
            <button id="btn-Yes" class="btn_bo_adm" type="submit" onclick="javascript: form.action='/assignment/project/deleteProfileAction.php';">확인</button>
</body>
