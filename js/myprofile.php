<?php 
    if(!isset($_SESSION)){ 
        session_start(); 
        $loginid = $_SESSION["loginid"];
        $lname1 = $_SESSION["lname1"];
        $fname1 = $_SESSION["fname1"];

        $pdo = new PDO("mysql:host=localhost; dbname=Connexy_DB; charset=utf8", "root", "");
        $sql = "SELECT UniversityInfo, UniversityFaculty, UniversityDeftInfo, UserAge, UserGrade FROM User_Properties_C WHERE UserLoginID = '$loginid'";
        //print "<div style='margin-top:5%;'>";
        //print "</div>";        
        //print $sql;
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($results);
 
        foreach($results as $row) {
            $university = $row["UniversityInfo"];
            $universityfac = $row["UniversityFaculty"];
            $universitydept = $row["UniversityDeftInfo"];
            $age = $row["UserAge"];
            $grade = $row["UserGrade"];
        }
    }

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CONNEXY - My Profile</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">
        <script type="text/javascript" src="./js/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="./js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php include "sidemenu.php" ?>
        <?php include "header.php" ?>
        
        <div class="sm_container" style="margin-top: 4%;">
            <div class="row">
                <div class="col-xs-12" style="float: left; margin: 0 auto;">
                    <h4 style="margin-left: 5%;">My Profile</h4>
                    <img class="pull-left col-xs-5" style="padding:0; margin:0 30px 0 5%; width: 300px; height: 220px;" src="./images/image02.jpg">
                    <table class="table table-striped" style="width: 50%;">
                        <tr><td>名前</td><td><?php print $lname1 . " " . $fname1 ?></td></tr>
                        <tr><td>年齢</td><td><?php print $age ?></td></tr>
                        <tr><td>大学名</td><td><?php print $university ?></td></tr>
                        <tr><td>学部名</td><td><?php print $universityfac ?></td></tr>
                        <tr><td>学科名</td><td><?php print $universitydept ?></td></tr>
                        <tr><td>年次</td><td><?php print $grade ?></td></tr>
                        <!--
                        <tr><td>名前</td><td>黒田 大輔</td></tr>
                        <tr><td>年齢</td><td>20歳</td></tr>
                        <tr><td>大学名</td><td>広島市立大学</td></tr>
                        <tr><td>学部名</td><td>情報科学部</td></tr>
                        <tr><td>学科名</td><td>情報数理学科</td></tr>
                        <tr><td>年次</td><td>2年生</td></tr>
                        -->
                        <tr><td></td><td></td></tr>
                    </table>
                    <!--<p>このテキストが回りこむ</p>-->
                </div>
                
                <form action="" method="post" class="form-inline text-center">
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-th-large">プロフィールを編集する</span>
                    </button>
                </form>
                
                </form>
                
                
            </div>
        </div>        
    </body>
</html>