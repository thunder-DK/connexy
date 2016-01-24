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
        <title>Connexy - 会員登録</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/default.css">
        <link rel="stylesheet" href="../css/style.css">

        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.1.min.js"></script>        
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/jquery.validationEngine.js"></script>
        <script type="text/javascript" src="../js/jquery.validationEngine-ja.js"></script>
        <link rel="stylesheet" href="../css/validationEngine.jquery.css">
        <script type="text/javascript">
            jQuery(document).ready(function($){
                jQuery('#sendform').validationEngine();
                jQuery('.submit-cancel').click(function(){
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

        <div class="container" style="margin-top:6.5%;">
            <form name="n_registry" action="registry_execute.php" method="post" id="sendform">
                <div class="form-group has-error">

                    <!-- 就活生向けの登録 -->
                    <?php if($loginP == "r"): ?>
                        <table border="0" class="input_table">
                            <tr height="50">
                                <td><label style="width: 200px;" class="control-label" for="lname1">苗字（姓）: </label></td>
                                <td><input style="width: 500px;" type="text" name="lname1" value="" class="form-control validate[required]" placeholder="山田（例）" size="100"></td>
                            </tr>
                            <tr height="50">
                                <td><label class="control-label" for="fname1">名前（名）: </label></td>
                                <td><input style="width: 500px;" type="text" name="fname1" class="form-control validate[required]" placeholder="太郎（例）" size="50"></td>
                            </tr>
                            <tr height="50">
                                <td><label class="control-label" for="lname2">苗字（姓【カナ】）</label></td>
                                <td><input style="width: 500px;" type="text" name="lname2" class="form-control validate[required]" placeholder="ヤマダ（例）" size="100"></td>
                            </tr>
                            <tr height="50">
                                <td><label class="control-label" for="fname2">名前（名【カナ】）: </label></td>
                                <td><input style="width: 500px;" type="text" name="fname2" class="form-control validate[required]" placeholder="タロウ（例）" size="100"></td>
                            </tr>
                            <tr height="50">
                                <td><label class="control-label" for="name2">性別: </label></td>
                                <td>
                                    <select name="sex" style="width: 120px; height: 100px;" class="select validate[required]">
                                        <option value="">選択してください</option>
                                        <option value="man">男性</option>
                                        <option value="womam">女性</option>
                                    </select>
                                </td>   
                            </tr>
                            <tr height="50">
                                <td><label class="control-label" for="university">大学名: </label></td>
                                <td><input style="width: 500px;" type="text" name="university" class="form-control validate[required]" placeholder="" size="100"></td>
                            </tr>
                            <tr height="50">
                                <td><label class="control-label" for="faculty">学部名: </label></td>
                                <td><input style="width: 500px;" type="text" name="faculty" class="form-control validate[required]" placeholder="" size="100"></td>
                            </tr>
                            <tr height="50">
                                <td><label class="control-label" for="department">学科名: </label></td>
                                <td><input style="width: 500px;" type="text" name="department" class="form-control" placeholder="" size="100"></td>
                            </tr>
                            <tr height="50">
                                <td><label class="control-label" for="age">年齢（歳）: </label></td>
                                <td>
                                    <select name="age" style="width: 120px; height: 100px;" class="select validate[required]">
                                        <option value="">選択してください</option>
                                        <option value="18">18歳</option>
                                        <option value="19">19歳</option>
                                        <option value="20">20歳</option>
                                        <option value="21">21歳</option>
                                        <option value="22">22歳</option>
                                        <option value="23">23歳</option>
                                        <option value="24">24歳</option>
                                        <option value="25">25歳</option>
                                        <option value="26">26歳</option>
                                        <option value="27">27歳</option>
                                        <option value="28">28歳</option>
                                        <option value="29">29歳</option>
                                        <option value="30">30歳</option>
                                    </select>
                                </td>
                            </tr>
                            <tr height="50">
                                <td><label class="control-label" for="grade">年次（何年生）: </label></td>
                                <td>
                                    <select name="grade" style="width: 120px; height: 100px;" class="select validate[required]">
                                        <option value="">選択してください</option>
                                        <option value="1">1年生</option>
                                        <option value="2">2年生</option>
                                        <option value="3">3年生</option>
                                        <option value="4">4年生</option>
                                        <option value="5">大学院1年生</option>
                                        <option value="6">大学院2年生</option>
                                        <option value="7">大学院3年生</option>
                                        <option value="8">大学院4年生</option>
                                    </select>
                                </td>
                            </tr>
                            <tr height="50">
                                <td><label class="control-label" for="pcode">郵便番号: </label></td>
                                <td><input style="width: 500px;" type="text" name="pcode" class="form-control validate[required]" placeholder="" size="100"></td>
                            </tr>
                            <tr height="50">
                                <td><label class="control-label" for="address">住所: </label></td>
                                <td><input style="width: 500px;" type="text" name="address" class="form-control validate[required]" placeholder="" size="100"></td>
                            </tr>

                            <tr height="50">
                                <td><label class="control-label" for="mailaddress">メールアドレス: </label></td>
                                <td><input style="width: 500px;" type="text" name="maddress" class="form-control validate[required, custom[email]]" placeholder="loginid" size="100"></td>
                            </tr>
                            <tr height="50">
                                <td><label class="control-label" for="password">パスワード: </label></td>
                                <td><input style="width: 500px;" type="password" name="password" class="form-control validate[required]" placeholder="password" size="100"></td>
                            </tr>
                            <tr height="50">
                                <td><label class="control-label" for="password2">パスワード（確認用）: </label></td>
                                <td><input style="width: 500px;" type="password" name="password2" class="form-control validate[required]" placeholder="password（確認用）" size="100"></td>
                            </tr>    
                            <input type="hidden" name="loginP" value="<?php print $loginP ?>">
                        </table>
                        <div style="margin-bottom: 10%;">
                            <input type="submit" class="btn btn-primary submit-input" width=100 value="登録" name="next-b">
                            <input type="submit" class="btn btn-default submit-cancel" width=100 value="前に戻る" name="cancel-b">
                        </div>
                        
                    <!-- 企業向けの登録 -->
                    <!-- 企業コードから新規に登録する場合 -->
                    <?php elseif($loginP == "cc"): ?>
                        <fieldset style="margin-bottom: 3%;">
                            <legend style="text-align: center;">貴社情報について</legend>
                            <table border="0" class="input_table">
                                <tr height="50">
                                    <td><label style="width: 180px;" class="control-label" for="cname">貴社名: </label></td>
                                    <td><input style="width: 500px;" type="text" name="cname" value="" class="form-control validate[required]"  size="100"></td>
                                </tr>
                                <tr height="50">
                                    <td><label class="control-label" for="caddress">所在地：</label></td>
                                    <td><input style="width: 500px;" type="text" name="caddress" class="form-control validate[required]" size="100"></td>
                                </tr>
                                <tr height="50">
                                    <td><label class="control-label" for="curl">貴社URL: </label></td>
                                    <td><input style="width: 500px;" type="text" name="curl" class="form-control validate[required]" size="50"></td>
                                </tr>
                            </table>
                        </fieldset>

                        <fieldset>
                            <legend style="text-align: center;">御担当者様情報について</legend>
                            <table border="0" class="input_table">
                                <tr height="50">
                                    <td><label style="width: 180px;" class="control-label" for="cmlname1">苗字（姓）: </label></td>
                                    <td><input style="width: 500px;" type="text" name="cmlname1" value="" class="form-control validate[required]" placeholder="山田（例）" size="100"></td>
                                </tr>
                                <tr height="50">
                                    <td><label class="control-label" for="cmfname1">名前（名）: </label></td>
                                    <td><input style="width: 500px;" type="text" name="cmfname1" class="form-control validate[required]" placeholder="太郎（例）" size="50"></td>
                                </tr>
                                <tr height="50">
                                    <td><label class="control-label" for="cmlname2">苗字（姓【カナ】）</label></td>
                                    <td><input style="width: 500px;" type="text" name="cmlname2" class="form-control validate[required]" placeholder="ヤマダ（例）" size="100"></td>
                                </tr>
                                <tr height="50">
                                    <td><label class="control-label" for="cmfname2">名前（名【カナ】）: </label></td>
                                    <td><input style="width: 500px;" type="text" name="cmfname2" class="form-control validate[required]" placeholder="タロウ（例）" size="100"></td>
                                </tr>
                                <tr height="50">
                                    <td><label class="control-label" for="cmdept">所属部署: </label></td>
                                    <td><input style="width: 500px;" type="text" name="cmdept" value="" class="form-control validate[required]"  size="100"></td>
                                </tr>
                                <tr height="50">
                                    <td><label class="control-label" for="cmpost">役職: </label></td>
                                    <td><input style="width: 500px;" type="text" name="cmpost" value="" class="form-control validate[required]"  size="100"></td>
                                </tr>
                                <tr height="50">
                                    <td><label class="control-label" for="cmloginid">メールアドレス: </label></td>
                                    <td><input style="width: 500px;" type="text" name="cmloginid" value="" class="form-control validate[required, custom[email]]"  size="100"></td>
                                </tr>
                                <tr height="50">
                                    <td><label class="control-label" for="cmpassword">パスワード: </label></td>
                                    <td><input style="width: 500px;" type="password" name="cmpassword" value="" class="form-control validate[required]"  size="100"></td>
                                </tr>
                                <tr height="50">
                                    <td><label class="control-label" for="cmpassword2">パスワード（確認用）: </label></td>
                                    <td><input style="width: 500px;" type="password" name="cmpassword2" value="" class="form-control validate[required]"  size="100"></td>
                                </tr>
                            </table>
                        </fieldset>
                        <input type="hidden" name="loginP" value="<?php print $loginP ?>">
                        <div style="margin-bottom: 10%;">
                            <input type="submit" class="btn btn-primary submit-input" width=100 value="登録" name="next-b">
                            <input type="submit" class="btn btn-default submit-cancel" width=100 value="前に戻る" name="cancel-b">
                        </div>
                    
                    <!-- 企業コードを既に登録済みで担当者レベルで登録する場合 -->
                    <?php elseif($loginP == "cm"): ?>
                        <fieldset style="margin-bottom: 3%;">
                            <legend style="text-align: center;">貴社情報について</legend>
                            <table border="0" class="input_table">
                                <tr height="50">
                                    <td><label style="width: 180px;" class="control-label" for="ccode">企業コード: </label></td>
                                    <td><input style="width: 500px;" type="text" name="ccode" value="" class="form-control validate[required]"  size="100"></td>
                                </tr>
                            </table>
                        </fieldset>

                        <fieldset>
                            <legend style="text-align: center;">御担当者様情報について</legend>
                            <table border="0" class="input_table">
                                <tr height="50">
                                    <td><label style="width: 180px;" class="control-label" for="cmlname1">苗字（姓）: </label></td>
                                    <td><input style="width: 500px;" type="text" name="cmlname1" value="" class="form-control validate[required]" placeholder="山田（例）" size="100"></td>
                                </tr>
                                <tr height="50">
                                    <td><label class="control-label" for="cmfname1">名前（名）: </label></td>
                                    <td><input style="width: 500px;" type="text" name="cmfname1" class="form-control validate[required]" placeholder="太郎（例）" size="50"></td>
                                </tr>
                                <tr height="50">
                                    <td><label class="control-label" for="cmlname2">苗字（姓【カナ】）</label></td>
                                    <td><input style="width: 500px;" type="text" name="cmlname2" class="form-control validate[required]" placeholder="ヤマダ（例）" size="100"></td>
                                </tr>
                                <tr height="50">
                                    <td><label class="control-label" for="cmfname2">名前（名【カナ】）: </label></td>
                                    <td><input style="width: 500px;" type="text" name="cmfname2" class="form-control validate[required]" placeholder="タロウ（例）" size="100"></td>
                                </tr>
                                <tr height="50">
                                    <td><label class="control-label" for="cmdept">所属部署: </label></td>
                                    <td><input style="width: 500px;" type="text" name="cmdept" value="" class="form-control validate[required]"  size="100"></td>
                                </tr>
                                <tr height="50">
                                    <td><label class="control-label" for="cmpost">役職: </label></td>
                                    <td><input style="width: 500px;" type="text" name="cmpost" value="" class="form-control"  size="100"></td>
                                </tr>
                                <tr height="50">
                                    <td><label class="control-label" for="cmloginid">メールアドレス: </label></td>
                                    <td><input style="width: 500px;" type="text" name="cmloginid" value="" class="form-control validate[required, custom[email]]"  size="100"></td>
                                </tr>
                                <tr height="50">
                                    <td><label class="control-label" for="cmpassword">パスワード: </label></td>
                                    <td><input style="width: 500px;" type="password" name="cmpassword" value="" class="form-control validate[required]"  size="100"></td>
                                </tr>
                                <tr height="50">
                                    <td><label class="control-label" for="cmpassword2">パスワード（確認用）: </label></td>
                                    <td><input style="width: 500px;" type="password" name="cmpassword2" value="" class="form-control validate[required]"  size="100"></td>
                                </tr>
                            </table>
                        </fieldset>
                        <input type="hidden" name="loginP" value="<?php print $loginP ?>">
                        <div style="margin-bottom: 10%;">
                            <input type="submit" class="btn btn-primary submit-input" width=100 value="登録" name="next-b">
                            <input type="submit" class="btn btn-default submit-cancel" width=100 value="前に戻る" name="cancel-b">
                        </div>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </body>
</html>