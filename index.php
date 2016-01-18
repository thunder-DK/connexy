<?php
    include "header.php";
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CONNEXY - 就活生と企業を結ぶプラットフォーム</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.1.min.js"></script>
        <!-- <script type="text/javascript" src="./js/jquery-1.2.6.min.js"></script> -->
        <script type="text/javascript" src="./js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="./images/favicon.ico">

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
        <script>
            $(window).on("load resize", function(){
                var mainheight = $(window).height();
                $("#main-visual").css("height", mainheight);
            });
        </script>
    </head>

    <body>        
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-top:50px;">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
        
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active main-visual">
                    <!--<img src="images/keyvisual01.jpg" alt="">-->
                    <img src="images/PAK66_tokainobiru20130525.jpg" alt="">
                    <div class="carousel-caption">
                        写真1
                    </div>
                </div>
                    
                <div class="item main-visual">
                    <!--<img src="images/keyvisual02.jpg" alt="">-->
                    <img src="images/20130321-P3210210.jpg" alt="">
                    <div class="carousel-caption">
                        写真2
                    </div>
                </div>
                    
                <div class="item main-visual">
                    <!--<img src="images/keyvisual03.jpg" alt="">-->
                    <img src="images/PAK86_seisakudb20140517.jpg" alt="">
                    <div class="carousel-caption">
                        写真3
                    </div>
                </div>
                
                <div class="main-visual-copy">                
                    「CONNEXY」はあなたの就職活動を支援するサービスです。<br>
                    <br>
                    企業を就職活動中の学生をつなげるサービスでです。
                </div>
                
            </div>
        </div>
        
        <div id="top_container">            
            <h3 id="toplabel">
                最新の投稿記事はこちら
            </h3>

            <!--
            <ul class="register">
                <li><a href="admin/logout.php">企業の方はコチラ</a></li>
                <li><a href="admin/login.php">大学生の方はコチラ</a></li>
            </ul>
            -->

            <div id = "firstview_top">
                <div class="row" id="masonry">
                    <?php
                        $pdo = new PDO("mysql:host=localhost;dbname=news_academy;charset=utf8", "root", "");
                        $sql = "SELECT * FROM category_contents_top JOIN contents_detail ON category_contents_top.contents_id = contents_detail.contents_id";
                        $stmt = $pdo->prepare($sql);
                        $result = $stmt->execute();
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach($results as $row) {
                            $contents_id = $row["contents_id"];
                            $image_path = $row["top_image_path"];
                            $image_title = $row["contents_title"];

                            echo '<div class="col-lg-4 col-sm-4 col-xs-2">';
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
        
    </body>
</html>