<?php
    include "sidemenu.php";
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Connexy - Education</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="./js/jquery.vgrid.min.js"></script>
        <script type="text/javascript" src="./js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="./js/bootstrap.min.js"></script>

        <!-- FeedのためのJS -->
        <script src="https://www.google.com/jsapi" type="text/javascript"></script>
                
        <script type="text/javascript"> 
            // 初期設定
            var disp_entry_count = 1000; //表示させたい記事の数

            // RSS URL
            var site = new Array();

            site[0] = { 
                title:"dotinstall",
                url:"http://dotinstall.com/lessons.rss",
                disp_entry:100 // 取得する記事の数
            };

            site[1] = { 
                title:"dotinstall",
                url:"http://dotinstall.com/lessons/knowledge.rss",
                disp_entry:100 // 取得する記事の数
            };
            
            var channel = new Array();
            var entry = new Array();
            var entries = new Array();
            var Feed = "";

            google.load("feeds", "1");
            function init() {
                var site_count = 0;
                for (var i=0; i<site.length; i++){

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
                                    for (var k=0; k<entry['img'].length; k++){
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

            function disp() {
                //日付順に並べ替え
                entries.sort (function (b1, b2) { return b1.time < b2.time ? 1 : -1; } );

                Feed += '<ul id="grid-content">'
                
                // 記事をhtmlに整形
                for (var l=0; l<disp_entry_count; l++){
                    if (entries.length < l+1){ 
                        break; 
                    }
                    
                    Feed += '<li>';
                    
                    if (entries[l]["img"] != null) 
                    { 
                        Feed += '<a href="'+ entries[l]['link'] + '" target="_blank">' + '<img width="100%" height="150" style="margin-bottom: 10px;" src="' + entries[l]['img'][0] + '">'; 
                    }
                    
                    Feed 
                    += '<p>'
                    + '<a href="'+ entries[l]['link'] + '" target="_blank">' + entries[l]['title'] + '</a>'
                    + '</p>'
                    + '<span>' + entries[l]['contentSnippet'].substr(0, 100) + '……</span>'
                    + '<h6><img src="' + entries[l]['site_favicon'] + '">'
                    + '<a href="' + entries[l]['site_link'] + '">' + entries[l]['site_title'] + '</a>' + ' ' + entries[l]['date'] + '</h6>'
                    + '</li>';
                }
                Feed += '</ul>';
                
                // 表示するタグに追加
                $("#feed").append(Feed);
            }
            google.setOnLoadCallback(init);
        </script>
        
        <script type="text/javascript">
            jQuery(function(){
                var vg = jQuery("#grid-content").vgrid({
                    easeing: "easeOutQuint",
                    useLoadImageEvent: true,
                    useFontSizeListner: true,
                    time: 1200,
                    delay: 20,
                    fadeIn: {
                        time: 400,
                        delay: 20
                   }
                });
            });    
        </script>
        
        <style type="text/css">
            #grid-content {
                position: relative;
                list-style-type: none;
                margin:0; padding:0;
                overflow:hidden;
            }
            #grid-content li {
                float: left;
                list-style-type: none;
                width:290px;
                border:1px dotted #ccc;
                outline:1px solid #ccc;
                background:#fff;
                margin:7px;
                padding:7px;
                word-break:break-all;
                box-sizing:content-box;
            }
            
            #grid-content li a {
                color:#ff6699;
            }
        
            #grid-content li div {
                margin:0 0 5px 0; padding:0 0 5px 0;
                overflow:hidden;
                border-bottom:1px dotted #ccc;
            }
            
            #grid-content li span {
                font-size:80%;
                color:#666;
            }
            
            #grid-content li span a {
                color:pink;
            }
            
            #grid-content div.small{
                float: left;
                width: 222px;
                margin: 0 6px 6px 0;
                padding: 4px;
            }
            
            #bizinfo{
                width: 100%;
                margin: 0 auto;
                padding: 2.5%;
            }
        </style>
        
        <script type="text/javascript">
            function slideSwitch(){
                var $active = $("#slideshow img.active");

                if ($active.length == 0) $active = $("#slideshow img:last");

                var $next =  $active.next().length ? $active.next()
                    : $("#slideshow img:first");

                $active.addClass("last-active");

                $next.css({opacity: 0.0})
                .addClass("active")
                .animate({opacity: 1.0}, 1000, function() {
                    $active.removeClass("active last-active");
                });
            }

            $(function() {
               setInterval("slideSwitch()", 3000);
            });
        </script>
        
    </head>

    <body>                
        <div class="sm_container">
            <!-- From -->
            <div id="bizinfo">
                <div id="feed" style="margin: 0 auto;"></div>
                <?php include "footer.php" ?>
            </div>
        </div>
    </body>
</html>