<meta charset="utf-8">
<?
    session_start();

    unset($_SESSION['ID']);

    echo "<script>
              alert('로그아웃 되셨습니다.');
              document.location.replace('login.php');
          </script>"
?>
