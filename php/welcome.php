<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>よこそう</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script type="text/javascript">    
    function getAddressAction() {
        $.ajax({
            type:'POST',
            url:'/phplogic/services.php',
            data:{
                'token':$.cookie('token'), 
                'sessionID':$.cookie('sessionID'), 
                'username':$.cookie('username'), 
                'pno1':$('#pno1').val(), 
                'pno2':$('#pno2').val()
            },
            success: function(data){
                retObj = JSON.parse(data);
                if (retObj.status !== 200) {
                    alert(retObj.message);
                    $('#outputinfo').val('');
                } else {
                    var address = retObj.results[0].address1 + retObj.results[0].address2 + retObj.results[0].address3;
                    $('#outputinfo').text(address);
                }
            }
        });
    }
    function logoutAction() {
       $('#myform').attr('action', '/phplogic/logout.php');
       $('#myform').submit();
    }
</script>
</head>
<body>
    <?php
        include_once '../phplogic/auth.php';
        $name = $_SESSION['username'];        
        echo "よこそう {$name}さん";
        setcookie('token', $_SESSION['token']);
        setcookie('sessionID', session_id());
        setcookie('username', $name);        
    ?>
    <form method="post" id='myform'>
        <br />
        郵便番号:<input type="text" maxlength="3" id="pno1" style="width: 30px"/>-<input type="text" maxlength="4" id="pno2" style="width: 40px" />
        <input type='hidden' id="token" name='token' />
        <input type='hidden' id="sessionID" name='sessionID'/>
        <input type="button" name='getPostAddress' value="検索" onclick="getAddressAction()">
        <br>
        <br>
        <label id="outputinfo"></label>
        <br>
        <br>
        <input type="button" name='logout' value="ログアウト" onclick="logoutAction()"><br/><br/>
    </form>
</body>
</html>