<!DOCTYPE html>
<title>ログインページ</title>
<h1>ログインしてください</h1>
<form method="post" action="/phplogic/check_user.php">
    ユーザ名: <input type="text" name="username" value=""><br/><br/>
    パスワード: <input type="password" name="password" value="">
    <input type="hidden" name="token" value=""><br/><br/>
    <input type="submit" value="ログイン"><br/><br/>
    <?php 
        session_start();
        if (isset($_SESSION["error_msg"])) {
            echo $_SESSION["error_msg"];
        }
        session_destroy();
    ?>
</form>