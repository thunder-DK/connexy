<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ログイン</title>
        <link rel="stylesheet" href="../css/default.css">
    </head>
    <body>
        <div id="container1">
            
            <h2>IDとパスワードを入力ください</h2>
                
            <form action="login_execute.php" method="post">
            
                <fieldset id="news_inputfield">
                <!-- <legend>ログイン情報</legend> -->
            
                    <table border="0" id="input_table">
                        <tr height="50">
                            <td width="100">ログイン名: </td>
                            <td><input type="text" name="name" value="" size="100" required /></td>
                        </tr>
                        <tr height="50">
                            <td>パスワード: </td>
                            <td width="100"><input type="password" name="password" size="100" value="" required /></td>
                        </tr>
                    </table>
                </fieldset>
    
                <input type="image" src="../images/btn-login.png" value="ログイン" id="submit-input" name="next-b"/></td>
                <input type="image" src="../images/btn-cancel.png" value="元に戻る" id="submit-cancel" name="cancel-b"></td>
 
            </form>
        </div>
    </body>
</html>