<?php 
    include "sidemenu.php";

    $get_value = $_GET["id"];
    $pdo = new PDO("mysql:host=localhost; dbname=Connexy_DB; charset=utf8", "root", "");
    //$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
    $sql = "SELECT * FROM news WHERE news_id = $get_value";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        
        <!-- Bootstrap -->
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/default.css">
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.1.min.js"></script>
        <!--<script type="text/javascript" src="./js/jquery-1.2.6.min.js"></script>-->
        <script type="text/javascript" src="./js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="./favicon.ico">
    </head>
    <body>
        <div class="sm_container" style="padding-left: 3%; padding-right: 2.5%;">
            <div style="margin-top: 5%; margin-left: 10%; margin-bottom: 12%; width: 80%; height: 350px;">
                <h3 style="margin-bottom: 8%;">News詳細</h3>
                <?php         
                    foreach($result as $row) {
                        $cc_date = substr($row["create_date"],0,10);
                        print "<p style='font-size: 18px;'>" . $cc_date . "</p>";
                        print "<tr>";
                            print $row["news_title"];
                            print "</tr>";
                            print "<tr>";
                            print $row["news_detail"];
                        print "</tr>";
                    }
                    $pdo = null;
                ?>
                <p style="float: right; align: right; margin-top: 20%;"><a href="news.php">ニュース一覧へ</a></p>
            </div>
            <?php include "footer.php"; ?>
        </div>
    </body>
</html>