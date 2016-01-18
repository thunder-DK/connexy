<?php
    $acl_title = $_POST["acl_title"];
    $acl_detail = $_POST["acl_detail"];

    $co_title1 = $_POST["co_title1"];
    $co_detail1 = $_POST["co_detail1"];

    $co_title2 = $_POST["co_title2"];
    $co_detail2 = $_POST["co_detail2"];

    $co_title3 = $_POST["co_title3"];
    $co_detail3 = $_POST["co_detail3"];

    $co_title4 = $_POST["co_title4"];
    $co_detail4 = $_POST["co_detail4"];

    $co_title5 = $_POST["co_title5"];
    $co_detail5 = $_POST["co_detail5"];

    /*
    $acl_file_path = $_POST["acl_file_path"];
    $acl_file_name = $_POST["acl_file_name"];
    $co_file_path1 = $_POST["co_file_path1"];
    $co_file_name1 = $_POST["co_file_name1"];
    $co_file_path2 = $_POST["co_file_path2"];
    $co_file_name2 = $_POST["co_file_name2"];
    $co_file_path3 = $_POST["co_file_path3"];
    $co_file_name3 = $_POST["co_file_name3"];
    $co_file_path4 = $_POST["co_file_path4"];
    $co_file_name4 = $_POST["co_file_name4"];
    $co_file_path5 = $_POST["co_file_path5"];
    $co_file_name5 = $_POST["co_file_name5"];
    */

    $acl_file_path = $_FILES["acl_image"]["tmp_name"];
    $acl_file_name = $_FILES["acl_image"]["name"];
    $co_file_path1 = $_FILES["co_image1"]["tmp_name"];
    $co_file_name1 = $_FILES["co_image1"]["name"];
    $co_file_path2 = $_FILES["co_image2"]["tmp_name"];
    $co_file_name2 = $_FILES["co_image2"]["name"];
    $co_file_path3 = $_FILES["co_image3"]["tmp_name"];
    $co_file_name3 = $_FILES["co_image3"]["name"];
    $co_file_path4 = $_FILES["co_image4"]["tmp_name"];
    $co_file_name4 = $_FILES["co_image4"]["name"];
    $co_file_path5 = $_FILES["co_image5"]["tmp_name"];
    $co_file_name5 = $_FILES["co_image5"]["name"];


    $file_dir_path = "/Applications/XAMPP/xamppfiles/htdocs/kadai/8/images/contents/";

    $acl_img="";
    
    // コンテンツトップに表示する画像を保存する。
    if (is_uploaded_file($acl_file_path)) {
        if (move_uploaded_file($acl_file_path, $file_dir_path . $acl_file_name)) {

            chmod($file_dir_path . $acl_file_name, 0644);
            $acl_img = '<img src="'. $file_dir_path . $acl_file_name . '" >';
            $acl_img_path = $file_dir_path . $acl_file_name;
            var_dump($acl_img_path);

        } 
        else {
            // FileUpload [--End--]
            // サポート状況の確認􏰀
            print "Error:アップロードできませんでした。"; 
        }
    }

    $co_img1="";
    // コンテンツ 1番上に表示する画像を保存する。
    if (is_uploaded_file($co_file_path1)) {
        if (move_uploaded_file($co_file_path1, $file_dir_path . $co_file_name1)) {
            chmod($file_dir_path . $co_file_name1, 0644);
            $co_img1 = '<img src="'. $file_dir_path . $co_file_name1 . '" >';
            $co_img_path1 = $file_dir_path . $co_file_name1;
        } 
        else {
            // FileUpload [--End--]
            // サポート状況の確認􏰀
            print "Error:アップロードできませんでした。"; 
        }
    }

    $co_img2="";
    // コンテンツ 上から2番目に表示する画像を保存する。
    if (is_uploaded_file($co_file_path2)) {
        if (move_uploaded_file($co_file_path2, $file_dir_path . $co_file_name2)) {
            chmod($file_dir_path . $co_file_name2, 0644);
            $co_img2 = '<img src="'. $file_dir_path . $co_file_name2 . '" >';
            $co_img_path2 = $file_dir_path . $co_file_name2;
        } 
        else {
            // FileUpload [--End--]
            // サポート状況の確認􏰀
            print "Error:アップロードできませんでした。"; 
        }
    }

    $co_img3="";
    // コンテンツ 上から3番目に表示する画像を保存する。
    if (is_uploaded_file($co_file_path3)) {
        if (move_uploaded_file($co_file_path3, $file_dir_path . $co_file_name3)) {
            chmod($file_dir_path . $co_file_name3, 0644);
            $co_img3 = '<img src="'. $file_dir_path . $co_file_name3 . '" >';
            $co_img_path3 = $file_dir_path . $co_file_name3;
        } 
        else {
            // FileUpload [--End--]
            // サポート状況の確認􏰀
            print "Error:アップロードできませんでした。"; 
        }
    }

    $co_img4="";
    // コンテンツ 上から4番目に表示する画像を保存する。
    if (is_uploaded_file($co_file_path4)) {
        if (move_uploaded_file($co_file_path4, $file_dir_path . $co_file_name4)) {
            chmod($file_dir_path . $co_file_name4, 0644);
            $co_img4 = '<img src="'. $file_dir_path . $co_file_name4 . '" >';
            $co_img_path4 = $file_dir_path . $co_file_name4;
        } 
        else {
            // FileUpload [--End--]
            // サポート状況の確認􏰀
            print "Error:アップロードできませんでした。"; 
        }
    }

    $co_img5="";
    // コンテンツ 上から5番目に表示する画像を保存する。
    if (is_uploaded_file($co_file_path5)) {
        if (move_uploaded_file($co_file_path5, $file_dir_path . $co_file_name5)) {
            chmod($file_dir_path . $co_file_name5, 0644);
            $co_img5 = '<img src="'. $file_dir_path . $co_file_name5 . '" >';
            $co_img_path5 = $file_dir_path . $co_file_name5;
        } 
        else {
            // FileUpload [--End--]
            // サポート状況の確認􏰀
            print "Error:アップロードできませんでした。"; 
        }
    }

    /*
    $pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
    $sql = "INSERT INTO news (news_id, news_title, news_detail, show_fl, author, create_date, update_date) VALUES (NULL, :n_title, :n_detail, :n_showfl, :n_author, sysdate(), sysdate())";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':n_title', $news_title, PDO::PARAM_STR);
    $stmt->bindValue(':n_detail', $news_detail, PDO::PARAM_STR);
    $stmt->bindValue(':n_showfl', $news_showfl, PDO::PARAM_INT);
    $stmt->bindValue(':n_author', $news_author, PDO::PARAM_STR);
    $result = $stmt->execute();
    var_dump($result);

    if($result == NULL){
        echo '<table id="input_table">';
            print '<tr>';
                print '<td>'."登録に失敗しました。<br>再度入力しなおして下さい。".'</td>';
            print '</tr>';

            print '<tr>';
                print '<td>' .'<a href="input.php">元に戻る</a></td>';
            print '</tr>';
        echo '</table>';
    }
    else{
        header("Location: news_list.php");
    }
    */
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <link rel="stylesheet" href="../css/default.css">
    </head>
    <body>
        <div id="container_o">
        
        </div>
    <body>
</html>