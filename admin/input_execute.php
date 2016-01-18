<?php
    $news_title = $_POST["n_title"];
    $news_detail = $_POST["n_detail"];
    $news_author = $_POST["n_author"];
    $news_showfl = $_POST["show_flg"];
    
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
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <link rel="stylesheet" href="../css/default.css">
        <style>
            #input_table{
                margin-top: 100px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div id="container1">
        
        </div>
    <body>
</html>