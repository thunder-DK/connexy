<?php

    /*
    $name1 = "";
    $name2 = "";

    $si = session_id();
    if(!empty($si)){
    //if(!isset($_SESSION)){

        //session_start();

        $name1 = $_SESSION["lname1"];
        $name2 = $_SESSION["fname1"];
        $loginP = $_SESSION["loginP"];
    }
    */
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        
        <!-- Bootstrap -->
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.1.min.js"></script>
        <script type="text/javascript" src="./js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="./images/favicon.ico">
    </head>
    
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" style="height: 50px;">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".target">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">connexy</a>
            </div>
            
            <?php if(empty($name1)): ?>
                <div class="collapse navbar-collapse target" style="height: 50px;">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="admin/login.php?loginP=r">大学生の方はコチラ</a></li>
                        <li class="active" style="margin-right:20px;"><a href="admin/login.php?loginP=c">企業の方はコチラ</a></li>
                    </ul>
                </div>
            
            <?php elseif(isset($name1)): ?>
                <div class="collapse navbar-collapse target" style="height: 50px;">
                    <ul class="nav navbar-nav navbar-right">
                        <?php if($loginP == "r"): ?>
                            <li class="active"><a href="feed.php?loginP=r">ようこそ　<?php print $name1 . "　" . $name2 ?>　さん！</a></li>
                        <?php elseif($loginP == "c"): ?>
                            <li class="active"><a href="feed.php?loginP=c">ようこそ　<?php print $name1 . "　" . $name2 ?>　さん！</a></li>
                        <?php endif; ?>
                        
                        <li class="active" style="display:block; margin-right:20px;"><a href="admin/logout.php">ログアウト</a></li>
                    </ul>
                </div>

            <?php endif; ?>

        </nav>
    </body>
</html>