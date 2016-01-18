<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CONNEXY - 就活生と企業を結ぶプラットフォーム</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/default.css">
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.1.min.js"></script>
        <!--<script type="text/javascript" src="../js/jquery-1.2.6.min.js"></script>-->
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>

        <style>
            #input_table{
                margin-top: 150px;
                text-align: center;
            }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" style="height: 50px;">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".target">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            
                <a class="navbar-brand" href="">connexy</a>
            </div>
        </nav>

        <div class="container">
            
            <?php
                $login_id = $_POST["loginid"];
                $password = $_POST["password"];
                $loginP = $_POST["loginP"];

                if(isset($_POST["next-b"])){

                    $pdo = new PDO("mysql:host=localhost;dbname=Connexy_DB;charset=utf8", "root", "");
                    $sql = "SELECT * FROM User_Master WHERE UserLoginID = :loginid AND UserPassword = :loginpw AND UserProp = :userp";

                    //$pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
                    //$sql = "SELECT * FROM ec_pi WHERE login_id = :loginid AND login_pw = :loginpw";
                    
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(':loginid', $login_id, PDO::PARAM_STR);
                    $stmt->bindValue(':loginpw', $password, PDO::PARAM_STR);
                    $stmt->bindValue(':userp', $loginP, PDO::PARAM_STR);
                    $bresult = $stmt->execute();
                    //var_dump($bresult);
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    //var_dump($results);
                    
                    foreach ($results as $value) {
                        $lname1 = $value["UserLastName"];
                        $fname1 = $value["UserFirstName"];
                        //$name1 = $value["name1"];
                        //$name2 = $value["name2"];
                    }
                    
                    if($results == NULL){
                        echo '<table id="input_table">';
                            print '<tr>';
                            print '<td>' ."ログインIDかパスワードに入力誤りがあります。<br>
                                           再度入力しなおして下さい。".
                                  '</td>';
                            print '</tr>';

                            print '<tr>';
                                if($loginP == "r"){
                                    print '<td>' .'<a href="login.php?loginP=r">元に戻る</a></td>';    
                                }
                                else if($loginP == "c"){                                    
                                    print '<td>' .'<a href="login.php?loginP=c">元に戻る</a></td>';
                                }
                            print '</tr>';
                        echo '</table>';
                    }

                    else{
                        foreach($results as $row) {
                            
                            $UserP = $row["UserProp"];
                            //$admin_fl = $row["admin_flg"];
                            
                            if($UserP == "r" || $UserP == "c"){
        
                            //if($admin_fl == "1"){
                            //    header("Location: input_form.php");
                            //}
                            //elseif($admin_fl == "0"){
        
                                session_start();
                                
                                $_SESSION["loginid"] = $login_id;
                                //$_SESSION["loginpw"] = $password;
                                $_SESSION["lname1"] = $lname1;
                                $_SESSION["fname1"] = $fname1;
                                $_SESSION["loginP"] = $UserP;

                                //$_SESSION["name1"] = $name1;
                                //$_SESSION["name2"] = $name2;
                                //$_SESSION["loginfl"] = $admin_fl;
                                
                                if($loginP == "r"){
                                    header("Location: ../feed.php?loginP=r");        
                                }
                                else{
                                    header("location: ../feed.php?loginP=c");
                                }                                                                
                            }
                        }
                        
                    }
                }
                elseif(isset($_POST["cancel-b"])){
                    if($loginP == "r"){
                        header("Location: ../index.php?loginP=r");
                    }
                    else{
                        header("location: ../index.php?loginP=c");
                    }
                    // header("Location: ../index.php");   
                }
                elseif(isset($_POST["registry-b"])){
                    if($loginP == "r"){
                        header("Location: ./newregistry.php?loginP=r");
                    }
                    else{
                        header("location: ./newregistry.php?loginP=c");
                    }
                }    
            ?>
        </div>
    </body>
</html>