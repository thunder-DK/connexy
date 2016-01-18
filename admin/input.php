<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>管理者用–ニュース登録用</title>
        <link rel="stylesheet" href="../css/default.css">
    </head>
    
    <body>
        
        <div id="container1">
            <div class="company-name1" align="center" style="border-style:solid; border-width: 3px; padding:2px; width:250px"><a href="../index.php">K-NEWs</a>
            </div>

            <div id="inputform">
                <h2>ニュースを登録してください</h2>
                <form action="input_confirm.php" method="post">
                <!-- <form action="input_execute.php" method="post"> -->
                    <fieldset id="news_inputfield">
                        <table border="0" id="input_table">
                            <tr height="50">                        
                                <td>ニュースタイトル：</td>
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
                    </fieldset>
                    <input type="image" src="../images/btn-news_input.png" id="submit-input" value="ニュースを登録する">
                </form>
                <form action="news_list.php" method="get">
                    <input type="image" src="../images/btn-cancel.png" id="submit-cancel" value="元に戻る">
                </form>
            </div>
            
        </div>
    </body>
</html>