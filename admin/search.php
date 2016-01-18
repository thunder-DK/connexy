<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>管理者用–ニュース検索用</title>
        <link rel="stylesheet" href="../css/default.css">
    </head>
    
    <body>
        
        <div id="container1">
            <div class="company-name1" align="center" style="border-style:solid; border-width: 3px; padding:2px; width:250px"><a href="../index.php">K-NEWs</a>
            </div>

            
            <div id="inputform">
                <h2>検索キーワードを入力してください</h2>
                <form action="search_execute.php" method="post">
                    <fieldset id="news_inputfield">
                        <table border="0" id="input_table">
                            <tr height="50">
                                <td width="120">検索ワード：</td>
                                <td><input type="text" name="s-word" size="100" required></td>
                            </tr>
                        </table>
                    </fieldset>
                    <input type="image" src="../images/btn-searchexe.png" name="s_searchbutton" id="submit-input" value="ニュースを検索する">
                </form>
                <form action="news_list.php" method="get">
                    <input type="image" src="../images/btn-cancel.png" id="submit-cancel" value="元に戻る">
                </form>
            </div>
            
        </div>
    </body>
</html>