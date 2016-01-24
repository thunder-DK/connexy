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
            <div class="company-name1" style="text-align: center; border-style:solid; border-width: 3px; padding:8px; width:250px">
                <a href="../index.php">CONNEXY</a>
            </div>

            <div class="inputform">
                
                <h3 style="text-align: center;">ニュースを登録してください</h3>

                <!-- 記事を書いたら確認画面へ遷移 -->
                <form action="news_input_confirm.php" method="post">
                <!-- <form action="input_execute.php" method="post"> -->
    
                    <table border="0">
                        <tr height="50">
                            <td style="width: 150px;">ニュースタイトル：</td>
                            <td><input type="text" name="n_title" size="100" required></td>
                        </tr>
                        <tr height="50">
                            <td>ニュース詳細：</td>
                            <td><textarea name="n_detail" rows="4" cols="100" required></textarea></td>
                        </tr>
                        <tr height="50">
                            <td>著者名：</td>
                            <td><input type="text" name="n_author" size="50" required></td>
                        </tr>
                        <tr height="50">
                            <td>表示設定</td>
                            <td><input type="radio" name="show_flg" value="1" checked required>表示
                                <input type="radio" name="show_flg" value="0" required>非表示
                            </td>
                        </tr>
                    </table>

                    <input type="submit" class="btn btn-primary submit-input" value="ニュースを登録する" name="submit-input" style="margin-right: 5px;">
                    <!--<input type="image" src="../images/btn-news_input.png" id="submit-input" value="ニュースを登録する">-->
                </form>
                <form action="news_list.php" method="get">
                    <input type="submit" class="btn btn-default submit-input" value="元に戻る" name="submit-cancel" style="margin-left: 5px;">
                    <!--<input type="image" src="../images/btn-cancel.png" id="submit-cancel" value="元に戻る">-->
                </form>
            </div>
            
        </div>
    </body>
</html>