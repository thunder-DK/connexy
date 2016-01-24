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
            <div class="company-name1" style="text-align: center; border-style: solid; border-width: 3px; padding: 8px; width:250px"><a href="../index.php">CONNEXY</a>
            </div>

            <div class="inputform">
                <h2 style="text-align: center;">検索キーワードを入力してください</h2>

                <form action="news_search_execute.php" method="post">
                    <table border="0">
                        <tr height="50">
                            <td width="160">検索ワード：</td>
                            <td><input type="text" name="s-word" size="100" required></td>
                        </tr>
                    </table>
                    <input type="submit" class="btn btn-primary submit-input" value="ニュースを検索する" name="submit-input" style="margin-right: 5px;">
                    <!--<input type="image" src="../images/btn-searchexe.png" name="s_searchbutton" id="submit-input" value="ニュースを検索する">-->
                </form>
                <form action="news_list.php" method="get">
                    <input type="submit" class="btn btn-default submit-input" value="元に戻る" name="submit-cancel" style="margin-right: 5px;">
                    <!--<input type="image" src="../images/btn-cancel.png" id="submit-cancel" value="元に戻る">-->
                </form>
            </div>
        </div>
    </body>
</html>