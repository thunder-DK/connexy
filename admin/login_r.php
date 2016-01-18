<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CONNEXY - 就活生と企業を結ぶプラットフォーム</title>

        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="./css/style.css">
        <script type="text/javascript" src="./js/jquery-1.2.6.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="../css/default.css">
    </head>

    <body>
        <div id="container1" style="margin-top:10%;">
            
            <div id="login_field">
                <h2 style="margin-bottom: 30px;">IDとパスワードを入力ください</h2>

                <form action="login_execute.php" method="post">

                    <div class="form-group has-error">
                        
                        <table border="0" id="input_table">
                            <tr height="50">
                                <td width="100"><label class="control-label" for="login">ログイン名: </label></td>
                                <td><input type="text" name="name" value="" class="form-control" placeholder="login" size="100"></td>
                            </tr>
                            <tr height="50">
                                <td><label class="control-label" for="password">パスワード: </label></td>
                                <td width="100"><input type="password" name="password" class="form-control" placeholder="password" size="100" value=""></td>
                            </tr>
                            <input type="hidden" name="fromPage" value="r">
                        </table>
                        
                        <input type="submit" class="btn btn-primary" width=100 value="Login" id="submit-input" name="next-b">
                        <input type="submit" class="btn btn-default" width=100 value="前に戻る" id="submit-cancel" name="cancel-b">
                        
                        <!--
                        <input type="image" src="../images/btn-login.png" value="ログイン" id="submit-input" name="next-b"/></td>
                        <input type="image" src="../images/btn-cancel.png" value="元に戻る" id="submit-cancel" name="cancel-b"></td>
                        -->
                    </div>
                </form>
            </div>
            <h2 style="margin-top:100px; text-align:center;">会員登録がまだな方は<a href="registry_r.php">コチラ</a>から</h2>
        </div>
    </body>
</html>