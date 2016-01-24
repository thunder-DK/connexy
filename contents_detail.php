<?php
    include "sidemenu.php";
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>記事内容</title>

        <!-- Bootstrap -->
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.1.min.js"></script>        
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="shortcut icon" href="./favicon.ico">
    </head>

    <body>
        <script type="text/javascript" src="./js/masonry.pkgd.min.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src="./js/bootstrap.min.js"></script>
        
        <div class="sm_container" style="margin-top: 1%; margin-left: 1%; margin-right: 1%;">
            
            <div id="contents_view">
                <?php
                    $contents_id = $_GET["id"];

                    $pdo = new PDO("mysql:host=localhost;dbname=news_academy;charset=utf8", "root", "");
                    $sql = "SELECT * FROM contents_detail WHERE contents_id = " .$contents_id;

                    $stmt = $pdo->prepare($sql);
                    $result = $stmt->execute();
                    //var_dump($result);
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    //var_dump($results);

                    foreach($results as $row) {
                        $contents_id = $row["contents_id"];
                        $k_image_path = $row["kv_image_path"];
                        $k_image_title = $row["contents_title"];
                        $k_image_detail = $row["contents_detail"];
                        $subtitle1 = $row["subtitle1"];
                        $subtitle1_detail = $row["subtitle1_detail"];
                        $subtitle1_image_path = $row["subtitle1_image_path"];
                        $subtitle2 = $row["subtitle2"];
                        $subtitle2_detail = $row["subtitle2_detail"];
                        $subtitle2_image_path = $row["subtitle2_image_path"];
                        $subtitle3 = $row["subtitle3"];
                        $subtitle3_detail = $row["subtitle3_detail"];
                        $subtitle3_image_path = $row["subtitle3_image_path"];
                        $subtitle4 = $row["subtitle4"];
                        $subtitle4_detail = $row["subtitle4_detail"];
                        $subtitle4_image_path = $row["subtitle4_image_path"];
                        $subtitle5 = $row["subtitle5"];
                        $subtitle5_detail = $row["subtitle5_detail"];
                        $subtitle5_image_path = $row["subtitle5_image_path"];
                        
                        echo '<div id="contents_keyvisual">';
                            echo '<img src="' .$k_image_path. '">';
                            echo '<h2>' .$k_image_title. '</h2>';
                            echo '<p>' .$k_image_detail. '</p>';
                        echo '</div>';
                        
                        echo '<div id="contents_showarea">';
                        
                            if(!empty($subtitle1)){
                                echo '<div id="contents_description1">';
                                    echo '<h3>' .$subtitle1. '</h3>';
                                    echo '<p>' .$subtitle1_detail. '</p>';
                                    echo '<img src="' .$subtitle1_image_path. '">';
                                echo '</div>';
                            }

                            if(!empty($subtitle2)){
                                echo '<div id="contents_description2">';
                                    echo '<h3>' .$subtitle2. '</h3>';
                                    echo '<p>' .$subtitle2_detail. '</p>';
                                    echo '<img src="' .$subtitle2_image_path. '">';
                                echo '</div>';
                            }

                            if(!empty($subtitle3)){
                                echo '<div id="contents_description3">';
                                    echo '<h3>' .$subtitle3. '</h3>';
                                    echo '<p>' .$subtitle3_detail. '</p>';
                                    echo '<img src="' .$subtitle3_image_path. '">';
                                echo '</div>';
                            }


                            if(!empty($subtitle4)){
                                echo '<div id="contents_description4">';
                                    echo '<h3>' .$subtitle4. '</h3>';
                                    echo '<p>' .$subtitle4_detail. '</p>';
                                    echo '<img src="' .$subtitle4_image_path. '">';
                                echo '</div>';
                            }

                            if(!empty($subtitle5)){
                                echo '<div id="contents_description5">';
                                    echo '<h3>' .$subtitle5. '</h3>';
                                    echo '<p>' .$subtitle5_detail. '</p>';
                                    echo '<img src="' .$subtitle5_image_path. '">';
                                echo '</div>';
                            }
                        echo '</div>';
                    }
                ?>
            </div>
            <?php include "footer.php" ?>
        </div>

    </body>
</html>