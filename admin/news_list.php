<?php
    $pdo = new PDO("mysql:host=localhost; dbname=Connexy_DB; charset=utf8", "root", "");
    //$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
    $sql = "SELECT * FROM News ORDER BY news_id DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $pdo = null;
?>

<!DOCTYPE html>
<html la="ja">
    <head>
        <meta charset="utf-8">
        <title>管理者用–ニュース登録内容確認</title>

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
            <div style="width: 100%; height: 50px; margin-top: 20px;">
                <div style="text-align: center; border-style:solid; border-width: 3px; padding:2px; width:250px; float: left;">
                    <a href="../index.php">Connexy</a>
                </div>
                <div>
                    <p style="float:right;"><a href="../index.php">元に戻る</a></p>
                </div>
            </div>
    
            <?php if($result == false): ?>
                <div style = "width: 100%; text-align: center;">
                    <h3>値が何も登録されていません。<br>登録してください。</h3>
                </div>

            <?php elseif($result == true): ?>
                <table class="news_list_table">
                    <tr>
                        <td style="width: 4%;">ID</td>
                        <td style="width: 15%;">newsタイトル</td>
                        <td style="width: 35%;">news詳細</td>
                        <td style="width: 8%;">著者</td>
                        <td style="width: 4%;">表示</td>
                        <td style="width: 10%;">登録日</td>
                        <td style="width: 10%;">更新日</td>
                        <td style="width: 7%;">更新</td>
                        <td style="width: 7%;">削除</td>
                    </tr>

                    <?php
                        foreach($result as $row) {
                            print '<tr>';
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
                                print '<td><form method="post" action="news_update.php?id='.$news_id.'"><input type="submit" value="更新"></form></td>';
                                print '<td><form method="post" action="news_delete.php?id='.$news_id.'"><input type="submit" value="削除"></form></td>';
                            print '<tr>';
                        }
                    ?>
                </table>
            <?php endif; ?>

            <div style="margin-bottom: 40px;">
                <form action="news_input.php" method="post">
                    <input type="submit" class="btn btn-primary submit-input" value="登録" name="submit-i" style="margin-right: 5px;">
                </form>

                <form action="news_search.php" method="post">
                    <input type="submit" class="btn btn-default submit-cancel" value="検索" name="submit-s" style="margin-left: 5px;">
                </form>
            </div>
            
            <!--
            <form action="input.php" method="post">
                <input type="image" src="../images/btn-input.png" value="登録" name="submit-i" id="submit-i">
            </form>
            <form action="search.php" method="post">
                <input type="image" src="../images/btn-search.png" value="検索" name="submit-s" id="submit-s">
            </form>
            -->
            
        </div>
        
    </body>
</html>