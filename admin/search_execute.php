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
        <?php
            $news_word = $_POST["s-word"];

            $pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
            //$sql = "SELECT * FROM news WHERE news_title LIKE '%$news_word%'";
            $sql = "SELECT * FROM news WHERE (news_title LIKE '%$news_word%') or (news_detail LIKE '%$news_word%')";
            //$sql = "SELECT * FROM news WHERE news_title LIKE :s_word";
            //$sql = "SELECT * FROM news WHERE (news_title LIKE '%" . ":s_word" . "%') OR (news_detail LIKE '%" .:s_word. "%')";
            //var_dump($sql);

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':s_word', $news_word, PDO::PARAM_STR);
            //var_dump($stmt);

            $result = $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            //var_dump($result);

            if($results == NULL){
                echo '<table id="input_table">';
                    print '<tr>';
                        print '<td>' ."検索されたワードはニュースに存在しませんでした。<br>
                                       再度検索ワードを入力しなおして下さい。".
                              '</td>';
                    print '</tr>';
                
                    print '<tr>';
                        print '<td>' .'<a href="search.php">元に戻る</a></td>';
                    print '</tr>';
                echo '</table>';
            }
            else{
                echo '<h2>' ."検索結果が表示されました". '</h2>';
                
                echo '<table border="1" id="news_table">';
                    echo '<tr>';
                        print '<td>' ."ID". '</td>';
                        print '<td>' ."newsタイトル". '</td>';
                        print '<td>' ."news詳細". '</td>';
                        print '<td>' ."著者". '</td>';
                        print '<td>' ."表示". '</td>';
                        print '<td>' ."登録日". '</td>';
                        print '<td>' ."更新日". '</td>';
                    echo '</tr>';

                    foreach($results as $row) {
                    echo '<tr>';
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
                    echo '<tr>';

                    }
                echo '</table>';

                $pdo = null;
                // header("Location: news_list.php");
            }
        ?>

        <form action="news_list.php" method="post">
            <input type="image" src="../images/btn-backnewslist.png" value="リストに戻る" name="submit-i" id="submit-input">
        </form>
        <form action="search.php" method="post">
            <input type="image" src="../images/btn-cancel.png" name="submit-s" id="submit-cancel">
        </form>
            
        </div>
    <body>
</html>