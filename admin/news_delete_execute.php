<?php
    $n_id = $_POST["news_id"];
    $n_title = $_POST["n_title"];
    $n_detail = $_POST["n_detail"];
    $n_author = $_POST["n_author"];
    $n_flg = $_POST["show_flg"];

    $pdo = new PDO("mysql:host=localhost; dbname=Connexy_DB; charset=utf8", "root", "");
    //$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
    $sql = "DELETE FROM News WHERE news_id = :n_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':n_id', $n_id, PDO::PARAM_INT);
    $result = $stmt->execute();

    if($result == NULL){
        echo '<table class="input_table">';
            print '<tr>';
                print '<td>' ."登録に失敗しました。<br>
                              再度入力しなおして下さい。".
                      '</td>';
            print '</tr>';

            print '<tr>';
                print '<td>' .'<a href="../input.php">元に戻る</a></td>';
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
    </body>
</html>