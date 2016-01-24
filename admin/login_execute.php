<?php
    $loginP = $_POST["loginP"];

    // 「ログイン」ボタンが選択された場合
    if(isset($_POST["next-b"])){

        // 就活生向けのログインが実行された場合
        if($loginP == "r"){
            $login_id = $_POST["loginid"];
            $password = $_POST["password"];

            $pdo = new PDO("mysql:host=localhost;dbname=Connexy_DB;charset=utf8", "root", "");
            $sql = "SELECT * FROM User_Master WHERE UserLoginID = :loginid && UserPassword = :loginpw";
            //$sql = "SELECT * FROM User_Master WHERE UserLoginID = :loginid AND UserPassword = :loginpw AND UserProp = :userp";

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':loginid', $login_id, PDO::PARAM_STR);
            $stmt->bindValue(':loginpw', $password, PDO::PARAM_STR);
            //$stmt->bindValue(':userp', $loginP, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $row) {
                $lname1 = $row["UserLastName"];
                $fname1 = $row["UserFirstName"];
                $userP = $row["UserProp"];
            }

            if($result == NULL){
                print '<table id="input_table1">';
                    print '<tr>';
                    print '<td>' ."ログインIDかパスワードに入力誤りがあります。<br>
                                   再度入力しなおして下さい。".
                          '</td>';
                    print '</tr>';

                    print '<tr>';
                        print '<td>' . '<a href="./login.php?loginP=r">元に戻る</a></td>';    

                        /*if($loginP == "r"){
                            print '<td>' .'<a href="./login.php?loginP=r">元に戻る</a></td>';    
                        }
                        else if($loginP == "c"){                                    
                            print '<td>' .'<a href="./login.php?loginP=c">元に戻る</a></td>';
                        }*/

                    print '</tr>';
                print '</table>';
            }

            else{
                foreach($result as $row) {
                    if($userP == "r"){
                        session_start();
                        // セッションに値を登録
                        $_SESSION["loginid"] = $login_id;
                        $_SESSION["lname1"] = $lname1;
                        $_SESSION["fname1"] = $fname1;
                        $_SESSION["loginP"] = $loginP;

                        header("Location: ../feed.php?loginP=r");
                    }
                    elseif($userP == "m"){
                        header("Location: ./news_list.php");
                    }
                    
                    /*$UserP = $row["UserProp"];                
                    if($UserP == "r" || $UserP == "c"){
                        session_start();

                        $_SESSION["loginid"] = $login_id;
                        $_SESSION["lname1"] = $lname1;
                        $_SESSION["fname1"] = $fname1;
                        $_SESSION["loginP"] = $UserP;

                        if($loginP == "r"){
                            header("Location: ../feed.php?loginP=r");        
                        }
                        else{
                            header("location: ../feed.php?loginP=c");
                        }                                                                
                    }*/

                }

            }
        }
        
        // 企業側のログインが実行された場合
        elseif($loginP == "c"){
            $ccode = $_POST["ccode"];
            
            // まずは企業コードを取得
            $pdo = new PDO("mysql:host=localhost;dbname=Connexy_DB;charset=utf8", "root", "");
            $sql = "SELECT * FROM Company_Master WHERE CompanyCode = $ccode";

            $stmt = $pdo->prepare($sql);
            $result = $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if($result == FALSE){
                print '<table id="input_table1">';
                    print '<tr>';
                        print '<td>'."企業コードが存在していません。<br>入力にミスがあるか、企業コードが登録されていない可能性があります。".'</td>';
                    print '</tr>';

                    print '<tr>';
                        print '<td>' .'<a href="login.php?loginP=c">元に戻る</a></td>';
                    print '</tr>';
                print '</table>';
            }

            elseif($result == TRUE){
                $cloginid = $_POST["cloginid"];
                $cpassword = $_POST["cpassword"];

                $pdo = new PDO("mysql:host=localhost;dbname=Connexy_DB;charset=utf8", "root", "");
                $sql = "SELECT * FROM Company_User_Master WHERE CompanyCode = $ccode and CM_LoginID = $cloginid and CM_Password = $cpassword";

                $stmt = $pdo->prepare($sql);
                $result = $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // CompanyCode, LoginID, Passwordをキーに認証し、認証に失敗した場合
                if($result == FALSE){
                    print '<table id="input_table1">';
                        print '<tr>';
                            print '<td>' ."ログインIDかパスワードに入力誤りがあります。<br>
                                           再度入力しなおして下さい。".
                                  '</td>';
                        print '</tr>';

                        print '<tr>';
                            print '<td>' .'<a href="login.php?loginP=c">元に戻る</a></td>';

                            /*if($loginP == "r"){
                                print '<td>' .'<a href="login.php?loginP=r">元に戻る</a></td>';    
                            }
                            else if($loginP == "c"){                                    
                                print '<td>' .'<a href="login.php?loginP=c">元に戻る</a></td>';
                            }*/

                        print '</tr>';
                    print '</table>';
                }

                // CompanyCode, LoginID, Passwordをキーに認証し、認証に成功した場合
                else{
                    foreach($result as $row) {
                        session_start();

                        $_SESSION["loginid"] = $login_id;
                        $_SESSION["lname1"] = $lname1;
                        $_SESSION["fname1"] = $fname1;
                        $_SESSION["loginP"] = $UserP;

                        header("Location: ../feed.php?loginP=c");
                    }
                }   
            }
        }
    }

    // ログイン画面でキャンセルした場合
    elseif(isset($_POST["cancel-b"])){
        if($loginP == "r"){
            header("Location: ../index.php?loginP=r");
        }
        else{
            header("location: ../index.php?loginP=c");
        }
    }

    // 就活生向けログイン画面で新規会員登録ボタンが選択された場合
    elseif(isset($_POST["registry-b"])){
        header("Location: ./newregistry.php?loginP=r");
        /*
        if($loginP == "r"){
            header("Location: ./newregistry.php?loginP=r");
        }
        else{
            header("location: ./newregistry.php?loginP=c");
        }
        */
    }

    // 「企業コードをお持ちでない方」ボタンが選択された場合
    elseif(isset($_POST["cc-registry-b"])) {
        header("location: ./newregistry.php?loginP=cc");
    }

    // 「企業コードをお持ちの方」ボタンが選択された場合
    elseif(isset($_POST["cm-registry-b"])) {
        header("location: ./newregistry.php?loginP=cm");
    }
?>

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
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="../favicon.ico">

        <style>
            #input_table1{
                margin: 20% auto 0 auto;
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
        </div>
    </body>
</html>