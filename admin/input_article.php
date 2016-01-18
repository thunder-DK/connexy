<!DOCTYPE html>
<html lang="ja">
    <head>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/default.css">
    </head>
    <body>
        <div id="container_o">
            <form action="input_article_confirm.php" method="post" enctype="multipart/form-data">
                
                <h2 align="center">コンテンツを投稿してください</h2>
                
                <fieldset style="margin-bottom:30px;">
                    <legend>コンテンツ概要 登録</legend>
                    <table id="input_value">
                        <tr>
                            <td width="200">記事タイトル：</td>
                            <td><input type="text" name="acl_title" maxlength="30" width="100" size="100" required></td>
                        </tr>
            
                        <tr>
                            <td>記事詳細：</td>
                            <td><textarea name="acl_detail" cols=100 rows=3 required></textarea></td>
                        </tr>
                        <!--
                        <tr>
                            <td>キービジュアル：</td>
                            <td><input type="file" accept="image/*" name="acl_image"></td>
                        </tr>
                        -->
                    </table>
                </fieldset>
                
                <fieldset>
                    <legend>コンテンツ詳細 登録</legend>
                    <table id="input_value">
                        <tr>
                            <td width="200">コンテンツタイトル1：</td>
                            <td><input type="text" name="co_title1" maxlength="30" width="100" size="100" required></td>
                        </tr>
                        <tr>
                            <td>コンテンツ詳細1：</td>
                            <td><textarea name="co_detail1" cols=100 rows=3 required></textarea></td>
                        </tr>
                        <!--
                        <tr>
                            <td>コンテンツ詳細画像1：</td>
                            <td><input type="file" name="co_image1" accept="image/*"></td>
                        </tr>
                        -->

                        <tr>
                            <td>コンテンツタイトル2：</td>
                            <td><input type="text"  name="co_title2" maxlength="30" width="100" size="100"></td>
                        </tr>
                        <tr>
                            <td>コンテンツ詳細2：</td>
                            <td><textarea name="co_detail2" cols=100 rows=3></textarea></td>
                        </tr>
                        <!--
                        <tr>
                            <td>コンテンツ詳細画像2：</td>
                            <td><input type="file" name="co_image2" accept="image/*"></td>
                        </tr>
                        -->
                        
                        <tr>
                            <td>コンテンツタイトル3：</td>
                            <td><input type="text"  name="co_title3" maxlength="30" width="100" size="100"></td>
                        </tr>
                        <tr>
                            <td>コンテンツ詳細3：</td>
                            <td><textarea name="co_detail3" cols=100 rows=3></textarea></td>
                        </tr>
                        <!--
                        <tr>
                            <td>コンテンツ詳細画像3：</td>
                            <td><input type="file" name="co_image3" accept="image/*"></td>
                        </tr>
                        -->

                        <tr>
                            <td>コンテンツタイトル4：</td>
                            <td><input type="text"  name="co_title4" maxlength="30" width="100" size="100"></td>
                        </tr>
                        <tr>
                            <td>コンテンツ詳細4：</td>
                            <td><textarea name="co_detail4" cols=100 rows=3></textarea></td>
                        </tr>
                        <!--
                        <tr>
                            <td>コンテンツ詳細画像4：</td>
                            <td><input type="file" name="co_image4" accept="image/*"></td>
                        </tr>
                        -->
                        
                        <tr>
                            <td>コンテンツタイトル5：</td>
                            <td><input type="text" name="co_title5" maxlength="30" width="100" size="100"></td>
                        </tr>
                        <tr>
                            <td>コンテンツ詳細5：</td>
                            <td><textarea name="co_detail5" cols=100 rows=3></textarea></td>
                        </tr>
                        <!--
                        <tr>
                            <td>コンテンツ詳細画像5：</td>
                            <td><input type="file" name="co_image5" accept="image/*"></td>
                        </tr>
                        -->
                    </table>
                </fieldset>

                <input type="image" src="../images/btn-input.png" id="submit-input" value="記事を登録する">
            </form>
    
            <form action="input_form.php" method="get">
                <input type="image" src="../images/btn-cancel.png" id="submit-cancel" value="元に戻る">
            </form>
        </div>
    </body>
</html>