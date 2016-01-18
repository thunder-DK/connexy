<?php
    $n_id = $_POST["news_id"];
    $n_title = $_POST["n_title"];
    $n_detail = $_POST["n_detail"];
    $n_author = $_POST["n_author"];
    $n_flg = $_POST["show_flg"];

    $pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
    $sql = "DELETE FROM news WHERE news_id = :n_id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':n_id', $n_id, PDO::PARAM_INT);
    $result = $stmt->execute();

    if($result == NULL){
        echo '<table id="input_table">';
            print '<tr>';
                print '<td>' ."登録に失敗しました。<br>
                              再度入力しなおして下さい。".
                      '</td>';
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
    </body>
</html>