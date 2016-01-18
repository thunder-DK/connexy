<?php
    if(isset($_FILE["profile-image"])){
        $loginid = $_POST["loginid"];
        $pi_file_path = $_FILES["profile-image"]["tmp_name"];
        $pi_file_name = $_FILES["profile-image"]["name"];

        // ファイルパスをユニークにする
        $file_dir_path = "./images/userprofile/" . $loginid . "/";
        //$file_dir_path = "/Applications/XAMPP/xamppfiles/htdocs/connexy/images/userprofile/" . $loginid . "/";

        //「$file_dir_path」で指定されたディレクトリが存在するか確認
        if(file_exists($file_dir_path)){    
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
                    echo '<table id="input_table">';
                        print '<tr>';
                            print '<td>' ."登録に失敗しました。<br>
                                          再度入力しなおして下さい。".
                                  '</td>';
                        print '</tr>';

                        print '<tr>';
                            print '<td>' .'<a href="myprofile_edit.php">元に戻る</a></td>';
                        print '</tr>';
                    echo '</table>';
                }
                else{
                    header("Location: myprofile.php");
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
        header("Location: myprofile.php");
    }
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/default.css">
        <link rel="shortcut icon" href="./images/favicon.ico">
    </head>
    <body>
        <div class="sm_container">
        
        </div>
    <body>
</html>