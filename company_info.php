<?php 
    include "sidemenu.php";
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Connexy - ビジネス向けの記事を紹介しています</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.1.min.js"></script>
        <script type="text/javascript" src="./js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="./favicon.ico">

        <!--
        <script type="text/javascript">
            function slideSwitch(){
                var $active = $("#slideshow img.active");

                if ($active.length == 0) $active = $("#slideshow img:last");

                var $next =  $active.next().length ? $active.next()
                    : $("#slideshow img:first");

                $active.addClass("last-active");

                $next.css({opacity: 0.0})
                .addClass("active")
                .animate({opacity: 1.0}, 1000, function() {
                    $active.removeClass("active last-active");
                });
            }

            $(function() {
               setInterval("slideSwitch()", 3000);
            });
        </script>
        -->
        
    </head>

    <body>        
        <div class="sm_container">
            <!--
            <div id="slideshow" style="position: relative;">
                <div class="active">
                    <img src="./images/keyvisual01.jpg" alt="" />
                    <img src="./images/keyvisual02.jpg" alt="" />
                    <img src="./images/keyvisual03.jpg" alt="" />
                </div>
                
                <div style="position: absolute; top:160px; left:80px; width: 80%; font-size:28px; color: grey;">
                    毎日の仕事が楽しくなる<br>
                    日々の業務に使えるネタがつまった記事を取り扱っております
                </div>
            </div>

            <h3 id="toplabel">
                最新の投稿記事はこちら
            </h3>
            -->
            
            <div class = "firstview_top" style="margin-top: 5%;">
                <div class="row" id="masonry">
                    <?php
                        $pdo = new PDO("mysql:host=localhost;dbname=news_academy;charset=utf8", "root", "");
                        $sql = "SELECT * FROM category_contents_top JOIN contents_detail ON category_contents_top.contents_id = contents_detail.contents_id";
                        $stmt = $pdo->prepare($sql);
                        $result = $stmt->execute();
                        //var_dump($result);
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        //var_dump($results);

                        foreach($results as $row) {
                            $contents_id = $row["contents_id"];
                            $image_path = $row["top_image_path"];
                            $image_title = $row["contents_title"];

                            echo '<div class="col-lg-4 col-sm-3 col-xs-1">';
                                echo '<div class="panel">';
                                    echo '<div class="panel-body">';
                                        echo "<a href='contents_detail.php?id=$contents_id'>";
                                        echo '<img src="' .$image_path. '" id="image">';
                                        echo '<p id="img_title" align="center">' .$image_title. '</p>';
                                        echo "</a>";
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        }
                    ?>
                    
                </div>                
            </div>
            <?php include "footer.php" ?>
        </div>
        
        <!--
        <script>
            $(function(){
                $('#masonry').masonry({
                    itemSelector: '.grid',
                    isFitWidth: true,
                    isAnimated: true
                });
            });
        </script>
        -->

    </body>
</html>