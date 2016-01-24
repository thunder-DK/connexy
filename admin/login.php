<?php
    include "../header.php";
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
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>  
        <script type="text/javascript" src="../js/jquery.validationEngine.js"></script>
        <script type="text/javascript" src="../js/jquery.validationEngine-ja.js"></script>
        <link rel="stylesheet" href="../css/validationEngine.jquery.css">
        <link rel="shortcut icon" href="../favicon.ico">

        <script type="text/javascript">
            jQuery(document).ready(function($){
                jQuery('#sendform').validationEngine();
                jQuery('.submit-cancel, #submit-registry, .submit-cc-input, .submit-cm-input').click(function(){
                    jQuery('#sendform').validationEngine('hideAll');
                    jQuery('#sendform').validationEngine('detach');
                    return true;
                });
            });
        </script>
    </head>

    <body>
        <!--
        <nav class="navbar navbar-inverse navbar-fixed-top" style="height: 50px;">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".target">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            
                <a class="navbar-brand" href="">connexy</a>
            </div>
        </nav>
        -->

        <div class="container" style="margin-top:10%;">
                        
            <div id="login_field">
                <form action="login_execute.php" method="post" id="sendform">
                    <div class="form-group has-error">
                        
                        <!-- 就活生向けのログイン画面 -->
                        <?php if($loginP == "r"): ?>
                            <!--<div style="width: 80%; height: 100%; margin: 0 auto; border: solid 1px;">-->
                        
                            <h4 style="text-align: center; margin-bottom: 30px;">IDとパスワードを入力ください</h4>
                            <table border="0" class="input_table">
                                <tr height="50">
                                    <td style="width: 120px;"><label class="control-label" for="loginid">ログイン名: </label></td>
                                    <td>
                                        <input type="text" name="loginid" class="form-control validate[required, custom[email]]" placeholder="login">
                                    </td>
                                </tr>
                                <tr height="50">
                                    <td style="width: 120px;"><label class="control-label" for="password">パスワード: </label></td>
                                    <td>
                                        <input type="password" name="password" class="form-control validate[required]" placeholder="password">
                                    </td>
                                </tr>
                            </table>
                            <input type="hidden" name="loginP" value="<?php print $loginP ?>">
                            <div style="margin: 0 auto;">
                                <input type="submit" class="btn btn-primary submit-input" width=100 value="Login" name="next-b">
                                <input type="submit" class="btn btn-default submit-cancel" width=100 value="前に戻る" name="cancel-b">
                            </div>

                            <div style="text-align: center;">
                                <h4 style="margin: 120px auto 20px auto;">会員登録がまだな方はコチラから</h4>
                                <input type="submit" class="btn btn-primary" style="width:180px;" value="新規会員登録" id="submit-registry" name="registry-b">
                            </div>
                            <!--</div>-->
                                
                        <!-- 企業さん向けのログイン画面 -->
                        <?php elseif($loginP == "c" or $loginP == "cc" or $loginP == "cm"): ?>
                            <!--<h2 style="margin-bottom: 20px;">企業コード / ID / パスワードを入力ください</h2>-->
                            <table border="0" class="input_table">
                                <tr height="50">
                                    <td style="width: 150px;"><label class="control-label" for="ccode">企業コード: </label></td>
                                    <td>
                                        <input type="text" name="ccode" class="form-control validate[required]" placeholder="company code">
                                    </td>
                                </tr>
                                <tr height="50">
                                    <td style="width: 150px;"><label class="control-label" for="cloginid">ログイン名: </label></td>
                                    <td>
                                        <input type="text" name="cloginid" class="form-control validate[required, custom[email]]" placeholder="login">
                                    </td>
                                </tr>
                                <tr height="50">
                                    <td style="width: 150px;"><label class="control-label" for="cpassword">パスワード: </label></td>
                                    <td>
                                        <input type="password" name="cpassword" class="form-control validate[required]" placeholder="password">
                                    </td>
                                </tr>
                            </table>
                            <input type="hidden" name="loginP" value="<?php print $loginP ?>">

                            <input type="submit" class="btn btn-primary submit-input" value="Login" name="next-b">
                            <input type="submit" class="btn btn-default submit-cancel" value="前に戻る" name="cancel-b">

                            <div style="text-align: center;">
                                <h4 style="margin: 120px auto 20px auto;">会員登録がまだな方はコチラから</h4>
                                <input type="submit" class="btn btn-primary submit-cc-input" value="企業コードをお持ちでない方" name="cc-registry-b">
                                <input type="submit" class="btn btn-primary submit-cm-input" value="企業コードをお持ちの方" name="cm-registry-b">
                            </div>
                            
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>