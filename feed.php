<?php
    // サイドメニューの読み込み
    include "sidemenu.php";

    // media情報の取得
    $categoryid = 1;
    $class = "b";
    $showflg = 1;

    $pdo = new PDO("mysql:host=localhost; dbname=Connexy_DB; charset=utf8", "root", "");
    $sql = "SELECT * FROM User_Information_Master WHERE InformationCategoryID = :n_cid and InformationClass = :n_ic and InformationShowFlg = :n_sflg";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':n_cid', $categoryid, PDO::PARAM_INT);
    $stmt->bindValue(':n_ic', $class, PDO::PARAM_STR);
    $stmt->bindValue(':n_sflg', $showflg, PDO::PARAM_INT);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Connexy - Feed</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="./js/jquery.vgrid.min.js"></script>
        <script type="text/javascript" src="./js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="./js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="./favicon.ico">
        
        <style type="text/css">
            #grid-content {
                position: relative;
                /*list-style-type: none;*/
                margin: 0; 
                padding: 0;
                overflow: hidden;
                clear: both; /* 20160122 add */
                width: auto; /* 20160122 add */
                height: auto; /* 20160122 add */
                background-repeat: repeat; /* 20160122 add */
            }
            
            #grid-content div {
                float: left;
                width: 290px;
                border: 1px dotted #ccc;
                /*outline: 1px solid #ccc;*/
                background: #fff;
                margin: 7px;
                padding: 7px;
                word-break: break-all;
                box-sizing: content-box;
                /*position: absolute; /* 20160122 add */
                height: auto; /* 20160122 add */
                cursor: auto; /* 20160122 add */
            }

            #grid-content div a {
                color:#ff6699;
            }
            
            #grid-content div span {
                font-size:80%;
                color:#666;
            }
            
            #grid-content div span a {
                color:pink;
            }

            #grid-content li {
                float: left;
                list-style-type: none;
                width: 290px;
                border: 1px dotted #ccc;
                outline: 1px solid #ccc;
                background: #fff;
                margin: 7px;
                padding: 7px;
                word-break: break-all;
                box-sizing: content-box;
                /*position: absolute; /* 20160122 add */
                height: auto; /* 20160122 add */
            }
                        
            #grid-content li a {
                color: #ff6699;
            }
        
            #grid-content li div {
                margin: 0 0 5px 0; 
                padding:0 0 5px 0;
                overflow: hidden;
                border-bottom: 1px dotted #ccc;
            }
            
            #grid-content li span {
                font-size: 80%;
                color: #666;
            }
            
            #grid-content li span a {
                color: pink;
            }
            
            #grid-content div.small{
                float: left;
                width: 222px;
                margin: 0 6px 6px 0;
                padding: 4px;
            }
            
            #bizinfo{
                float: left;
                width: 100%;
                margin: 0 auto;
                padding-left: 3%;
                padding-right: 2.5%;
                /*padding: 2.5%;*/
            }
            
            #loader-bg {
                display: none;
                position: fixed;
                width: 100%;
                height: 100%;
                top: 0px;
                left: 0px;
                background: #000;
                z-index: 1;
            }

            #loader {
                display: none;
                position: fixed;
                top: 50%;
                left: 50%;
                width: 200px;
                height: 200px;
                margin-top: -100px;
                margin-left: -100px;
                text-align: center;
                color: #fff;
                z-index: 2;
            }
        </style>
        
        <!-- LoadingするのJS -->
        <script>
            $(function() {
                var h = $(window).height();
                $('#wrap').css('display','none');
                $('#loader-bg ,#loader').height(h).css('display','block');
            });

            $(window).load(function () { //全ての読み込みが完了したら実行
                $('#loader-bg').delay(900).fadeOut(800);
                $('#loader').delay(600).fadeOut(300);
                $('#wrap').css('display', 'block');
            });

            //10秒たったら強制的にロード画面を非表示
            $(function(){
                setTimeout('stopload()',10000);
            });

            function stopload(){
                $('#wrap').css('display','block');
                $('#loader-bg').delay(900).fadeOut(800);
                $('#loader').delay(600).fadeOut(300);
            }
        </script>

        <!-- FeedのためのJS -->
        <script src="https://www.google.com/jsapi" type="text/javascript"></script>
        
        <!-- DBから取得したサイトのRSS情報を表示 -->
        <script type="text/javascript"> 

            // 初期設定
            var disp_entry_count = 1000; //表示させたい記事の数

            // RSS URL
            var site = new Array();
            
            // DB内のURL情報を取得
            <?php
                $i = "0";
                foreach($result as $row){
                    print 'site[' . $i . '] = {'; 
                        print 'title: "' . $row["InformationTitle"] . '" ,';
                        print 'url: "' . $row["InformationRssURL"] . '" ,';
                        print 'disp_entry:100';
                    print '};';
                    $i++;
                };
            ?>
        
            var channel = new Array();
            var entry = new Array();
            var entries = new Array();
            var Feed = "";

            google.load("feeds", "1");
            function init() {
                var site_count = 0;
                for (var i = 0; i < site.length; i++){

                    // 読み込むRSSを設定
                    var feed = new google.feeds.Feed(site[i]["url"]);
                    feed.setNumEntries(site[i]["disp_entry"])
                    feed.load(function(rss) {
                        if (!rss.error) {
                            // RSSからサイトの情報を配列に格納
                            channel["title"] = rss.feed.title;
                            channel["link"] = rss.feed.link;
                            channel["favicon"] = "http://favicon.hatena.ne.jp/?url=" + channel["link"];
                            channel["description"] = rss.feed.description;
                            channel["author"] = rss.feed.author;

                            // RSSから記事の情報を配列に格納
                            for (var j=0; j<rss.feed.entries.length; j++){
                                var feed_entry = rss.feed.entries[j];
                                var entry = {
                                    site_title : channel["title"],
                                    site_link : channel["link"],
                                    site_favicon : channel["favicon"],
                                    title : feed_entry.title,
                                    link : feed_entry.link,
                                    content : feed_entry.content,
                                    contentSnippet : feed_entry.contentSnippet,
                                    publishedDate : feed_entry.publishedDate
                                };

                                var date = new Date(entry["publishedDate"]);
                                entry["time"] = date.getTime();
                                var yy = date.getYear();
                                var mm = date.getMonth() + 1;
                                var dd = date.getDate();
                                if (yy < 2000) { yy += 1900; }
                                if (mm < 10) { mm = "0" + mm; }
                                if (dd < 10) { dd = "0" + dd; }
                                entry["date"] = yy + "年" + mm + "月" + dd + "日";
                                entry["img"] = entry["content"].match(/src="(.*?)"/igm);

                                if (entry["img"] != null) {
                                    for (var k = 0; k < entry['img'].length; k++){
                                        entry["img"][k] = entry["img"][k].replace(/src=/ig, "");
                                        entry["img"][k] = entry["img"][k].replace(/"/ig, "");
                                    }
                                }
                                entries.push(entry);
                             }
                         }
                         site_count++;
                         if (site.length == site_count){ 
                             disp(); 
                         }
                     });
                 }
            }

            // RSS情報をDIV内に表示させる
            function disp() {
                // 日付順に並べ替え
                entries.sort (function (b1, b2) { return b1.time < b2.time ? 1 : -1; } );

                //Feed += '<ul id="grid-content">'
                Feed += '<div id="grid-content">'
                
                // 記事をhtmlに整形
                for (var l = 0; l < disp_entry_count; l++){
                    if (entries.length < l+1){ 
                        break; 
                    }
                    
                    //Feed += '<li>';
                    Feed += '<div class="gridframe">';
                    
                    if (entries[l]["img"] != null) 
                    { 
                        Feed += '<a href="'+ entries[l]['link'] + '" target="_blank">' + '<img width="100%" height="150" style="margin-bottom: 10px;" src="' + entries[l]['img'][0] + '">'; 
                    }
                    
                    Feed 
                    += '<p>'
                    + '<a href="'+ entries[l]['link'] + '" target="_blank">' + entries[l]['title'] + '</a>'
                    + '</p>'
                    + '<span>' + entries[l]['contentSnippet'].substr(0, 100) + '……</span><br><br>'
                    + '<h6 style="font-size: 11px; text-align: center;"><img src="' + entries[l]['site_favicon'] + '">'
                    + '<a href="' + entries[l]['site_link'] + '" target="_blank">' + entries[l]['site_title'] + '</a><br>' + ' ' + entries[l]['date'] + '</h6>'

                    + '</div>';
                    //+ '</li>';
                }
                
                Feed += '</div>';
                //Feed += '</ul>';
                
                // 表示するタグに追加
                $("#feed").append(Feed);
            }
            google.setOnLoadCallback(init);
        </script>
        
        <script type="text/javascript">
            $(function(){
                var vg = $("#grid-content").vgrid({
                    easeing: "easeOutQuint",
                    useLoadImageEvent: true,
                    useFontSizeListner: true,
                    time: 400,
                    delay: 20,
                    wait: 500,
                    fadeIn: {
                        time: 500,
                        delay: 50
                   }
                });
                
                //グリッドレイアウト実行
                $(window).on("load", function(e){
                    vg.vgrefresh();
                });
            });
        </script>
    </head>

    <body>                
        <div class="sm_container">
            <!-- From -->
            <div id="bizinfo">
                <div style="width: 100%; margin-left: auto; margin-right: auto; margin-bottom: 15px;">
                    <div class="form-group has-error">
                        <input type="text" style="float: left; width: 400px; margin-right: 10px;" placeholder="検索" id="searchWord" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-default">
                        <span class="glyphicon glyphicon-search">検索
                    </button>
                </div>
                    
                <div id="loader-bg">
                    <div id="loader">
                        <!--<img src="./images/gif-load.gif" width="80" height="80" alt="Now Loading..." />-->
                        <p style="font-size: 20px;">Now Loading...</p>
                    </div>
                </div>

                <div id="feed" style="width: auto;">
                </div>
                <?php include "footer.php" ?>
            </div>
        </div>
    </body>
</html>