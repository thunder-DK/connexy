<?php
    include "sidemenu.php";

    if(!isset($_SESSION)){
        session_start();
        $loginid = $_SESSION["loginid"];
        $lname1 = $_SESSION["lname1"];
        $fname1 = $_SESSION["fname1"];
    }
    else{
        $loginid = $_SESSION["loginid"];
        $lname1 = $_SESSION["lname1"];
        $fname1 = $_SESSION["fname1"];
    }

    $pdo = new PDO("mysql:host=localhost; dbname=Connexy_DB; charset=utf8", "root", "");
    $sql = "SELECT UserID FROM User_Master WHERE UserLoginID = :n_id";
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':n_id', $loginid, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($result as $row) {
        $uid = $row["UserID"];
    }

    $sql = "SELECT UserProfileImage FROM User_Properties_C WHERE UserLoginID = :n_id";
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':n_id', $loginid, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($result as $row) {
        $upflimage = $row["UserProfileImage"];
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
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="./js/bootstrap.min.js"></script>
        <script src="http://cdn.mlkcca.com/v2.0.0/milkcocoa.js"></script>
        <link rel="shortcut icon" href="./favicon.ico">
        
        <style>
            /* balloon common */
            div.balloon-wrapper {
                width: 500px;
                /*max-width: 1200px;
                width: 100%;*/
                margin: 15px auto;
            }
            
            div.balloon-wrapper::after {
                clear: both;
                content: "";
                display: block;
                line-height: 0;
            }
            
            p.balloon-left,
            p.balloon-right {
                position: relative;
                z-index: 1;
                max-width: 80%;
                min-width: 10%;
                margin: 15px auto;
                padding: 13px;
                background-color: #fff;
                border-width: 3px;
                border-style: solid;
                border-radius: 10px;
            }
            
            p.balloon-left::before,
            p.balloon-right::before {
                content: "";
                display: block;
                position: absolute;
                z-index: 10;
                top: 10px;
                width:  0;
                height: 0;
                border: 15px solid transparent;
            }
            
            p.balloon-left::after,
            p.balloon-right::after {
                content: "";
                display: block;
                position: absolute;
                z-index: 100;
                top: 10px;
                width:  0;
                height: 0;
                border: 15px solid transparent;
            }

            /* balloon left */
            p.balloon-left {
                float: left;
                border-color: #a9a9a9;
                /*border-color: #8d8;*/
            }
            
            p.balloon-left::before {
                left: -31px;
                border-right: 15px solid #a9a9a9;
                /*border-right: 15px solid #8d8;*/
            }
            
            p.balloon-left::after {
                left: -26px;
                border-right: 15px solid #fff;
            }

            /* balloon right */
            p.balloon-right {
                /*min-width: 320px;
                max-width: 800px;
                margin: auto;*/
                float: right;
                background-color: #98fb98;
                border-color: #a9a9a9;
                /*border-color: #aad;*/
            }
            
            p.balloon-right::before {
                right: -31px;
                border-left: 15px solid #a9a9a9;
                /*border-left: 15px solid #aad;*/
            }
            
            p.balloon-right::after {
                right: -26px;
                border-left: 15px solid #98fb98;
                /*border-left: 15px solid #fff;*/
            }
            
            .text-left{
                float: left;
                margin: 40px 0px 0px 10px;
                font-size: 10px;
            }
            
            .text-right{
                float: right;
                margin: 40px 10px 0px 0px;
                font-size: 10px;
            }
                        
            .imageframe {
                background-color: gainsboro;
                width: 300px;
                border-radius: 300px;
                -webkit-border-radius: 300px;
                -moz-border-radius: 300px;
            }
            
            .imageframe div{
                background-color: gainsboro;
                width: 300px;
                border-radius: 300px;
                -webkit-border-radius: 300px;
                -moz-border-radius: 300px;
            }        
        </style>

        <script>
            $(function() {
                //1.ミルクココアインスタンスを作成
                var milkcocoa = new MilkCocoa("onifc51rff.mlkcca.com");
                
                //2."message"データストアを作成
                var ds = milkcocoa.dataStore("message");
                //var history = milkcocoa.dataStore("message").history();
                
                //3."message"データストアからメッセージを取ってくる
                ds.stream().sort("desc").next(function(err, datas) {
                //history.sort("asc").on(function(err, datas) {
                    datas.forEach(function(data) {
                        renderMessage(data);
                    });
                });

                //4."message"データストアのプッシュイベントを監視
                ds.on("push", function(e) {
                //history.on("push", function(e) {
                    renderMessage(e);
                });

                var last_message = "dummy";
                function renderMessage(message) {
                    '<div class="balloon-wrapper">'                    
                        var url_html = escapeHTML(message.value.iurl);
                        var id_html = escapeHTML(message.value.uid);

                        // 自分が回答したものは右側に表示される
                        if(id_html == '<?php print $uid ?>'){
                            var message_html = '<p class="balloon-right" style="margin-right: 20px;">' + escapeHTML(message.value.content) + '</p>';

                            var date_html = '';
                            if(message.value.date) {
                                date_html = '<p class="text-right">'+escapeHTML(new Date(message.value.date).toLocaleString())+'</p>';
                            }

                            // プロフィール画像を設定していない場合
                            if('<?php print $upflimage ?>' == ""){
                                $("#" + last_message).before('<div id="' + message.id + '" class="post" style="height: 100px";>' 
                                + '<div class="imageframe" style="width:80px; height:80px; float:right; text-align: center; padding: 2.5%; font-size: 10px;">no image</div>' 
                                + message_html + date_html + '</div>');
                            }

                            // プロフィール画像を設定している場合
                            else{
                                $("#" + last_message).before('<div id="' + message.id + '" class="post" style="height: 100px";>' 
                                + '<img src="<?php print $upflimage ?>" class="imageframe" style="width:80px; height:80px; float:right;"/>' 
                                + message_html + date_html + '</div>');
                            }
                        }

                        // 自分以外の回答は左に表示される
                        else{
                            var message_html = '<p class="balloon-left" style="margin-left: 20px;">' + escapeHTML(message.value.content) + '</p>';

                            var date_html = '';
                            if(message.value.date) {
                                date_html = '<p class="text-left">' + escapeHTML(new Date(message.value.date).toLocaleString()) + '</p>';
                            }

                            if(url_html == ""){
                                $("#" + last_message).before('<div id="' + message.id + '" class="post" style="height: 100px";>' 
                                + '<div class="imageframe" style="width:80px; height:80px; float:left; text-align: center; padding: 2.5%; font-size: 10px;">no image</div>' 
                                + message_html + date_html + '</div>');
                            }
                            else{
                                $("#" + last_message).before('<div id="' + message.id + '" class="post" style="height: 100px";>' 
                                + '<img src=' + escapeHTML(message.value.iurl) 
                                + ' class="imageframe" style="width:80px; height:80px; float:left;"/>' + message_html + date_html + '</div>');
                            }
                        }

                        last_message = message.id;
                    '</div>'
                }

                function post() {
                    //5."message"データストアにメッセージをプッシュする
                    var content = escapeHTML($("#postarea").val());
                    if (content && content !== "") {
                        //history.on({
                        ds.push({
                            title: "タイトル",
                            content: content,
                            iurl: '<?php print $upflimage ?>',
                            uname: '<?php print $lname1 . " " . $fname1 ?>',
                            uid: '<?php print $uid ?>',
                            date: new Date().getTime()
                        }, function (e) {});
                    }
                    $("#postarea").val("");
                }

                $("#postarea").keydown(function (e) {
                    if (e.which == 13){
                        post();
                        return false;
                    }
                });
            });

            //インジェクション対策
            function escapeHTML(val) {
                return $('<div>').text(val).html();
            };
        </script>
    </head>

    <body>
        <div class="sm_container">
            <div style="margin: 4% 5% 10% 5%;">
                <div class="header">
                    <h1 class="logo" style="text-align: center; font-size: 20px; margin-bottom: 40px;">Communityで会話しよう！</h1>
                </div>
                <div id="messages" class="content">
                    <div id="dummy">
                    </div>
                </div>
            </div>
            <textarea id="postarea" placeholder="Enterで投稿"></textarea>
        </div>
    </body>
</html>