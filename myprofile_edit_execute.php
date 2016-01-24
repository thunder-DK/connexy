<?php

    // 更新ボタンを選択した場合
    if(isset($_POST["update-b"])){

        // 画像の追加・更新がある場合
        if(isset($_FILES["profile-image"])){
            $loginid = $_POST["loginid"];
            $pi_file_path = $_FILES["profile-image"]["tmp_name"];
            $pi_file_name = $_FILES["profile-image"]["name"];

            // ファイルパスをユニークにする
            $file_dir_path = "./images/userprofile/" . $loginid . "/";
            //$file_dir_path = "/Applications/XAMPP/xamppfiles/htdocs/connexy/images/userprofile/" . $loginid . "/";

            //「$file_dir_path」で指定されたディレクトリが存在するか確認
            if(file_exists($file_dir_path)){
                //header("Location: myprofile.php");
            }
            else{
                //存在しないときの処理（「$file_dir_path」で指定されたディレクトリを作成する）
                if(mkdir($file_dir_path, 0777)){
                    //作成したディレクトリのパーミッションを確実に変更
                    chmod($file_dir_path, 0777);
                }
                else{
                    //作成に失敗した時の処理
                    print "作成に失敗しました";
                    header("myprofile_edit.php");
                }
            }

            $pi_img="";
            // ファイルパスがユニークなので、ファイル名は統一のものとする
            $pi_cfile_name="upfl_image.jpg";

            // コンテンツトップに表示する画像を保存する。
            if (is_uploaded_file($pi_file_path)) {
                if (move_uploaded_file($pi_file_path, $file_dir_path . $pi_cfile_name)) {
                    chmod($file_dir_path . $pi_cfile_name, 0644);
                    $pi_img = '<img src="'. $file_dir_path . $pi_cfile_name . '" >';
                    $pi_img_path = $file_dir_path . $pi_cfile_name;
                    // var_dump($pi_img_path);

                    $pdo = new PDO("mysql:host=localhost; dbname=Connexy_DB; charset=utf8", "root", "");
                    $sql = "UPDATE User_Properties_C SET UserProfileImage = :n_path, Updatehistory = sysdate() WHERE UserLoginID = :n_id";

                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(':n_id', $loginid, PDO::PARAM_STR);
                    $stmt->bindValue(':n_path', $pi_img_path, PDO::PARAM_STR);
                    $result = $stmt->execute();

                    if($result == NULL){
                        print '<table id="input_table">';
                            print '<tr>';
                                print '<td>' ."登録に失敗しました。<br>
                                              再度入力しなおして下さい。".
                                      '</td>';
                            print '</tr>';

                            print '<tr>';
                                print '<td>' .'<a href="myprofile_edit.php">元に戻る</a></td>';
                            print '</tr>';
                        print '</table>';
                    }
                    else{
                        //header("Location: myprofile.php");
                    }
                } 
                else {
                    // FileUpload [--End--]
                    // サポート状況の確認􏰀
                    print "Error:アップロードできませんでした。"; 
                }
            }
        }
        else{
            //header("Location: myprofile.php");
        }

        $loginid = $_POST["loginid"];
        $lname1 = $_POST["lname1"];
        $fname1 = $_POST["fname1"];

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

        if(($ulname1 != $lname1) || ($ufname1 != $fname1)){
            $pdo = new PDO("mysql:host=localhost; dbname=Connexy_DB; charset=utf8", "root", "");
            $sql = "UPDATE User_Master SET UserLastName = :n_ln1, UserFirstName = :n_fn1 WHERE UserLoginID = :n_id";

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':n_id', $loginid, PDO::PARAM_STR);
            $stmt->bindValue(':n_ln1', $lname1, PDO::PARAM_STR);
            $stmt->bindValue(':n_fn1', $fname1, PDO::PARAM_STR);

            $result = $stmt->execute();

            if($result == NULL){
                print '<table id="input_table">';
                    print '<tr>';
                        print '<td>' ."更新に失敗しました。<br>
                                      再度入力しなおして下さい。".
                              '</td>';
                    print '</tr>';

                    print '<tr>';
                        print '<td>' .'<a href="myprofile_edit.php">元に戻る</a></td>';
                    print '</tr>';
                print '</table>';
            }
        }

        $age = $_POST["age"];
        $university = $_POST["university"];
        $faculty = $_POST["faculty"];
        $dept = $_POST["dept"];
        $grade = $_POST["grade"];

        $pflage1 = $_POST["pfage1"];
        $pflmonth1 = $_POST["pfmon1"];
        $pflhis1 = $_POST["pfhis1"];

        $pflage2 = $_POST["pfage2"];
        $pflmonth2 = $_POST["pfmon2"];
        $pflhis2 = $_POST["pfhis2"];

        $pflage3 = $_POST["pfage3"];
        $pflmonth3 = $_POST["pfmon3"];
        $pflhis3 = $_POST["pfhis3"];

        $pflage4 = $_POST["pfage4"];
        $pflmonth4 = $_POST["pfmon4"];
        $pflhis4 = $_POST["pfhis4"];

        $pflage5 = $_POST["pfage5"];
        $pflmonth5 = $_POST["pfmon5"];
        $pflhis5 = $_POST["pfhis5"];

        $pflage6 = $_POST["pfage6"];
        $pflmonth6 = $_POST["pfmon6"];
        $pflhis6 = $_POST["pfhis6"];

        $pflage7 = $_POST["pfage7"];
        $pflmonth7 = $_POST["pfmon7"];
        $pflhis7 = $_POST["pfhis7"];

        $pflage8 = $_POST["pfage8"];
        $pflmonth8 = $_POST["pfmon8"];
        $pflhis8 = $_POST["pfhis8"];

        $pflage9 = $_POST["pfage9"];
        $pflmonth9 = $_POST["pfmon9"];
        $pflhis9 = $_POST["pfhis9"];

        $pflage10 = $_POST["pfage10"];
        $pflmonth10 = $_POST["pfmon10"];
        $pflhis10 = $_POST["pfhis10"];

        $pfappeal = $_POST["profile-appeal"];

        $pflang1 = $_POST["pflang1-1"];
        $pflanglevel1 = $_POST["pflang1-2"];

        $pflang2 = $_POST["pflang2-1"];
        $pflanglevel2 = $_POST["pflang2-2"];    

        $pflang3 = $_POST["pflang3-1"];
        $pflanglevel3 = $_POST["pflang3-2"];

        $pdo = new PDO("mysql:host=localhost; dbname=Connexy_DB; charset=utf8", "root", "");
        $sql = "UPDATE User_Properties_C SET 
        UserAge = :n_age, UniversityInfo = :n_un, UniversityFaculty = :n_uf, UniversityDeftInfo = :n_dp, UserGrade = :n_gd, 
        Profile_age1 = :n_pa1, Profile_month1 = :n_pm1, Profile_history1 = :n_ph1, 
        Profile_age2 = :n_pa2, Profile_month2 = :n_pm2, Profile_history2 = :n_ph2, 
        Profile_age3 = :n_pa3, Profile_month3 = :n_pm3, Profile_history3 = :n_ph3, 
        Profile_age4 = :n_pa4, Profile_month4 = :n_pm4, Profile_history4 = :n_ph4, 
        Profile_age5 = :n_pa5, Profile_month5 = :n_pm5, Profile_history5 = :n_ph5, 
        Profile_age6 = :n_pa6, Profile_month6 = :n_pm6, Profile_history6 = :n_ph6, 
        Profile_age7 = :n_pa7, Profile_month7 = :n_pm7, Profile_history7 = :n_ph7, 
        Profile_age8 = :n_pa8, Profile_month8 = :n_pm8, Profile_history8 = :n_ph8, 
        Profile_age9 = :n_pa9, Profile_month9 = :n_pm9, Profile_history9 = :n_ph9, 
        Profile_age10 = :n_pa10, Profile_month10 = :n_pm10, Profile_history10 = :n_ph10, 
        Profile_appeal = :n_papl, 
        Profile_language1 = :n_pl1, Profile_lang_level1 = :n_pll1, 
        Profile_language2 = :n_pl2, Profile_lang_level2 = :n_pll2, 
        Profile_language3 = :n_pl3, Profile_lang_level3 = :n_pll3, 
        Updatehistory = sysdate() 
        WHERE UserLoginID = :n_id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':n_id', $loginid, PDO::PARAM_STR);
        $stmt->bindValue(':n_age', $age, PDO::PARAM_INT);
        $stmt->bindValue(':n_un', $university, PDO::PARAM_STR);
        $stmt->bindValue(':n_uf', $faculty, PDO::PARAM_STR);
        $stmt->bindValue(':n_dp', $dept, PDO::PARAM_STR);
        $stmt->bindValue(':n_gd', $grade, PDO::PARAM_INT);

        $stmt->bindValue(':n_pa1', $pflage1, PDO::PARAM_INT);
        $stmt->bindValue(':n_pm1', $pflmonth1, PDO::PARAM_INT);
        $stmt->bindValue(':n_ph1', $pflhis1, PDO::PARAM_STR);

        $stmt->bindValue(':n_pa2', $pflage2, PDO::PARAM_INT);
        $stmt->bindValue(':n_pm2', $pflmonth2, PDO::PARAM_INT);
        $stmt->bindValue(':n_ph2', $pflhis2, PDO::PARAM_STR);

        $stmt->bindValue(':n_pa3', $pflage3, PDO::PARAM_INT);
        $stmt->bindValue(':n_pm3', $pflmonth3, PDO::PARAM_INT);
        $stmt->bindValue(':n_ph3', $pflhis3, PDO::PARAM_STR);

        $stmt->bindValue(':n_pa4', $pflage4, PDO::PARAM_INT);
        $stmt->bindValue(':n_pm4', $pflmonth4, PDO::PARAM_INT);
        $stmt->bindValue(':n_ph4', $pflhis4, PDO::PARAM_STR);

        $stmt->bindValue(':n_pa5', $pflage5, PDO::PARAM_INT);
        $stmt->bindValue(':n_pm5', $pflmonth5, PDO::PARAM_INT);
        $stmt->bindValue(':n_ph5', $pflhis5, PDO::PARAM_STR);

        $stmt->bindValue(':n_pa6', $pflage6, PDO::PARAM_INT);
        $stmt->bindValue(':n_pm6', $pflmonth6, PDO::PARAM_INT);
        $stmt->bindValue(':n_ph6', $pflhis6, PDO::PARAM_STR);

        $stmt->bindValue(':n_pa7', $pflage7, PDO::PARAM_INT);
        $stmt->bindValue(':n_pm7', $pflmonth7, PDO::PARAM_INT);
        $stmt->bindValue(':n_ph7', $pflhis7, PDO::PARAM_STR);

        $stmt->bindValue(':n_pa8', $pflage8, PDO::PARAM_INT);
        $stmt->bindValue(':n_pm8', $pflmonth8, PDO::PARAM_INT);
        $stmt->bindValue(':n_ph8', $pflhis8, PDO::PARAM_STR);

        $stmt->bindValue(':n_pa9', $pflage9, PDO::PARAM_INT);
        $stmt->bindValue(':n_pm9', $pflmonth9, PDO::PARAM_INT);
        $stmt->bindValue(':n_ph9', $pflhis9, PDO::PARAM_STR);

        $stmt->bindValue(':n_pa10', $pflage10, PDO::PARAM_INT);
        $stmt->bindValue(':n_pm10', $pflmonth10, PDO::PARAM_INT);
        $stmt->bindValue(':n_ph10', $pflhis10, PDO::PARAM_STR);

        $stmt->bindValue(':n_papl', $pfappeal, PDO::PARAM_STR);

        $stmt->bindValue(':n_pl1', $pflang1, PDO::PARAM_STR);
        $stmt->bindValue(':n_pll1', $pflanglevel1, PDO::PARAM_INT);

        $stmt->bindValue(':n_pl2', $pflang2, PDO::PARAM_STR);
        $stmt->bindValue(':n_pll2', $pflanglevel2, PDO::PARAM_INT);

        $stmt->bindValue(':n_pl3', $pflang3, PDO::PARAM_STR);
        $stmt->bindValue(':n_pll3', $pflanglevel3, PDO::PARAM_INT);

        $result = $stmt->execute();

        if($result == NULL){
            print '<table id="input_table">';
                print '<tr>';
                    print '<td>' ."更新に失敗しました。<br>
                                  再度入力しなおして下さい。".
                          '</td>';
                print '</tr>';

                print '<tr>';
                    print '<td>' .'<a href="myprofile_edit.php">元に戻る</a></td>';
                print '</tr>';
            print '</table>';
        }

        header("Location: myprofile.php");
    }

    // キャンセルボタンを押した場合
    elseif(isset($_POST["cancel-b"])){
        header("Location: myprofile.php");
    }
    
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/default.css">
        <link rel="shortcut icon" href="./favicon.ico">
    </head>
    <body>
        <div class="sm_container">
        </div>
    <body>
</html>