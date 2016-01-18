<?php
    $acl_title=$_POST["acl_title"];
    $acl_detail=$_POST["acl_detail"];
    $co_title1=$_POST["co_title1"];
    $co_detail1=$_POST["co_detail1"];
    $co_title2=$_POST["co_title2"];
    $co_detail2=$_POST["co_detail2"];
    $co_title3=$_POST["co_title3"];
    $co_detail3=$_POST["co_detail3"];
    $co_title4=$_POST["co_title4"];
    $co_detail4=$_POST["co_detail4"];
    $co_title5=$_POST["co_title5"];
    $co_detail5=$_POST["co_detail5"];


    /*
    if(!$acl_title==""){
        if(!isset($_FILES["acl_image"]["error"]) || !is_int($_FILES["acl_image"]["error"])){
            echo "値の取得に失敗しました！";
        }
        else{
            $acl_file_name = $_FILES["acl_image"]["name"];
            $acl_file_path = $_FILES["acl_image"]["tmp_name"];
            $acl_file_fpath = $acl_file_path .'/'. $acl_file_name;
            //var_dump($acl_file_fpath);
            
            var_dump($_FILES["acl_image"]);
            print $file_name;
            print $file_path;
        }
    }

    if(!$co_title1==""){
        if(!isset($_FILES["co_image1"]["error"]) || !is_int($_FILES["co_image1"]["error"])){
            echo "値の取得に失敗しました！";
        }
        else{
            $co_file_name1 = $_FILES["co_image1"]["name"];
            $co_file_path1 = $_FILES["co_image1"]["tmp_name"];
        }
    }
    if(!$co_title2==""){
        if(!isset($_FILES["co_image2"]["error"]) || !is_int($_FILES["co_image2"]["error"])){
            echo "値の取得に失敗しました！";
        }
        else{
            $co_file_name2 = $_FILES["co_image2"]["name"];
            $co_file_path2 = $_FILES["co_image2"]["tmp_name"];
        }
    }
    else{
        $co_file_name2 = "";
        $co_file_path2 = "";
    }

    if(!$co_title3==""){
        if(!isset($_FILES["co_image3"]["error"]) || !is_int($_FILES["co_image3"]["error"])){
            echo "値の取得に失敗しました！";
        }
        else{
            $co_file_name3 = $_FILES["co_image3"]["name"];
            $co_file_path3 = $_FILES["co_image3"]["tmp_name"];
        }
    }
    else{
        $co_file_name3 = "";
        $co_file_path3 = "";
    }

    if(!$co_title4==""){
        if(!isset($_FILES["co_image4"]["error"]) || !is_int($_FILES["co_image4"]["error"])){
            echo "値の取得に失敗しました！";
        }
        else{
            $co_file_name4 = $_FILES["co_image4"]["name"];
            $co_file_path4 = $_FILES["co_image4"]["tmp_name"];
        }
    }
    else{
        $co_file_name4 = "";
        $co_file_path4 = "";
    }

    if(!$co_title5==""){
        if(!isset($_FILES["co_image5"]["error"]) || !is_int($_FILES["co_image5"]["error"])){
            echo "値の取得に失敗しました！";
        }
        else{
            $co_file_name5 = $_FILES["co_image5"]["name"];
            $co_file_path5 = $_FILES["co_image5"]["tmp_name"];
        }
    }
    else{
        $co_file_name5 = "";
        $co_file_path5 = "";
    }
    */

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/default.css">
    </head>
    <body>
        <div id="container_o">
            <form action="input_article_execute.php" method="post" enctype="multipart/form-data">
                
                
                <h2 align="center">コンテンツ内容を確認してください</h2>
                
                <fieldset style="margin-bottom:30px;">
                    <legend>コンテンツ概要 登録</legend>
                    <table id="input_value">
                        <tr>
                            <td width="200">記事タイトル：</td>
                            <td><input type="text" size="100" value="<?php print $acl_title ?>" disabled id="dltcolor"></td>
                        </tr>
            
                        <tr>
                            <td>記事詳細：</td>
                            <td><textarea cols=100 rows=3 disabled id="dltcolor"><?php print $acl_detail ?></textarea></td>
                        </tr>
                        <tr>
                            <td>キービジュアル：</td>
                            <td><input type="file" accept="image/*" name="acl_image"></td>
                        </tr>

                        <!--
                        <tr>
                            <td>キービジュアル：</td>
                            <td><input type="text" size="100" value="<?php print $acl_file_name ?>" disabled id="dltcolor"></td>
                        </tr>
                        -->
                        
                    </table>
                </fieldset>
                
                <fieldset>
                    <legend>コンテンツ詳細 登録</legend>
                    <table id="input_value">
                        <tr>
                            <td width="200">コンテンツタイトル1：</td>
                            <td><input type="text" name="co_title1" size="100" value="<?php print $co_title1 ?>" disabled id="dltcolor"></td>
                        </tr>
                        <tr>
                            <td>コンテンツ詳細1：</td>
                            <td><textarea name="co_detail1" cols=100 rows=3 disabled id="dltcolor"><?php print $co_detail1 ?></textarea></td>
                        </tr>
                        
                        <tr>
                            <td>記事写真1：</td>
                            <td><input type="file" accept="image/*" name="co_image1"></td>
                        </tr>

                        <!--
                        <tr>
                            <td>記事写真1：</td>
                            <td><input type="text" size="100" value="<?php print $co_file_name1 ?>" disabled id="dltcolor"></td>
                        </tr>
                        -->
                                                
                        <tr>
                            <td>コンテンツタイトル2：</td>
                            <td><input type="text"  name="co_title2" size="100" value="<?php print $co_title2 ?>" disabled id="dltcolor"></td>
                        </tr>
                        <tr>
                            <td>コンテンツ詳細2：</td>
                            <td><textarea name="co_detail2" cols=100 rows=3 disabled id="dltcolor"><?php print $co_detail2 ?></textarea></td>
                        </tr>
                        <tr>
                            <td>記事写真2：</td>
                            <td><input type="file" accept="image/*" name="co_image2"></td>
                        </tr>
                        
                        <!--
                        <tr>
                            <td>記事写真2：</td>
                            <td><input type="text" size="100" value="<?php print $co_file_name2 ?>" disabled id="dltcolor"></td>
                        </tr>
                        -->
                        
                        <tr>
                            <td>コンテンツタイトル3：</td>
                            <td><input type="text"  name="co_title3" size="100" value="<?php print $co_title3 ?>" disabled id="dltcolor"></td>
                        </tr>
                        <tr>
                            <td>コンテンツ詳細3：</td>
                            <td><textarea name="co_detail3" cols=100 rows=3 disabled id="dltcolor"><?php print $co_detail3 ?></textarea></td>
                        </tr>
                        <tr>
                            <td>記事写真3：</td>
                            <td><input type="file" accept="image/*" name="co_image3"></td>
                        </tr>
                        
                        <!--
                        <tr>
                            <td>記事写真3：</td>
                            <td><input type="text" size="100" value="<?php print $co_file_name3 ?>" disabled id="dltcolor"></td>
                        </tr>
                        -->
                        
                        <tr>
                            <td>コンテンツタイトル4：</td>
                            <td><input type="text"  name="co_title4" size="100" value="<?php print $co_title4 ?>" disabled id="dltcolor"></td>
                        </tr>
                        <tr>
                            <td>コンテンツ詳細4：</td>
                            <td><textarea name="co_detail4" cols=100 rows=3 disabled id="dltcolor"><?php print $co_detail4 ?></textarea></td>
                        </tr>
                        <tr>
                            <td>記事写真4：</td>
                            <td><input type="file" accept="image/*" name="co_image4"></td>
                        </tr>

                        <!--
                        <tr>
                            <td>記事写真4：</td>
                            <td><input type="text" size="100" value="<?php print $co_file_name4 ?>" disabled id="dltcolor"></td>
                        </tr>
                        -->

                        <tr>
                            <td>コンテンツタイトル5：</td>
                            <td><input type="text" name="co_title5" size="100" value="<?php print $co_title5 ?>" disabled id="dltcolor"></td>
                        </tr>
                        <tr>
                            <td>コンテンツ詳細5：</td>
                            <td><textarea name="co_detail5" cols=100 rows=3 disabled id="dltcolor"><?php print $co_detail5 ?></textarea></td>
                        </tr>
                        <tr>
                            <td>記事写真5：</td>
                            <td><input type="file" accept="image/*" name="co_image5"></td>
                        </tr>

                        <!--
                        <tr>
                            <td>記事写真5：</td>
                            <td><input type="text" size="100" value="<?php print $co_file_name5 ?>" disabled id="dltcolor"></td>
                        </tr>
                        -->
                        
                    </table>
                </fieldset>
                
                <input type="hidden" name="acl_title" value="<?php print $acl_title ?>">
                <input type="hidden" name="acl_detail" value="<?php print $acl_detail ?>">
                
                <input type="hidden" name="co_title1" value="<?php print $co_title1 ?>">
                <input type="hidden" name="co_detail1" value="<?php print $co_detail1 ?>">

                <input type="hidden" name="co_title2" value="<?php print $co_title2 ?>">
                <input type="hidden" name="co_detail2" value="<?php print $co_detail2 ?>">

                <input type="hidden" name="co_title3" value="<?php print $co_title3 ?>">
                <input type="hidden" name="co_detail3" value="<?php print $co_detail3 ?>">

                <input type="hidden" name="co_title4" value="<?php print $co_title4 ?>">
                <input type="hidden" name="co_detail4" value="<?php print $co_detail4 ?>">

                <input type="hidden" name="co_title5" value="<?php print $co_title5 ?>">
                <input type="hidden" name="co_detail5" value="<?php print $co_detail5 ?>">

                <!--
                <input type="hidden" name="acl_file_name" value="<?php print $acl_file_name ?>">
                <input type="hidden" name="acl_file_path" value="<?php print $acl_file_path ?>">
                <input type="hidden" name="co_file_name1" value="<?php print $co_file_name1 ?>">
                <input type="hidden" name="co_file_path1" value="<?php print $co_file_path1 ?>">
                <input type="hidden" name="co_file_name2" value="<?php print $co_file_name2 ?>">
                <input type="hidden" name="co_file_path2" value="<?php print $co_file_path2 ?>">
                <input type="hidden" name="co_file_name3" value="<?php print $co_file_name3 ?>">
                <input type="hidden" name="co_file_path3" value="<?php print $co_file_path3 ?>">
                <input type="hidden" name="co_file_name4" value="<?php print $co_file_name4 ?>">
                <input type="hidden" name="co_file_path4" value="<?php print $co_file_path4 ?>">
                <input type="hidden" name="co_file_name5" value="<?php print $co_file_name5 ?>">
                <input type="hidden" name="co_file_path5" value="<?php print $co_file_path5 ?>">
                -->

                <input type="image" src="../images/btn-input.png" id="submit-input" value="記事を登録する">
            </form>
    
            <form action="input_article.php" method="get">
                <input type="image" src="../images/btn-cancel.png" id="submit-cancel" value="元に戻る">
            </form>
        </div>
    </body>
</html>