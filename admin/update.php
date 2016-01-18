<?php
    $get_newsid = $_GET["id"];

    $pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
    $sql = "SELECT * FROM news WHERE news_id = :newsid";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':newsid', $get_newsid, PDO::PARAM_STR);
    $bresult = $stmt->execute();
    
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if($results == NULL){
            print "値の取得に失敗しました。<br>";
            print '<a href="news_list.php">元に戻る</a>';
    }

    else{
        foreach($results as $row) {
            $news_title = $row["news_title"];
            $news_detail = $row["news_detail"];
            $news_author = $row["author"];
            $news_showfl = $row["show_fl"];
        }
    }
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <link rel="stylesheet" href="../css/default.css">
    </head>
    <body>
        <div id="container1">
            
            <div class="company-name" align="center" style="border-style:solid; border-width: 3px; padding:2px; width:250px"><a href="../index.php">K-NEWs</a>
            </div>
       
            <div id="inputform">
                <h2>ニュースを更新してください</h2>
                <form action="update_execute.php" method="post">
                    <fieldset id="news_inputfield">
                        <table border="0" id="input_table">
                            <tr height="50">                        
                                <td>ニュースタイトル：</td>
                                <td><input type="text" name="n_title" size="100" value="<?php print $news_title ?>" required></td>
                            </tr>
                            <tr height="50">
                                <td>ニュース詳細：</td>
                                <td><textarea name="n_detail" rows="4" cols="100" required><?php print $news_detail ?></textarea></td>
                            </tr>
                            <tr height="50">
                                <td>著者名（更新者）：</td>
                                <td><input type="text" name="n_author" size="50" value="<?php print $news_author ?>" required></td>
                            </tr>
                            <tr height="50">
                                <td>表示設定</td>
                                <?php 
                                    if($news_showfl == 1){
                                        print '<td><input type="radio" name="show_flg" value="1" checked required>表示
                                                   <input type="radio" name="show_flg" value="0" required>非表示
                                               </td>';
                                    }
                                    else{
                                        print '<td><input type="radio" name="show_flg" value="1" required>表示
                                                   <input type="radio" name="show_flg" value="0" checked required>非表示
                                               </td>';
                                    }
                                ?>
                            </tr>
                        </table>
                    </fieldset>
                    <input type="hidden" name="news_id" value="<?php print $get_newsid ?>">
                    <input type="image" src="../images/btn-news_update.png" name="s_inputbutton" id="submit-input" value="ニュースを更新する">
                </form>
                <form action="news_list.php" method="get">
                    <input type="image" src="../images/btn-cancel.png" id="submit-cancel" value="元に戻る">
                </form>
            </div>
    </body>
</html>