<?php
    $loginP = $_GET["loginP"];
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CONNEXY - 就活生と企業を結ぶプラットフォーム</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/default.css">
        
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.1.min.js"></script>
        <!--<script type="text/javascript" src="../js/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="../js/jquery-1.2.6.min.js"></script>
        <script type="text/javascript" src="./js/jquery-1.11.3.js"></script>-->
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>  
        <script type="text/javascript" src="../js/jquery.validationEngine.js"></script>
        <script type="text/javascript" src="../js/jquery.validationEngine-ja.js"></script>
        <link rel="stylesheet" href="../css/validationEngine.jquery.css">
        <script type="text/javascript">
            jQuery(document).ready(function($){
                jQuery('#sendform').validationEngine();
                jQuery('#submit-cancel, #submit-registry').click(function(){
                    jQuery('#sendform').validationEngine('hideAll');
                    jQuery('#sendform').validationEngine('detach');
                    return true;
                });
            });
        </script>
    </head>

    <body>
        
        <nav class="navbar navbar-inverse navbar-fixed-top" style="height: 50px;">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".target">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            
                <a class="navbar-brand" href="">connexy</a>
            </div>
        </nav>
        
        <div class="container" style="margin-top:10%;">
                        
            <div id="login_field">
                <h2 style="margin-bottom: 30px;">IDとパスワードを入力ください</h2>

                <!--<form action="" method="post" id="sendform">
                <form action="login_execute.php" method="post">-->

                <form action="login_execute.php" method="post" id="sendform">
                    <div class="form-group has-error">
                        <table border="0" id="input_table">
                            <tr height="50">
                                <td style="width: 150px;"><label class="control-label" for="loginid">ログイン名: </label></td>
                                <td>
                                    <input style="width: 80%;" type="text" name="loginid" class="form-control validate[required, custom[email]]" placeholder="login">
                                </td>
                            </tr>
                            <tr height="50">
                                <td style="width: 150px;"><label class="control-label" for="password">パスワード: </label></td>
                                <td>
                                    <input style="width: 80%;" type="password" name="password" class="form-control validate[required]" placeholder="password">
                                </td>
                            </tr>
                            <input type="hidden" name="loginP" value="<?php print $loginP ?>">
                        </table>
                        
                        <input type="submit" class="btn btn-primary" width=100 value="Login" id="submit-input" name="next-b">
                        <input type="submit" class="btn btn-default" width=100 value="前に戻る" id="submit-cancel" name="cancel-b">
    
                        <div style="text-align: center;">
                            <h2 style="margin: 120px auto 20px auto;">会員登録がまだな方はコチラから</h2>
                            <input type="submit" class="btn btn-primary" style="width:180px;" value="新規会員登録" id="submit-registry" name="registry-b">
                        </div>
                    </div>
                </form>
            </div>

            <!--
            <div class="form-group has-error">
                <h2 style="margin-top: 120px; text-align: center;">会員登録がまだな方は<a href="registry_r.php">コチラ</a>から</h2>
                <form action="registry_r.php" method="POST" style="text-align: center; margin-top: 3%;">
                    <input type="submit" class="btn btn-primary" style="width:180px;" value="新規会員登録" id="submit-registry" name="registry-b">
                    <input type="hidden" name="loginP" value="<//?php print $loginP ?>">
                </form>
            </div>
            -->
        </div>
    </body>
</html>