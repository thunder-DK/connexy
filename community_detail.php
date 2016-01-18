<?php
    include "sidemenu.php";
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
        <link rel="shortcut icon" href="./images/favicon.ico">
        
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
                border-color: #8d8;
            }
            
            p.balloon-left::before {
                left: -31px;
                border-right: 15px solid #8d8;
            }
            
            p.balloon-left::after {
                left: -26px;
                border-right: 15px solid #fff;
            }

            /* balloon right */
            p.balloon-right {
                min-width: 320px;
                max-width: 800px;
                margin: auto;
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
            
            .text-right{
                float: right;
            }
            
            #chat-frame {
                min-width: 320px;
                max-width: 800px;
                margin: auto;
                padding: 1em 2em;
                /*background-color: #D8F3F0;*/
            }
            .chat-talk {
                overflow: hidden;
                margin: 0 0 1em 0;
                padding: 0;
            }
            .chat-talk span {
              display: block;
              margin: 0;
              padding: 0;
            }
            .chat-talk .talk-icon {
              float: left;
              width: auto;
            }
            .chat-talk .talk-content {
              position: relative;
              box-sizing: border-box;
              width: auto;
              min-height: 50px;
              border-radius: 10px;
              background-color: #fff;
              margin: 0 auto 0 70px;
              padding: 1em;
            }
            .chat-talk .talk-icon img {
              max-width: 100%;
              height: auto;
              vertical-align: bottom;
              border: 2px solid #fff;
              border-radius: 50%;
            }
            .chat-talk .talk-content:before {
              position: absolute;
              top: 15px;
              left: -20px;
              display: block;
              width: 0;
              height: 0;
              content: '';
              border: 10px solid transparent;
              border-right-color: #FFFFFF;
            }
            .chat-talk.mytalk .talk-icon {
              float: right;
            }
            .chat-talk.mytalk .talk-content {
              margin: 0 70px 0 auto;
              color: #000;
              background: #78FF6C;
            }
            .chat-talk.mytalk .talk-content:before {
              right: -20px;
              left: auto;
              border-color: transparent;
              border-left-color: #78FF6C;
            }
        
        </style>

        <script>
            $(function() {
                //1.ミルクココアインスタンスを作成
                var milkcocoa = new MilkCocoa("onifc51rff.mlkcca.com");
                
                //2."message"データストアを作成
                var ds = milkcocoa.dataStore("message");
                                
                //3."message"データストアからメッセージを取ってくる
                ds.stream().sort("desc").next(function(err, datas) {
                    datas.forEach(function(data) {
                        renderMessage(data);
                    });
                });

                //4."message"データストアのプッシュイベントを監視
                ds.on("push", function(e) {
                    renderMessage(e);
                });

                var last_message = "dummy";
                function renderMessage(message) {
                    /*
                    var message_html = '<span class="talk-content">' + escapeHTML(message.value.content) + '</span>';
                    '<div id="chat-frame">'
                        '<p class="chat-talk mytalk">'
                            '<span class="talk-icon">'
                                '<img src="./images/userprofile/kuroda@yahoo.co.jp/upfl_image.jpg" alt="tartgeticon" width="100px" height="100px"/>'
                            '</span>'
                            var message_html = '<span class="talk-content">' + escapeHTML(message.value.content) + '</span>';
                        '</p>'
                    '</div>'
                    <p class="chat-talk mytalk">
                        <span class="talk-icon">
                            <img src="" alt="myicon" width="100px" height="100px"/>
                        </span>
                        <span class="talk-content">[トーク内容を記載]</span>
                    </p>
                    */
                    
                    '<div class="balloon-wrapper">'
                        var message_html = '<p class="balloon-right">' + escapeHTML(message.value.content) + '</p>';                      
                        //var message_html = '<p class="post-text">' + escapeHTML(message.value.content) + '</p>';
                        
                        var date_html = '';
                        if(message.value.date) {
                            date_html = '<p class="text-right">'+escapeHTML( new Date(message.value.date).toLocaleString())+'</p>';
                            //date_html = '<p class="post-date">'+escapeHTML( new Date(message.value.date).toLocaleString())+'</p>';
                        }

                        '<img src="./images/userprofile/kuroda@yahoo.co.jp/upfl_image.jpg" class="talk-icon" width="100px" height="100px"/>'
                        $("#"+last_message).before('<div id="'+message.id+'" class="post" style="height: 100px";>' + message_html + date_html +'</div>');
                        //$("#"+last_message).before('<div id="'+message.id+'" class="post">' + message_html + '</div><br><div>' + date_html +'</div>');

                        last_message = message.id;
                    '</div>'
                }

                function post() {
                    //5."message"データストアにメッセージをプッシュする
                    var content = escapeHTML($("#postarea").val());
                    if (content && content !== "") {
                        ds.push({
                            title: "タイトル",
                            content: content,
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
                //return val;
            };
        </script>
    </head>

    <body>
        <div class="sm_container">

            <div style="margin-left:5%; margin-top:4%;">
                <div class="header">
                    <h1 class="logo">CHAT</h1>
                </div>

                <div id="messages" class="content">
                    <div id="dummy">

                    <!-- ここから追加 -->
                    <!--
                    <div id="chat-frame">
                        <p class="chat-talk mytalk">
                            <span class="talk-icon">
                                <img src="./images/userprofile/kuroda@yahoo.co.jp/upfl_image.jpg" alt="tartgeticon" width="100px" height="100px"/>
                            </span>
                            <span class="talk-content"></span>
                        </p>
                        <!--
                        <p class="chat-talk mytalk">
                            <span class="talk-icon">
                                <img src="" alt="myicon" width="100px" height="100px"/>
                            </span>
                            <span class="talk-content">[トーク内容を記載]</span>
                        </p>
                        
                    </div>
                    -->

                    </div>
                </div>
            </div>
            <textarea id="postarea" placeholder="Enterで投稿"></textarea>
        </div>
    </body>
</html>