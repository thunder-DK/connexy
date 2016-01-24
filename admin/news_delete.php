<?php
    $get_newsid = $_GET["id"];

    $pdo = new PDO("mysql:host=localhost; dbname=Connexy_DB; charset=utf8", "root", "");
    //$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
    $sql = "SELECT * FROM News WHERE news_id = :newsid";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':newsid', $get_newsid, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if($result == NULL){
        echo '<table class="news_table">';
            print '<tr>';
                print '<td>' ."値の取得に失敗しました。<bf>".
                      '</td>';
            print '</tr>';

            print '<tr>';
                print '<td>' .'<a href="news_list.php">元に戻る</a></td>';
            print '</tr>';
        echo '</table>';        
    }

    else{
        foreach($result as $row) {
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
            
            <div class="company-name1" style="text-align: center; border-style: solid; border-width: 3px; padding: 8px; width:250px">
                <a href="../index.php">CONNEXY</a>
            </div>
       
            <div class="inputform">
                <h3 style="text-align: center;">この内容で本当に削除しますか？ </h3>

                <form action="news_delete_execute.php" method="post">
                    <table border="0">
                        <tr style="height: 50px;">                        
                            <td style="width: 160px;">ニュースタイトル：</td>
                            <td><input type="text" size="80" value="<?php print $news_title ?>" disabled id="dltcolor">
                            </td>
                        </tr>
                        <tr style="height: 50px;">
                            <td>ニュース詳細：</td>
                            <td><textarea rows="4" cols="80" disabled id="dltcolor"><?php print $news_detail ?></textarea>
                            </td>
                        </tr>
                        <tr style="height: 50px;">
                            <td>著者名（更新者）：</td>
                            <td><input type="text" size="50" value="<?php print $news_author ?>" disabled id="dltcolor">
                            </td>
                        </tr>
                        <tr style="height: 50px;">
                            <td>表示設定</td>
                            <?php 
                                if($news_showfl == 1){
                                    print '<td><input type="radio" value="1" checked disable>表示
                                               <input type="radio" value="0" disabled>非表示
                                           </td>';
                                }
                                else{
                                    print '<td><input type="radio" value="1" disabled>表示
                                               <input type="radio" value="0" checked disabled>非表示
                                           </td>';
                                }
                            ?>
                        </tr>
                    </table>

                    <input type="hidden" name="news_id" value="<?php print $get_newsid ?>">
                    <input type="hidden" name="n_title" value="<?php print $news_title ?>">
                    <input type="hidden" name="n_detail" value="<?php print $news_detail ?>">
                    <input type="hidden" name="n_author" value="<?php print $news_author ?>">
                    <input type="hidden" name="show_flg" value="<?php print $news_showfl ?>">
                    
                    <input type="submit" class="btn btn-primary submit-input" value="ニュースを削除する" name="submit-input" style="margin-right: 5px;">
                    <!--<input type="image" src="../images/btn-news_delete.png" name="s_inputbutton" id="submit-input" value="ニュースを削除する">-->
                </form>
                <form action="news_list.php" method="get">
                    <input type="submit" class="btn btn-default submit-input" value="元に戻る" name="submit-cancel" style="margin-right: 5px;">
                    <!--<input type="image" src="../images/btn-cancel.png" id="submit-cancel" value="元に戻る">-->
                </form>
            </div>
    </body>
</html>