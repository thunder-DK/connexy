<?php
    if(!isset($_SESSION)){
        session_start();

        $lname1 = $_SESSION["lname1"];
        $fname1 = $_SESSION["fname1"];
        $loginP = $_SESSION["loginP"];
        $loginid = $_SESSION["loginid"];
    }
    else{
        $lname1 = $_SESSION["lname1"];
        $fname1 = $_SESSION["fname1"];
        $loginP = $_SESSION["loginP"];
        $loginid = $_SESSION["loginid"];
    }
    
    if($loginP == "r"){
        $pdo = new PDO("mysql:host=localhost; dbname=Connexy_DB; charset=utf8", "root", "");
        $sql = "SELECT UserProfileImage FROM User_Properties_C WHERE UserLoginID = :n_id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':n_id', $loginid, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $row) {
            $upflimage = $row["UserProfileImage"];
        }
    }

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CONNEXY</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/default.css">
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.1.min.js"></script>
        <script type="text/javascript" src="./js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="./images/favicon.ico">
    </head>
    
    <body>
        <div id="sidemenu" style="background-color: #222;">
            <div class="logo" id="imageframe" style="margin: 5% 5% 5% 5%; border: solid 1px #222; background-color: #b22222; vertical-align: middle;">
                <p style="font-size: 25px; color: white;">connexy</p>
            </div>
            
            <div id="side_menubar" style="margin-top: 10px;">
                
                <?php if($loginP == "r"): ?>

                    <div id="imageframe" style="margin-left: 5%; marin-right: 5%; margin-bottom: 5%; width: 90%; height: 180px; display: block; border: solid 2px; background-color: white;">

                        <!-- 画像が選択されていない時 -->
                        <?php if($upflimage == ""): ?>
                            <div style="margin-top: 15px; margin-left: 15px; margin-right: 15px; height: 120px; border: solid 1px;" class="imageipsn">
                                <p style="text-align: center; margin-top: 50px; font-size: 15px;">NO IMAGE</p>
                            </div>

                        <!-- 画像が選択されている時 -->
                        <?php else: ?>
                            <img src="<?php print $upflimage ?>" style="margin-top: 15px; margin-left: 15px; margin-right: 15px; max-height: 120px; height: 100%; max-width: 200px; width: 90%;" class="thumbnails">
                        <?php endif; ?>
                        <p style="margin-top: 10px;"><?php print $lname1 . " " . $fname1 . " さん"?></p>
                    </div>

                    <ul style="margin-left: 5%; margin-right: 5%;">
                        <button type="button" class="btn btn-default btn-sm btn-block" onclick="location.href='./myprofile.php'">MY</button>
                        <button type="button" class="btn btn-default btn-sm btn-block" onclick="location.href='./feed.php'">Feed</button>
                        <button type="button" class="btn btn-default btn-sm btn-block" onclick="location.href='./company_info.php'">企業情報</button>
                        <button type="button" class="btn btn-default btn-sm btn-block" onclick="location.href='./community.php'">Community</button>
                        <button type="button" class="btn btn-default btn-sm btn-block" onclick="location.href='./education.php'">Education</button>
                        <button type="button" class="btn btn-default btn-sm btn-block" onclick="location.href='./news.php'">News</button>
                        <button type="button" class="btn btn-default btn-sm btn-block">メッセージ</button>
                        <button type="button" class="btn btn-default btn-sm btn-block">フレンド</button>
                        <button type="button" class="btn btn-defalut btn-sm btn-block" onclick="location.href='./admin/logout.php'">ログアウト</button>
                    </ul>
                
                <?php elseif($loginP == "c"): ?>
                    <ul style="margin-left: 5%; margin-right: 5%;">
                        <button type="button" class="btn btn-default btn-sm btn-block" onclick="location.href='./myprofile.php'">MY</button>
                        <button type="button" class="btn btn-default btn-sm btn-block" onclick="location.href='./feed.php'">Feed</button>
                        <button type="button" class="btn btn-default btn-sm btn-block" onclick="location.href='./company_info.php'">企業情報</button>
                        <button type="button" class="btn btn-default btn-sm btn-block" onclick="location.href='./community.php'">Community</button>
                        <button type="button" class="btn btn-default btn-sm btn-block" onclick="location.href='./education.php'">Education</button>
                        <button type="button" class="btn btn-default btn-sm btn-block" onclick="location.href='./news.php'">News</button>
                        <button type="button" class="btn btn-default btn-sm btn-block">メッセージ</button>
                        <button type="button" class="btn btn-default btn-sm btn-block">フレンド</button>
                        <button type="button" class="btn btn-defalut btn-sm btn-block" onclick="location.href='./admin/logout.php'">ログアウト</button>
                    </ul>

                <?php endif; ?>
            </div>
        </div>

    </body>
</html>