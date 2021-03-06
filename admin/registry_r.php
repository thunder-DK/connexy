<?php
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
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/default.css">
        <script type="text/javascript" src="../js/jquery-1.2.6.min.js"></script>
        <!--<script type="text/javascript" src="./js/masonry.pkgd.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
        <script src="../js/bootstrap.min.js"></script>
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

        <div id="container1" style="margin-top:6.5%;">
            
            <form action="registry_execute.php" method="post">
                
                <div class="form-group has-error">
                        
                    <table border="0" id="input_table" style="height: 100%;">
                        <tr height="50">
                            <td><label style="width: 200px;" class="control-label" for="1ame1">苗字（姓）: </label></td>
                            <td><input style="width: 500px;" type="text" name="lname1" value="" class="form-control" placeholder="山田（例）" size="100"></td>
                        </tr>
                        <tr height="50">
                            <td><label class="control-label" for="fname1">名前（名）: </label></td>
                            <td><input style="width: 500px;" type="text" name="fname1" class="form-control" placeholder="太郎（例）" size="50" value=""></td>
                        </tr>
                        <tr height="50">
                            <td><label class="control-label" for="lname2">苗字（姓【カナ】）</label></td>
                            <td><input style="width: 500px;" type="text" name="lname2" class="form-control" placeholder="ヤマダ（例）" size="100" value=""></td>
                        </tr>
                        <tr height="50">
                            <td><label class="control-label" for="fname2">名前（名【カナ】）: </label></td>
                            <td><input style="width: 500px;" type="text" name="fname2" class="form-control" placeholder="タロウ（例）" size="100" value=""></td>
                        </tr>
                        <tr height="50">
                            <td><label class="control-label" for="name2">性別: </label></td>
                            <td>
                                <select name="sex" style="width: 120px; height: 100px;" class="select">
                                    <option value="">選択してください</option>
                                    <option value="m">男性</option>
                                    <option value="w">女性</option>
                                </select>
                            </td>
                        </tr>
                        <tr height="50">
                            <td><label class="control-label" for="university">大学名: </label></td>
                            <td><input style="width: 500px;" type="text" name="university" class="form-control" placeholder="" size="100" value=""></td>
                        </tr>
                        <tr height="50">
                            <td><label class="control-label" for="department">学部名: </label></td>
                            <td><input style="width: 500px;" type="text" name="department" class="form-control" placeholder="" size="100" value=""></td>
                        </tr>
                        <tr height="50">
                            <td><label class="control-label" for="age">年齢（歳）: </label></td>
                            <td>
                                <select name="age" style="width: 120px; height: 100px;">
                                    <option value="">選択してください</option>
                                    <option value="age01">18歳</option>
                                    <option value="age02">19歳</option>
                                    <option value="age03">20歳</option>
                                    <option value="age04">21歳</option>
                                    <option value="age05">22歳</option>
                                    <option value="age06">23歳</option>
                                    <option value="age07">24歳</option>
                                    <option value="age08">25歳</option>
                                    <option value="age09">26歳</option>
                                    <option value="age10">27歳</option>
                                    <option value="age11">28歳</option>
                                    <option value="age12">29歳</option>
                                    <option value="age13">30歳</option>
                                </select>
                            </td>
                        </tr>
                        <tr height="50">
                            <td><label class="control-label" for="grade">年次（何年生）: </label></td>
                            <td>
                                <select name="grade" style="width: 120px; height: 100px;">
                                    <option value="">選択してください</option>
                                    <option value="grade01">1年生</option>
                                    <option value="grade02">2年生</option>
                                    <option value="grade03">3年生</option>
                                    <option value="grade04">4年生</option>
                                    <option value="grade05">大学院1年生</option>
                                    <option value="grade06">大学院2年生</option>
                                    <option value="grade07">大学院3年生</option>
                                    <option value="grade08">大学院4年生</option>
                                </select>
                            </td>
                        </tr>
                        <tr height="50">
                            <td><label class="control-label" for="mailaddress">メールアドレス: </label></td>
                            <td><input style="width: 500px;" type="text" name="maddress" class="form-control" placeholder="loginid" size="100" value=""></td>
                        </tr>
                        <tr height="50">
                            <td><label class="control-label" for="password">パスワード: </label></td>
                            <td><input style="width: 500px;" type="password" name="password" class="form-control" placeholder="password" size="100" value=""></td>
                        </tr>
                        <tr height="50">
                            <td><label class="control-label" for="pcode">郵便番号: </label></td>
                            <td><input style="width: 500px;" type="text" name="pcode" class="form-control" placeholder="" size="100" value=""></td>
                        </tr>
                        <tr height="50">
                            <td><label class="control-label" for="address">住所: </label></td>
                            <td><input style="width: 500px;" type="text" name="address" class="form-control" placeholder="" size="100" value=""></td>
                        </tr>
                        <input type="hidden" name="loginP" value="<?php print $loginP ?>">
                    </table>
                    <input type="submit" class="btn btn-primary" width=100 value="登録" id="submit-input" name="next-b">
                    <input type="submit" class="btn btn-default" width=100 value="前に戻る" id="submit-cancel" name="cancel-b">
                        
                </div>
            </form>
        </div>
    </body>
</html>
                    
                    
                    <!--
                    <table border="0" id="input_table">
                        <tr height="50">
                            <td style="width: 80px;"><label class="control-label" for="1ame1">苗字（姓）: </label></td>
                            <td style="width: 30%;"><input type="text" name="lname1" value="" class="form-control" placeholder="山田（例）" size="100"></td>
                            <td style="width: 80px;"><label style="margin-left:40px;" class="control-label" for="fname1">名前（名）: </label></td>
                            <td style="width: 30%;"><input type="text" name="fname1" class="form-control" placeholder="太郎（例）" size="50" value=""></td>
                        </tr>
                        <tr height="50">
                            <td><label class="control-label" for="lname2">苗字（姓【カナ】）</label></td>
                            <td width="100"><input type="text" name="lname2" class="form-control" placeholder="ヤマダ（例）" size="100" value=""></td>
                            <td><label style="margin-left:40px;" class="control-label" for="fname2">名前（名【カナ】）: </label></td>
                            <td width="100"><input type="text" name="fname2" class="form-control" placeholder="タロウ（例）" size="100" value=""></td>
                        </tr>
                        <tr height="50">
                            <td><label class="control-label" for="name2">性別: </label></td>
                            <td>
                                <select name="sex" style="width: 120px; height: 100px;" class="select">
                                    <option value="">選択してください</option>
                                    <option value="m">男性</option>
                                    <option value="w">女性</option>
                                </select>
                            </td>
                        </tr>
                        <tr height="50">
                            <td><label class="control-label" for="university">大学名: </label></td>
                            <td width="100"><input type="text" name="university" class="form-control" placeholder="" size="100" value=""></td>
                            <td><label style="margin-left: 40px;" class="control-label" for="department">学部名: </label></td>
                            <td width="100"><input type="text" name="department" class="form-control" placeholder="" size="100" value=""></td>
                        </tr>
                        <tr height="50">
                            <td><label class="control-label" for="age">年齢（歳）: </label></td>
                            <td>
                                <select name="age" style="width: 120px; height: 100px;">
                                    <option value="">選択してください</option>
                                    <option value="age01">18歳</option>
                                    <option value="age02">19歳</option>
                                    <option value="age03">20歳</option>
                                    <option value="age04">21歳</option>
                                    <option value="age05">22歳</option>
                                    <option value="age06">23歳</option>
                                    <option value="age07">24歳</option>
                                    <option value="age08">25歳</option>
                                    <option value="age09">26歳</option>
                                    <option value="age10">27歳</option>
                                    <option value="age11">28歳</option>
                                    <option value="age12">29歳</option>
                                    <option value="age13">30歳</option>
                                </select>
                            </td>
                            <td><label style="margin-left: 40px;" class="control-label" for="grade">年次（何年生）: </label></td>
                            <td>
                                <select name="grade" style="width: 120px; height: 100px;">
                                    <option value="">選択してください</option>
                                    <option value="grade01">1年生</option>
                                    <option value="grade02">2年生</option>
                                    <option value="grade03">3年生</option>
                                    <option value="grade04">4年生</option>
                                    <option value="grade05">大学院1年生</option>
                                    <option value="grade06">大学院2年生</option>
                                    <option value="grade07">大学院3年生</option>
                                    <option value="grade08">大学院4年生</option>
                                </select>
                            </td>
                        </tr>
                        <tr height="50">
                            <td><label class="control-label" for="mailaddress">メールアドレス: </label></td>
                            <td width="100"><input type="text" name="maddress" class="form-control" placeholder="loginid" size="100" value=""></td>
                            <td><label style="margin-left: 40px;" class="control-label" for="password">パスワード: </label></td>
                            <td width="100"><input type="password" name="password" class="form-control" placeholder="password" size="100" value=""></td>
                        </tr>
                        <tr height="50">
                            <td><label class="control-label" for="pcode">郵便番号: </label></td>
                            <td width="100"><input type="text" name="pcode" class="form-control" placeholder="" size="100" value=""></td>
                        </tr>
                    </table>
                    <table>
                        <tr height="50">
                            <td width="175"><label class="control-label" for="address">住所: </label></td>
                            <td width="800"><input type="text" name="address" class="form-control" placeholder="" size="100" value=""></td>
                        </tr>
                    </table>
                        
                    <input type="submit" class="btn btn-primary" width=100 value="登録" id="submit-input" name="next-b">
                    <input type="submit" class="btn btn-default" width=100 value="前に戻る" id="submit-cancel" name="cancel-b">
                        
                </div>
            </form>
        </div>
    </body>
</html>
-->