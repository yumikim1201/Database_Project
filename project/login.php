<?

    session_start();
    if(isset($_SESSION['ID'])) {
        echo"<script>
                alert('이미 로그인 되어있습니다.');
                document.location.replace('board.php');
              </script>";
    }

?>
<meta charset="utf-8">
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/assignment/project/loginStyle.css">
    <title>Login</title>
  </head>
  <body width="100%" height="100%">

    <form class="loginForm" method="POST">

      <h2>Login</h2>
      <div class="idForm">
        <input type="text" id="userID" name="ID" class="id" placeholder="ID" required autofocus><br><br>
      </div>
      <div class="passForm">
        <input type="password" id="userPW" name="PASSWORD" class="pw" placeholder="Password" required><br><br>
      </div>
      <button id="btn-Yes" class="btn" type="submit" onclick="javascript: form.action='/assignment/project/loginAction.php';">LOGIN</button>
      <div class="bottomText">
        Don't you have ID? <button id="btn-Yes" type="submit" onclick="document.location.href='join.html';">sign up</button>

      </div>
    </form>
  </body>
</html>
