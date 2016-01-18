<!DOCTYPE html>
<html la="ja">
    <head>
        <meta charset="utf-8">
        <title>管理者用–ニュース登録内容確認</title>
        <link rel="stylesheet" href="../css/default.css">
    </head>
    
    <body>
        <div id="container1">
            <div class="company-name1" align="center" style="border-style:solid; border-width: 3px; padding:2px; width:250px"><a href="../index.php">K-NEWs</a></div>
            <p style="float:right;"><a href="input_form.php">元に戻る</a></p>
            
            <?php
                $pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
                $sql = "SELECT * FROM news ORDER BY news_id DESC";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                echo '<table border="1" id="news_table">';
                    echo '<tr>';
                        print '<td>' ."ID". '</td>';
                        print '<td>' ."newsタイトル". '</td>';
                        print '<td>' ."news詳細". '</td>';
                        print '<td>' ."著者". '</td>';
                        print '<td>' ."表示". '</td>';
                        print '<td>' ."登録日". '</td>';
                        print '<td>' ."更新日". '</td>';
                        print '<td>' ."更新". '</td>';
                        print '<td>' ."削除". '</td>';
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
                        print '<td><form method="post" action="update.php?id='.$news_id.'"><input type="submit" value="更新"></form></td>'; 
                        print '<td><form method="post" action="delete.php?id='.$news_id.'"><input type="submit" value="削除"></form></td>';            
                        //print '<td><button id="update-btn" onclick="location.href=update_execute.php?id='.$news_id.'">' ."更新". '</button><td><button id="delete-btn" onclick="location.href=delete_execute.php?id=' .$news_id. '">' ."削除". '</button></td>';
                    
                    // print "<a href=\"news.php?id=$news_id\">$cc_newstitle</a>";
                    // print "       ";
                    // print $row["update_date"];
                    // print "<br>";
                    echo '<tr>';
                
                }
                echo '</table>';

                $pdo = null;
            ?>

            <form action="input.php" method="post">
                <input type="image" src="../images/btn-input.png" value="登録" name="submit-i" id="submit-i">
            </form>
            <form action="search.php" method="post">
                <input type="image" src="../images/btn-search.png" value="検索" name="submit-s" id="submit-s">
            </form>
            
        </div>
        
    </body>
</html>