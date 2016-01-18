<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CONNEXY - 就活生と企業を結ぶプラットフォーム</title>
        <link rel="shortcut icon" href="./images/favicon.ico">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/default.css">
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.1.min.js"></script>
        <!--<script type="text/javascript" src="./js/jquery-1.2.6.min.js"></script>-->
        <script type="text/javascript" src="./js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php include "sidemenu.php" ?>
        <?php //include "header.php" ?>
    
        <div class="sm_container">
            <div style="margin-top: 5%; margin-left: 10%; height: 350px;">
                <h3>News</h3>
                <!--<h3 style="aligh: center; margin-top: 8%; margin-left: 30%;">News</h3>-->
                <p style="aligh: center;">お知らせ・更新情報</p>

                <table>
                    <?php
                        $pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
                        $sql = "SELECT * FROM news ORDER BY create_date DESC LIMIT 5";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach($results as $row) {
                            $news_id = $row["news_id"];
                            $c_date = substr($row["create_date"],0,10);
                            print "<tr style='height: 30px;'>";
                            print "<td style='width: 120px;'>" . $c_date . "</td>";
                            $cc_newstitle = $row["news_title"];
                            print "<td><a href=\"news_detail.php?id=$news_id\">$cc_newstitle</a></td>";
                            // print $row["news_title"];
                            print "</tr>";
                        }
                        $pdo = null;
                    ?>
                </table>    
            </div>

            <!--<p class="view-detail text-right" style="margin-right: 5%;"><a href="news_list.php">ニュース一覧を見る</a></p>-->
            <?php include "footer.php"; ?>
        </div>
    </body>

</html>