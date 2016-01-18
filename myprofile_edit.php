<?php 
    if(!isset($_SESSION)){
        session_start();
        $loginid = $_SESSION["loginid"];
        $lname1 = $_SESSION["lname1"];
        $fname1 = $_SESSION["fname1"];

        $pdo = new PDO("mysql:host=localhost; dbname=Connexy_DB; charset=utf8", "root", "");
        $sql = "SELECT UniversityInfo, UniversityFaculty, UniversityDeftInfo, UserAge, UserGrade, UserProfileImage FROM User_Properties_C WHERE UserLoginID = '$loginid'";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
        foreach($results as $row) {
            $university = $row["UniversityInfo"];
            $universityfac = $row["UniversityFaculty"];
            $universitydept = $row["UniversityDeftInfo"];
            $age = $row["UserAge"];
            $grade = $row["UserGrade"];
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
        <title>CONNEXY - My Profile</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/style.css">
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.1.min.js"></script>
        <script type="text/javascript" src="./js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="./images/favicon.ico">
    </head>
    <body>
        <?php include "sidemenu.php" ?>
        <?php //include "header.php" ?>
        
        <div class="sm_container" style="margin-top: 1%;">
            <div class="row">
                <div class="col-xs-12" style="float: left; margin: 0 auto;">
                    <h4 style="margin-left: 5%; margin-bottom: 2%;">My Profile（編集画面）</h4>
                    
                    <form action="myprofile_edit_execute.php" method="post" class="form-inline text-center" enctype="multipart/form-data">
                        <div class="pull-left col-xs-5" style="padding:0; margin:0 30px 0 5%; width: 300px; height: 220px;" id="previewimage">
                            <input type="file" accept="image/*" name="profile-image" style="margin-bottom: 5px;">
                            
                            <!-- 画像が選択されていない時 -->
                            <?php if($upflimage == ""): ?>
                                <div id="imagespace">
                                    NO IMAGE
                                </div>
                                <style>
                                    #imagespace{
                                        width: 300px;
                                        height: 200px;
                                        border: solid 1px;
                                        text-align: center; 
                                        font-size: 20px; 
                                        vertical-align: middle;
                                    }
                                </style>                            
                            <!-- 画像が選択されている時 -->
                            <?php else: ?>
                                <img style="width: 300px; height: 200px;" src="<?php print $upflimage ?>">
                            <?php endif; ?>
                        </div>

                        <table class="table table-striped" style="width: 50%;">
                            <tr><td>名前</td><td><?php print $lname1 . " " . $fname1 ?></td></tr>
                            <tr><td>年齢</td><td><?php print $age ?></td></tr>
                            <tr><td>大学名</td><td><?php print $university ?></td></tr>
                            <tr><td>学部名</td><td><?php print $universityfac ?></td></tr>
                            <tr><td>学科名</td><td><?php print $universitydept ?></td></tr>
                            <tr><td>年次</td><td><?php print $grade ?></td></tr>
                            <tr><td></td><td></td></tr>
                        </table>
                
                        <input type="hidden" name="loginid" value="<?php print $loginid ?>">                        
                        
                        <button type="submit" class="btn btn-primary">
                            <span>プロフィールを編集を完了する</span>
                        </button>
                    </form>
                </div>            
            </div>
            
            <script type="text/javascript" src="./js/jquery.iPreview.min.js"></script>
            <script>
                $("input[type=file]").iPreview({
                    //document.getElementById("imagespace").innerHTML = "";
                    target: "#previewimage"
                });
            </script>
        </div>
    </body>
</html>