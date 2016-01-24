<?php
    $news_title = $_POST["n_title"];
    $news_detail = $_POST["n_detail"];
    $news_author = $_POST["n_author"];
    $news_showfl = $_POST["show_flg"];

    $pdo = new PDO("mysql:host=localhost; dbname=Connexy_DB; charset=utf8", "root", "");
    //$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
    $sql = "INSERT INTO News (news_id, news_title, news_detail, show_fl, author, create_date, update_date) VALUES (NULL, :n_title, :n_detail, :n_showfl, :n_author, sysdate(), sysdate())";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':n_title', $news_title, PDO::PARAM_STR);
    $stmt->bindValue(':n_detail', $news_detail, PDO::PARAM_STR);
    $stmt->bindValue(':n_showfl', $news_showfl, PDO::PARAM_INT);
    $stmt->bindValue(':n_author', $news_author, PDO::PARAM_STR);
    $result = $stmt->execute();

    if($result == NULL){
        echo '<table class="news_table">';
            print '<tr>';
                print '<td>'."登録に失敗しました。<br>再度入力しなおして下さい。".'</td>';
            print '</tr>';

            print '<tr>';
                print '<td>' .'<a href="news_input.php">元に戻る</a></td>';
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
        <meta charset="utf-8">
        <title>管理者用–ニュース登録用</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/default.css">
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.1.min.js"></script>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="../favicon.ico">
    </head>
    <body>
        <div class="container" style="width: 80%; margin: 0 auto; margin-top: 3%;">
        </div>
    <body>
</html>