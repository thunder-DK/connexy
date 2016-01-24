<?php
    $news_word = $_POST["s-word"];

    $pdo = new PDO("mysql:host=localhost; dbname=Connexy_DB; charset=utf8", "root", "");
    //$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
    //$sql = "SELECT * FROM news WHERE news_title LIKE '%$news_word%'";

    $sql = "SELECT * FROM News WHERE (news_title LIKE '%$news_word%') or (news_detail LIKE '%$news_word%')";
    //$sql = "SELECT * FROM news WHERE news_title LIKE :s_word";
    //$sql = "SELECT * FROM news WHERE (news_title LIKE '%" . ":s_word" . "%') OR (news_detail LIKE '%" .:s_word. "%')";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':s_word', $news_word, PDO::PARAM_STR);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if($result == NULL){
        print '<table class="input_table">';
            print '<tr>';
                print '<td>' ."検索されたワードはニュースに存在しませんでした。<br>
                               再度検索ワードを入力しなおして下さい。".
                      '</td>';
            print '</tr>';

            print '<tr>';
                print '<td>' .'<a href="news_search.php">元に戻る</a></td>';
            print '</tr>';
        print '</table>';
    }
    $pdo = null;
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
            <h3 style="text-align: center; margin-bottom: 30px;">検索結果が表示されました</h3>

            <table border="1">
                <tr style="height: 50px;">
                    <td style="width: 5%;">ID</td>
                    <td style="width: 15%;">newsタイトル</td>
                    <td style="width: 45%;">news詳細</td>
                    <td style="width: 10%;">著者</td>
                    <td style="width: 5%;">表示</td>
                    <td style="width: 10%;">登録日</td>
                    <td style="width: 10%;">更新日</td>
                </tr>

                <?php 
                    foreach($result as $row) {
                        print '<tr style="height: 50px;">';
                            $news_id = $row["news_id"];
                            $news_date = $row["create_date"];
                            $news_update = $row["update_date"];
                            $news_title = $row["news_title"];
                            $news_detail = $row["news_detail"];
                            $news_author = $row["author"];
                            $news_showfl = $row["show_fl"];

                            if($news_showfl == 1){
                                $show_fl = "○";
                            }
                            else{
                                $show_fl = "×";
                            }

                            print '<td>' .$news_id. '</td>';
                            print '<td>' .$news_title. '</td>';
                            print '<td>' .$news_detail. '</td>';
                            print '<td>' .$news_author. '</td>';
                            print '<td>' .$show_fl. '</td>';
                            print '<td>' .$news_date. '</td>';
                            print '<td>' .$news_update. '</td>';
                        print '<tr>';
                    }
                ?>
            </table>
            <form action="news_search.php" method="post">
                <input type="submit" class="btn btn-primary submit-input" value="検索する" name="submit-input" style="margin-right: 5px;">
                <!--<input type="image" src="../images/btn-backnewslist.png" value="リストに戻る" name="submit-i" id="submit-input">-->
            </form>
            <form action="news_list.php" method="post">
                <input type="submit" class="btn btn-default submit-input" value="元に戻る" name="submit-cancel" style="margin-right: 5px;">
                <!--<input type="image" src="../images/btn-cancel.png" name="submit-s" id="submit-cancel">-->
            </form>
        </div>
    <body>
</html>