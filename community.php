<?php 
    include "sidemenu.php"
    //include "header.php" 
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CONNEXY - communityで楽しもう！</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.1.min.js"></script>
        <script type="text/javascript" src="./js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="./favicon.ico">
    </head>
    <body>        
        <div class="sm_container" style="margin-top: 5%;">
            <form action="community_detail.php" method="post" class="form-inline text-center" role="form">
                <div class="form-group has-error">
                    <input type="text" style="width: 400px;" placeholder="検索" id="searchWord" class="form-control">
                </div>
                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search">検索
                </button>
                <!--
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-th-large">表示
                </button>
                <button type="button" class="btn btn-default">
                    <span class="glyphicon glyphicon-plus">追加
                </button>
                -->
            </form>
            
            <h4 style="text-align: center; margin-top: 30px;">今入っているコミュニティ</h4>
             
        </div>
    </body>
</html>