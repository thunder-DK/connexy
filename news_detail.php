<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
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
            <div style="margin-top: 5%; margin-left: 10%; width: 80%; height: 350px;">
                <h3>News詳細</h3>
                <?php

                    $get_value = $_GET["id"];

                    $pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
                    $sql = "SELECT * FROM news WHERE news_id = $get_value";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($results as $row) {
                        $cc_date = substr($row["create_date"],0,10);
                        print $cc_date;
                        print "<tr>";
                        print $row["news_title"];
                        print "</tr>";
                        print "<tr>";
                        print $row["news_detail"];
                        print "</tr>";
                    }
                    $pdo = null;
                ?>
                <p style="float: right; align: right; margin-top: 5%;"><a href="news.php">ニュース一覧へ</a></p>
            </div>
            <?php include "footer.php"; ?>
        </div>
    </body>
</html>

    
    <!--#information-->
    <!--
    <footer class="footer contents-box">
    <h2 class="section-title text-center"><span class="section-title__white">Information</span><span class="section-title-ja section-title__white text-center">基本情報</span></h2>

        <div class="inner">
            <ul class="list-footer clearfix">
                <li class="text-center"><img src="img/kunsei_cheese.png" alt="space_image" width="175" height="127"></li>
                <li class="maps"><iframe width="300" height="222" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1620.879730972407!2d139.70531929996108!3d35.65829752117608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xff3d912f43a54715!2z5riL6LC344Kv44Ot44K544K_44Ov44O8!5e0!3m2!1sja!2sjp!4v1437965881707" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></li>
                <li class="text-center"><img src="img/kunsei_cheese.png" alt="space_image" width="175" height="127"></li>
            </ul>
        <p class="footer-caution">※実際にはチーズアカデミーという学校は存在しません。<br />
くれぐれも間違ってデジタルハリウッドにお問い合わせすることのないようにご注意ください。</p>
        </div>
    </section>
    -->
    <!--end #information-->
    
<!--<p class="btn-pageTop"><a href="#"><img src="img/btn-pagetop.png" alt=""></a></p>
</body>
</html>-->