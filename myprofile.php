<?php
    include "sidemenu.php";

    if(!isset($_SESSION)){ 
        session_start(); 
        $loginid = $_SESSION["loginid"];
        $lname1 = $_SESSION["lname1"];
        $fname1 = $_SESSION["fname1"];
    }
    else{
        $loginid = $_SESSION["loginid"];
        $lname1 = $_SESSION["lname1"];
        $fname1 = $_SESSION["fname1"];
    }

    $pdo = new PDO("mysql:host=localhost; dbname=Connexy_DB; charset=utf8", "root", "");
    $sql = "SELECT UniversityInfo, UniversityFaculty, UniversityDeftInfo, UserAge, UserGrade, UserProfileImage, 
    Profile_age1, Profile_month1, Profile_history1, Profile_age2, Profile_month2, Profile_history2, 
    Profile_age3, Profile_month3, Profile_history3, Profile_age4, Profile_month4, Profile_history4, 
    Profile_age5, Profile_month5, Profile_history5, Profile_age6, Profile_month6, Profile_history6, 
    Profile_age7, Profile_month7, Profile_history7, Profile_age8, Profile_month8, Profile_history8, 
    Profile_age9, Profile_month9, Profile_history9, Profile_age10, Profile_month10, Profile_history10, 
    Profile_appeal, 
    Profile_language1, Profile_lang_level1, 
    Profile_language2, Profile_lang_level2, 
    Profile_language3, Profile_lang_level3 
    FROM User_Properties_C WHERE UserLoginID = :n_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':n_id', $loginid, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($result as $row) {
        $university = $row["UniversityInfo"];
        $universityfac = $row["UniversityFaculty"];
        $universitydept = $row["UniversityDeftInfo"];
        $age = $row["UserAge"];
        $grade = $row["UserGrade"];
        $upflimage = $row["UserProfileImage"];
        
        $plage1 = $row["Profile_age1"];
        $plmon1 = $row["Profile_month1"];
        $plhis1 = $row["Profile_history1"];
        
        if($plage1 == 0){
            $plage1 = null;
        }
        if($plmon1 == 0){
            $plmon1 = null;
        }

        $plage2 = $row["Profile_age2"];
        $plmon2 = $row["Profile_month2"];
        $plhis2 = $row["Profile_history2"];
        
        if($plage2 == 0){
            $plage2 = null;
        }
        if($plmon2 == 0){
            $plmon2 = null;
        }

        $plage3 = $row["Profile_age3"];
        $plmon3 = $row["Profile_month3"];
        $plhis3 = $row["Profile_history3"];

        if($plage3 == 0){
            $plage3 = null;
        }
        if($plmon3 == 0){
            $plmon3 = null;
        }
                
        $plage4 = $row["Profile_age4"];
        $plmon4 = $row["Profile_month4"];
        $plhis4 = $row["Profile_history4"];

        if($plage4 == 0){
            $plage4 = null;
        }
        if($plmon4 == 0){
            $plmon4 = null;
        }

        $plage5 = $row["Profile_age5"];
        $plmon5 = $row["Profile_month5"];
        $plhis5 = $row["Profile_history5"];

        if($plage5 == 0){
            $plage5 = null;
        }
        if($plmon5 == 0){
            $plmon5 = null;
        }

        $plage6 = $row["Profile_age6"];
        $plmon6 = $row["Profile_month6"];
        $plhis6 = $row["Profile_history6"];

        if($plage6 == 0){
            $plage6 = null;
        }
        if($plmon6 == 0){
            $plmon6 = null;
        }

        $plage7 = $row["Profile_age7"];
        $plmon7 = $row["Profile_month7"];
        $plhis7 = $row["Profile_history7"];

        if($plage7 == 0){
            $plage7 = null;
        }
        if($plmon7 == 0){
            $plmon7 = null;
        }

        $plage8 = $row["Profile_age8"];
        $plmon8 = $row["Profile_month8"];
        $plhis8 = $row["Profile_history8"];

        if($plage8 == 0){
            $plage8 = null;
        }
        if($plmon8 == 0){
            $plmon8 = null;
        }

        $plage9 = $row["Profile_age9"];
        $plmon9 = $row["Profile_month9"];
        $plhis9 = $row["Profile_history9"];

        if($plage9 == 0){
            $plage9 = null;
        }
        if($plmon9 == 0){
            $plmon9 = null;
        }

        $plage10 = $row["Profile_age10"];
        $plmon10 = $row["Profile_month10"];
        $plhis10 = $row["Profile_history10"];

        if($plage10 == 0){
            $plage10 = null;
        }
        if($plmon10 == 0){
            $plmon10 = null;
        }

        $plappeal = $row["Profile_appeal"];
        
        $pllang1 = $row["Profile_language1"];
        $pllanglevel1 = $row["Profile_lang_level1"];

        $pllang2 = $row["Profile_language2"];
        $pllanglevel2 = $row["Profile_lang_level2"];

        $pllang3 = $row["Profile_language3"];
        $pllanglevel3 = $row["Profile_lang_level3"];
    }

    /*
    $pdo = new PDO("mysql:host=localhost; dbname=Connexy_DB; charset=utf8", "root", "");
    $sql = "SELECT UniversityInfo, UniversityFaculty, UniversityDeftInfo, UserAge, UserGrade, UserProfileImage FROM User_Properties_C WHERE UserLoginID = :n_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':n_id', $loginid, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($result as $row) {
        $university = $row["UniversityInfo"];
        $universityfac = $row["UniversityFaculty"];
        $universitydept = $row["UniversityDeftInfo"];
        $age = $row["UserAge"];
        $grade = $row["UserGrade"];
        $upflimage = $row["UserProfileImage"];
    }
    */

    $pdo = new PDO("mysql:host=localhost; dbname=Connexy_DB; charset=utf8", "root", "");
    $sql = "SELECT UserLastName, UserFirstName FROM User_Master WHERE UserLoginID = :n_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':n_id', $loginid, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($result as $row) {
        $ulname1 = $row["UserLastName"];
        $ufname1 = $row["UserFirstName"];
    }

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CONNEXY - My Profile</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.1.min.js"></script>
        <script type="text/javascript" src="./js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="./favicon.ico">        
    </head>
    <body>
        
        <div class="sm_container">
            <div class="row">
                <div class="col-xs-12" style="float: left; width:100%; margin: 0 auto;">
                    <div class="labelframe" style="width: 100%; height: 20%; margin-bottom: 30px; background-color: #222; text-align: center; color: white; padding-top: 5px; padding-bottom: 5px; font-size: 18px;">My Profile</div>
                    
                    <!--<h4 style="margin-left: 5%;">My Profile</h4>-->
                    
                    <!-- 画像が選択されていない時 -->
                    <?php if($upflimage == ""): ?>
                        <div class="pull-left col-xs-5 imageipsn" style="padding:0; margin:0 30px 0 5%; width: 300px; height: 220px; border: solid 1px;">
                            <p style="text-align: center; margin-top: 90px; font-size: 20px;">NO IMAGE</p>
                        </div>
                    <!-- 画像が選択されている時 -->
                    <?php else: ?>
                        <img class="pull-left col-xs-5 imageipsn" style="padding:0; margin:0 30px 0 5%; width: 300px; height: 220px;" src="<?php print $upflimage ?>">
                    <?php endif; ?>
                    
                    <table class="table table-striped" style="width: 50%;">
                        <tr><td>名前</td><td><?php print $ulname1 . " " . $ufname1 ?></td></tr>
                        <tr><td>年齢</td><td><?php print $age ?></td></tr>
                        <tr><td>大学名</td><td><?php print $university ?></td></tr>
                        <tr><td>学部名</td><td><?php print $universityfac ?></td></tr>
                        <tr><td>学科名</td><td><?php print $universitydept ?></td></tr>
                        <tr><td>年次</td><td><?php print $grade ?></td></tr>
                        <tr><td></td><td></td></tr>
                    </table>
                </div>
                
                <form action="myprofile_edit.php" method="post" class="form-inline text-center" style="margin-bottom: 30px;">
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-th-large">プロフィールを編集する</span>
                    </button>
                </form>

                <table class="userpfldetail">

                    <div class="userpfldetail-label">
                        <p style="text-align: center;">あなたの学歴について</p>
                    </div>

                    <tr>
                        <td style="width: 100px;">年</td><td style="width: 80px;">月</td><td style="width: 450px;">学歴</td>
                    </tr>
                    
                    <!-- 1つ目 -->
                    <?php if(($plage1 != "") && ($plmon1 != "") && ($plhis1 != "")) : ?>
                        <tr>
                            <td><?php print $plage1 ?></td><td><?php print $plmon1 ?></td><td><?php print $plhis1 ?></td>
                        </tr>
                    <?php endif; ?>

                    <!-- 2つ目 -->
                    <?php if(($plage2 != "") && ($plmon2 != "") && ($plhis2 != "")) : ?>
                        <tr>
                            <td><?php print $plage2 ?></td><td><?php print $plmon2 ?></td><td><?php print $plhis2 ?></td>
                        </tr>
                    <?php endif; ?>

                    <!-- 3つ目 -->
                    <?php if(($plage3 != "") && ($plmon3 != "") && ($plhis3 != "")) : ?>
                        <tr>
                            <td><?php print $plage3 ?></td><td><?php print $plmon3 ?></td><td><?php print $plhis3 ?></td>
                        </tr>
                    <?php endif; ?>

                    <!-- 4つ目 -->
                    <?php if(($plage4 != "") && ($plmon4 != "") && ($plhis4 != "")) : ?>
                        <tr>
                            <td><?php print $plage4 ?></td><td><?php print $plmon4 ?></td><td><?php print $plhis4 ?></td>
                        </tr>
                    <?php endif; ?>

                    <!-- 5つ目 -->
                    <?php if(($plage5 != "") && ($plmon5 != "") && ($plhis5 != "")) : ?>
                        <tr>
                            <td><?php print $plage5 ?></td><td><?php print $plmon5 ?></td><td><?php print $plhis5 ?></td>
                        </tr>
                    <?php endif; ?>

                    <!-- 6つ目 -->
                    <?php if(($plage6 != "") && ($plmon6 != "") && ($plhis6 != "")) : ?>
                        <tr>
                            <td><?php print $plage6 ?></td><td><?php print $plmon6 ?></td><td><?php print $plhis6 ?></td>
                        </tr>
                    <?php endif; ?>

                    <!-- 7つ目 -->
                    <?php if(($plage7 != "") && ($plmon7 != "") && ($plhis7 != "")) : ?>
                        <tr>
                            <td><?php print $plage7 ?></td><td><?php print $plmon7 ?></td><td><?php print $plhis7 ?></td>
                        </tr>
                    <?php endif; ?>

                    <!-- 8つ目 -->
                    <?php if(($plage8 != "") && ($plmon8 != "") && ($plhis8 != "")) : ?>
                        <tr>
                            <td><?php print $plage8 ?></td><td><?php print $plmon8 ?></td><td><?php print $plhis8 ?></td>
                        </tr>
                    <?php endif; ?>

                    <!-- 9つ目 -->
                    <?php if(($plage9 != "") && ($plmon9 != "") && ($plhis9 != "")) : ?>
                        <tr>
                            <td><?php print $plage9 ?></td><td><?php print $plmon9 ?></td><td><?php print $plhis9 ?></td>
                        </tr>
                    <?php endif; ?>
                    
                    <!-- 10つ目 -->
                    <?php if(($plage10 != "") && ($plmon10 != "") && ($plhis10 != "")) : ?>
                        <tr>
                            <td><?php print $plage10 ?></td><td><?php print $plmon10 ?></td><td><?php print $plhis10 ?></td>
                        </tr>
                    <?php endif; ?>

                </table>
                
                
                <div class="userpfldetail-label">
                    <p style="text-align: center;">プロフィールサマリ（あなたの興味があることやアピールポイント）</p>
                </div>

                <div style="max-width: 960px; width: 60%; margin: 0 auto; margin-bottom: 30px;">
                    <textarea cols="85" rows="10" disabled><?php print $plappeal ?></textarea>
                </div>
                
                <!--
                <p style="text-align: center;">プロフィールサマリ（あなたの興味があることやアピールポイント）</p>

                <table style="margin: 0 auto; width: 630px; border: 1px solid #222;">
                    <tr style="text-align: center; height: 30px;"><td style="border: 1px solid #222;">詳細</td></tr>
                    <tr><td style="border: 1px solid #222; padding: 20px;"><?php //print $plappeal ?></td></tr>
                </table>
                -->
                
                <div class="userpfldetail-label">
                    <p style="text-align: center;">言語</p>
                </div>
                
                <!-- 1つ目 -->
                <table class="userpfldetail-lang">

                    <?php if(($pllang1 != "") && ($pllanglevel1 != "")) : ?>
                        <tr><td>言語</td><td>レベル</td></tr>
                        <tr>
                            <td><?php print $pllang1 ?></td>
                            <td class="tdclass">
                                <select>
                                    <option value="" disabled="disabled">選択してください</option>
                                    <option value="0" <? if($pllanglevel1 == 0){print " selected";} ?> disabled="disabled">挨拶レベル</option>
                                    <option value="1" <? if($pllanglevel1 == 1){print " selected";} ?> disabled="disabled">日常会話レベル</option>
                                    <option value="2" <? if($pllanglevel1 == 2){print " selected";} ?> disabled="disabled">ネイティブ</option>
                                </select>
                            </td>
                        </tr>
                    <?php endif; ?>

                    <?php if(($pllang2 != "") && ($pllanglevel2 != "")) : ?>
                        <tr>
                            <td><?php print $pllang2 ?></td>
                            <td class="tdclass">
                                <select>
                                    <option value="" disabled="disabled">選択してください</option>
                                    <option value="0" <? if($pllanglevel2 == 0){print " selected";} ?> disabled="disabled">挨拶レベル</option>
                                    <option value="1" <? if($pllanglevel2 == 1){print " selected";} ?> disabled="disabled">日常会話レベル</option>
                                    <option value="2" <? if($pllanglevel2 == 2){print " selected";} ?> disabled="disabled">ネイティブ</option>
                                </select>
                            </td>
                        </tr>
                    
                    <?php endif; ?>

                    <?php if(($pllang3 != "") && ($pllanglevel3 != "")) : ?>
                        <tr>
                            <td><?php print $pllang3 ?></td>
                            <td class="tdclass">
                                <select>
                                    <option value="" disabled="disabled">選択してください</option>
                                    <option value="0" <? if($pllanglevel3 == 0){print " selected";} ?> disabled="disabled">挨拶レベル</option>
                                    <option value="1" <? if($pllanglevel3 == 1){print " selected";} ?> disabled="disabled">日常会話レベル</option>
                                    <option value="2" <? if($pllanglevel3 == 2){print " selected";} ?> disabled="disabled">ネイティブ</option>
                                </select>
                            </td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>
            <div class="footerdiv">
                <?php include "footer.php" ?>
            </div>
        </div>
        <?php //include "sidemenu.php" ?>
    </body>
</html>