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

    /*
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
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script type="text/javascript" src="./js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="./favicon.ico">

        <style>
            #imagespace{
                width: 300px;
                height: 200px;
                border: solid 1px;
                font-size: 20px; 
            }
            
            #edit-table th{
                text-align: center;
            }
            
            #edit-table tr{
                height: 30px;
            }
        </style>
        
        <!--
        <script>
            (function(documet){
                $(document).ready(function(){
                     $("#edit-table > tbody > tr > td").click(edit_toggle());
                });

                function edit_toggle(){
                    var edit_flag=false;
                    return function(){
                        if(edit_flag) return;
                        var $input = $("<input>").attr("type","text").val($(this).text());
                        $(this).html($input); 

                        $("input", this).focus().blur(function(){
                            $(this).after($(this).val()).unbind().remove();
                            edit_flag = false;
                        });
                        edit_flag = true;
                    }
                }
            })(document);
        </script>
        -->
        
        <script>
            function submitStop(e){
                if (!e) var e = window.event;

                if(e.keyCode == 13)
                    return false;
            }
        </script>

        <!--
        <script>
            $(function(){
                $("input[type=submit]").click(function(){
                    $("form").submit();
                });
            });
        </script>
        -->
    </head>
    <body>
        <div class="sm_container" style="padding-left: 3%; padding-right: 2.5%;">
            <div class="row">
                <div class="col-xs-12" style="float: left; margin: 0 auto;">

                    <div class="labelframe" style="width: 100%; height: 20%; margin-bottom: 30px; background-color: #a9a9a9; text-align: center; color: white; padding-top: 5px; padding-bottom: 5px; font-size: 18px;">My Profile - 編集用画面</div>
                    <!-- #6b6bff -->

                    <form action="myprofile_edit_execute.php" method="post" class="form-inline text-center" enctype="multipart/form-data">
                        <div class="pull-left col-xs-5" style="padding:0; margin:0 30px 0 5%; width: 300px; height: 220px;" id="previewimage">

                            <!-- 画像を選択するボタンの表示 -->
                            <input type="file" accept="image/*" name="profile-image" style="margin-bottom: 5px;">

                            <!-- 画像が選択されていない時 -->
                            <?php if($upflimage == ""): ?>
                                <div id="gallery">
                                    <p id="imagespace" class="imageipsn"></p>
                                </div>
                                <div id="reset" style="display: none;">
                                </div>

                            <!-- 画像が選択されている時 -->
                            <?php else: ?>
                                <img style="width: 300px; height: 200px;" src="<?php print $upflimage ?>" class="imageipsn">
                            <?php endif; ?>
                        </div>

                        <table class="table table-striped" style="width: 50%;">
                            <tr>
                                <td>名前</td>
                                <td>
                                    <input type="text" value="<?php print $ulname1 ?>" size="15" name="lname1" onKeyPress="return submitStop(event);"> <input type="text" value="<?php print $ufname1 ?>" size="15" name="fname1" onKeyPress="return submitStop(event);">
                                </td>
                            </tr>
                            <tr>
                                <td>年齢</td>
                                <td>
                                    <input type="text" value="<?php print $age ?>" size="32" name="age" onKeyPress="return submitStop(event);">
                                </td>
                            </tr>
                            <tr>
                                <td>大学名</td>
                                <td>
                                    <input type="text" value="<?php print $university ?>" size="32" name="university" onKeyPress="return submitStop(event);">
                                </td>
                            </tr>
                            <tr>
                                <td>学部名</td>
                                <td>
                                    <input type="text" value="<?php print $universityfac ?>" size="32" name="faculty" onKeyPress="return submitStop(event);">
                                </td>
                            </tr>
                            <tr>
                                <td>学科名</td>
                                <td>
                                    <input type="text" value="<?php print $universitydept ?>" size="32" name="dept" onKeyPress="return submitStop(event);">
                                </td>
                            </tr>
                            <tr>
                                <td>年次</td>
                                <td>
                                    <input type="text" value="<?php print $grade ?>" size="32" name="grade" onKeyPress="return submitStop(event);">
                                </td>
                            </tr>
                            <tr><td></td><td></td></tr>
                            
                            <!-- original
                            <tr><td>名前</td><td><?//php print $lname1 . " " . $fname1 ?></td></tr>
                            <tr><td>年齢</td><td><?//php print $age ?></td></tr>
                            <tr><td>大学名</td><td><?//php print $university ?></td></tr>
                            <tr><td>学部名</td><td><?//php print $universityfac ?></td></tr>
                            <tr><td>学科名</td><td><?//php print $universitydept ?></td></tr>
                            <tr><td>年次</td><td><?//php print $grade ?></td></tr>
                            <tr><td></td><td></td></tr>
                            -->
                        </table>
                        
                        <div style="margin-bottom: 30px;">
                            <a href="./myprofile_edit.php#profile-history">
                                <input type="button" class="btn btn-defalut" value="履歴" style="width: 150px;">
                            </a>
                            <a href="./myprofile_edit.php#profile-appeal">
                                <input type="button" class="btn btn-defalut" value="ポートフォリオ" style="width: 150px;">
                            </a>
                            <input type="button" class="btn btn-defalut" value="作品" style="width: 150px;">
                            <a href="./myprofile_edit.php#profile-language">
                                <input type="button" class="btn btn-defalut" value="言語" style="width: 150px;">
                            </a>
                        </div>

                        <div class="profile-history" id="profile-history" style="max-width: 960px; width: 60%; margin: 0 auto; margin-bottom: 30px;">
                            <p>あなたの今までの学歴を入力してください</p>
                            
                            <table class="table table-bordered col-md-6" style="font-size:12px;">
                                <thead style="height: 20px;">
                                    <tr style="font-size: 10;">
                                        <th class="col-md-3" style="text-align: center;">年</th>
                                        <th class="col-md-3" style="text-align: center;">月</th>
                                        <th class="col-md-3" style="text-align: center;">学歴</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- 履歴書 1項目目-->
                                    <tr>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="8" name="pfage1" onKeyPress="return submitStop(event);" value="<?php print $plage1 ?>">
                                        </td>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="5" name="pfmon1" onKeyPress="return submitStop(event);" value="<?php print $plmon1 ?>">
                                        </td>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="45" name="pfhis1" onKeyPress="return submitStop(event);" value="<?php print $plhis1 ?>">
                                        </td>
                                    </tr>

                                    <!-- 履歴書 2項目目-->
                                    <tr>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="8" name="pfage2" onKeyPress="return submitStop(event);" value="<?php print $plage2 ?>">
                                        </td>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="5" name="pfmon2" onKeyPress="return submitStop(event);" value="<?php print $plmon2 ?>">
                                        </td>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="45" name="pfhis2" onKeyPress="return submitStop(event);" value="<?php print $plhis2 ?>">
                                        </td>
                                    </tr>

                                    <!-- 履歴書 3項目目-->
                                    <tr>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="8" name="pfage3" onKeyPress="return submitStop(event);" value="<?php print $plage3 ?>">
                                        </td>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="5" name="pfmon3" onKeyPress="return submitStop(event);" value="<?php print $plmon3 ?>">
                                        </td>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="45" name="pfhis3" onKeyPress="return submitStop(event);" value="<?php print $plhis3 ?>">
                                        </td>
                                    </tr>

                                    <!-- 履歴書 4項目目-->
                                    <tr>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="8" name="pfage4" onKeyPress="return submitStop(event);" value="<?php print $plage4 ?>">
                                        </td>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="5" name="pfmon4" onKeyPress="return submitStop(event);" value="<?php print $plmon4 ?>">
                                        </td>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="45" name="pfhis4" onKeyPress="return submitStop(event);" value="<?php print $plhis4 ?>">
                                        </td>
                                    </tr>
                                    
                                    <!-- 履歴書 5項目目-->
                                    <tr>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="8" name="pfage5" onKeyPress="return submitStop(event);" value="<?php print $plage5 ?>">
                                        </td>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="5" name="pfmon5" onKeyPress="return submitStop(event);" value="<?php print $plmon5 ?>">
                                        </td>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="45" name="pfhis5" onKeyPress="return submitStop(event);" value="<?php print $plhis5 ?>">
                                        </td>
                                    </tr>
                                    
                                    <!-- 履歴書 6項目目-->
                                    <tr>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="8" name="pfage6" onKeyPress="return submitStop(event);" value="<?php print $plage6 ?>">
                                        </td>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="5" name="pfmon6" onKeyPress="return submitStop(event);" value="<?php print $plmon6 ?>">
                                        </td>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="45" name="pfhis6" onKeyPress="return submitStop(event);" value="<?php print $plhis6 ?>">
                                        </td>
                                    </tr>
                                    
                                    <!-- 履歴書 7項目目-->
                                    <tr>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="8" name="pfage7" onKeyPress="return submitStop(event);" value="<?php print $plage7 ?>">
                                        </td>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="5" name="pfmon7" onKeyPress="return submitStop(event);" value="<?php print $plmon7 ?>">
                                        </td>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="45" name="pfhis7" onKeyPress="return submitStop(event);" value="<?php print $plhis7 ?>">
                                        </td>
                                    </tr>
                                    
                                    <!-- 履歴書 8項目目-->
                                    <tr>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="8" name="pfage8" onKeyPress="return submitStop(event);" value="<?php print $plage8 ?>">
                                        </td>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="5" name="pfmon8" onKeyPress="return submitStop(event);" value="<?php print $plmon8 ?>">
                                        </td>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="45" name="pfhis8" onKeyPress="return submitStop(event);" value="<?php print $plhis8 ?>">
                                        </td>
                                    </tr>
                                    
                                    <!-- 履歴書 9項目目-->
                                    <tr>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="8" name="pfage9" onKeyPress="return submitStop(event);" value="<?php print $plage9 ?>">
                                        </td>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="5" name="pfmon9" onKeyPress="return submitStop(event);" value="<?php print $plmon9 ?>">
                                        </td>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="45" name="pfhis9" onKeyPress="return submitStop(event);" value="<?php print $plhis9 ?>">
                                        </td>
                                    </tr>
                                    
                                    <!-- 履歴書 10項目目-->
                                    <tr>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="8" name="pfage10" onKeyPress="return submitStop(event);" value="<?php print $plage10 ?>">
                                        </td>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="5" name="pfmon10" onKeyPress="return submitStop(event);" value="<?php print $plmon10 ?>">
                                        </td>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" size="45" name="pfhis10" onKeyPress="return submitStop(event);" value="<?php print $plhis10 ?>">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            
                            <!--
                            <table id="edit-table" border="1px solid #222">
                                <tr style="text-align: center;">
                                    <th style="width: 120px;">年</th>
                                    <th style="width: 80px;">月</th>
                                    <th style="width: 500px;">学歴</th>
                                </tr>
                                <tr>
                                    <td></td><td></td><td></td>
                                </tr>
                                <tr>
                                    <td></td><td></td><td></td>
                                </tr>
                                <tr>
                                    <td></td><td></td><td></td>
                                </tr>
                                <tr>
                                    <td></td><td></td><td></td>
                                </tr>
                                <tr>
                                    <td></td><td></td><td></td>
                                </tr>
                                <tr>
                                    <td></td><td></td><td></td>
                                </tr>
                                <tr>
                                    <td></td><td></td><td></td>
                                </tr>
                                <tr>
                                    <td></td><td></td><td></td>
                                </tr>
                                <tr>
                                    <td></td><td></td><td></td>
                                </tr>
                            </table>
                            -->

                        </div>
                        
                        <div id="profile-appeal" style="max-width: 960px; width: 60%; margin: 0 auto; margin-bottom: 30px;">
                            <p>あなたのアピールポイントを入力してください</p>
                            <textarea name="profile-appeal" cols="75" rows="10"><?php print $plappeal ?></textarea>
                        </div>
                        
                        <div id="profile-language" style="max-width: 960px; width: 60%; margin: 0 auto; margin-bottom: 50px;">
                            <p>言語</p>
                            <table class="table table-bordered col-md-6" style="font-size:12px;">
                                <thead>
                                    <tr style="font-size: 10;">
                                        <th class="col-md-3" style="text-align: center;">言語</th>
                                        <th class="col-md-3" style="text-align: center;">レベル</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- 1項目目-->
                                    <tr>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" name="pflang1-1" value="<?php print $pllang1 ?>">
                                        </td>
                                        <td class="tdclass">
                                            <select name="pflang1-2">
                                                <option value="">選択してください</option>
                                                <option value="0" <? if($pllanglevel1 == 0){print " selected";} ?>>挨拶レベル</option>
                                                <option value="1" <? if($pllanglevel1 == 1){print " selected";} ?>>日常会話レベル</option>
                                                <option value="2" <? if($pllanglevel1 == 2){print " selected";} ?>>ネイティブ</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <!-- 2項目目-->
                                    <tr>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" name="pflang2-1" value="<?php print $pllang2 ?>">
                                        </td>
                                        <td class="tdclass">
                                            <select name="pflang2-2">
                                                <option value="">選択してください</option>
                                                <option value="0" <? if($pllanglevel2 == 0){print " selected";} ?>>挨拶レベル</option>
                                                <option value="1" <? if($pllanglevel2 == 1){print " selected";} ?>>日常会話レベル</option>
                                                <option value="2" <? if($pllanglevel2 == 2){print " selected";} ?>>ネイティブ</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <!-- 3項目目-->
                                    <tr>
                                        <td class="tdclass">
                                            <input type="text" class="form-control intable" name="pflang3-1" value="<?php print $pllang3 ?>">
                                        </td>
                                        <td class="tdclass">
                                            <select name="pflang3-2">
                                                <option value="">選択してください</option>
                                                <option value="0" <? if($pllanglevel3 == 0){print " selected";} ?>>挨拶レベル</option>
                                                <option value="1" <? if($pllanglevel3 == 1){print " selected";} ?>>日常会話レベル</option>
                                                <option value="2" <? if($pllanglevel3 == 2){print " selected";} ?>>ネイティブ</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <input type="hidden" name="loginid" value="<?php print $loginid ?>">
                        <button type="submit" class="btn btn-primary" style="margin-bottom: 30px; width: 250px; margin-right: 5px" name="update-b">
                            <span>プロフィールを編集を完了する</span>
                        </button>
                        <button type="submit" class="btn btn-defalt" style="margin-bottom: 30px; width: 250px; margin-left: 5px;" name="cancel-b">
                            <span>前画面に戻る</span>
                        </button>

                    </form>
                </div>
                <?php include "footer.php" ?>
            </div>

            <script type="text/javascript" src="./js/jquery.iPreview.min.js"></script>
            <script>
                $("input[type=file]").iPreview({
                    target: "#gallery",
                    /*css: {
                        margin: "5px",
                        maxWidth: "auto",
                        maxHeight: "100px"
                    },*/
                    hideOnPreview: "#imagespace",
                    showOnPreview: "#reset"
                });
            </script>
        </div>
    </body>
</html>