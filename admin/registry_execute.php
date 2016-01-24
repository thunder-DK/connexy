<?php
    $loginP = $_POST["loginP"];

    // loginボタンを選択した場合
    if(isset($_POST["next-b"])){

        // 就活生情報を登録する
        if($loginP == "r"){
            $lname1 = $_POST["lname1"];
            $fname1 = $_POST["fname1"];
            $lname2 = $_POST["lname2"];
            $fname2 = $_POST["fname2"];
            $sex = $_POST["sex"];
            $university = $_POST["university"];
            $faculty = $_POST["faculty"];
            $department = $_POST["department"];
            $age = $_POST["age"];
            $grade = $_POST["grade"];
            $pcode = $_POST["pcode"];
            $address = $_POST["address"];
            $mailaddress = $_POST["maddress"];
            $password = $_POST["password"];
            $password2 = $_POST["password2"];
        
            // パスワードに謝りがある場合
            if($password != $password2){
                print '<table id="input_table1">';
                    print '<tr>';
                        print '<td>'."パスワードに入力ミスがあります。<br>正しいパスワードを再度入力しなおして下さい。".'</td>';
                    print '</tr>';

                    print '<tr>';
                        print '<td>' .'<a href="newregistry.php?loginP=r">元に戻る</a></td>';
                    print '</tr>';
                print '</table>';
            }

            // パスワードが正しい場合、処理を続ける
            else{
                $pdo = new PDO("mysql:host=localhost; dbname=Connexy_DB; charset=utf8", "root", "");
                $pdo->beginTransaction();

                $sql1 = "INSERT INTO User_Master (UserID, UserLastName, UserFirstName, UserLastNameK, UserFirstNameK, UserLoginID, UserPassword, UserSex, UserProp) VALUES (NULL, :lname1, :fname1, :lname2, :fname2, :loginid, :loginpw, :sex, :uprop)";
                $sql2 = "INSERT INTO User_Properties_C (UserID, UserLoginID, Pcode, Address, UniversityInfo, UniversityFaculty, UniversityDeftInfo, UserAge, UserGrade, Updatehistory) VALUES (NULL, :loginid, :pcode, :address, :university, :faculty, :department, :age, :grade, sysdate())";

                $stmt1 = $pdo->prepare($sql1);
                $stmt2 = $pdo->prepare($sql2);

                $stmt1->bindValue(':lname1', $lname1, PDO::PARAM_STR);
                $stmt1->bindValue(':fname1', $fname1, PDO::PARAM_STR);
                $stmt1->bindValue(':lname2', $lname2, PDO::PARAM_STR);
                $stmt1->bindValue(':fname2', $fname2, PDO::PARAM_STR);
                $stmt1->bindValue(':loginid', $mailaddress, PDO::PARAM_STR);
                $stmt1->bindValue(':loginpw', $password, PDO::PARAM_STR);
                $stmt1->bindValue(':sex', $sex, PDO::PARAM_STR);
                $stmt1->bindValue(':uprop', $loginP, PDO::PARAM_STR);

                $stmt2->bindValue(':loginid', $mailaddress, PDO::PARAM_STR);                        
                $stmt2->bindValue(':pcode', $pcode, PDO::PARAM_INT);
                $stmt2->bindValue(':address', $address, PDO::PARAM_STR);
                $stmt2->bindValue(':university', $university, PDO::PARAM_STR);
                $stmt2->bindValue(':faculty', $faculty, PDO::PARAM_STR);
                $stmt2->bindValue(':department', $department, PDO::PARAM_STR);
                $stmt2->bindValue(':age', $age, PDO::PARAM_INT);
                $stmt2->bindValue(':grade', $grade, PDO::PARAM_INT);

                $result1 = $stmt1->execute();
                $result2 = $stmt2->execute();

                if($result1 == FALSE or $result2 == FALSE){
                    print '<table id="input_table1">';
                        $pdo->rollBack();
                        print '<tr>';
                            print '<td>'."登録に失敗しました。<br>再度入力しなおして下さい。".'</td>';
                        print '</tr>';

                        print '<tr>';
                            print '<td>' .'<a href="newregistry.php?loginP=r">元に戻る</a></td>';
                        print '</tr>';
                    print '</table>';
                }
                else{
                    $pdo->commit();

                    session_start();

                    $_SESSION["loginid"] = $mailaddress;
                    $_SESSION["lname1"] = $lname1;
                    $_SESSION["fname1"] = $fname1;
                    $_SESSION["loginP"] = $loginP;

                    header("Location: ../feed.php?loginP=r");
                }
            }
        }

        // 企業コードから新規に登録する場合
        elseif($loginP == "cc"){

            // まずは企業コードを取得
            $pdo = new PDO("mysql:host=localhost;dbname=Connexy_DB;charset=utf8", "root", "");
            $sql = "SELECT CompanyCode FROM Company_Master";

            $stmt = $pdo->prepare($sql);
            $result = $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $value) {
                $ccode = $value["CompanyCode"];
            }

            // 企業マスタへ登録
            $nccode = $ccode + 1;
            $cname = $_POST["cname"];
            $caddress = $_POST["caddress"];
            $curl = $_POST["curl"];

            $pdo = new PDO("mysql:host=localhost; dbname=Connexy_DB; charset=utf8", "root", "");
            $pdo->beginTransaction();
            $sql = "INSERT INTO Company_Master (CompanyCode, CompanyName, CompanyAddress, CompanyURL) VALUES (:ccode, :cname, :cadd, :curl)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':ccode', $nccode, PDO::PARAM_INT);
            $stmt->bindValue(':cname', $cname, PDO::PARAM_STR);
            $stmt->bindValue(':cadd', $caddress, PDO::PARAM_STR);
            $stmt->bindValue(':curl', $curl, PDO::PARAM_STR);
            $result1 = $stmt->execute();

            // 企業メンバー情報の登録
            $cmlname1 = $_POST["cmlname1"];
            $cmfname1 = $_POST["cmfname1"];
            $cmlname2 = $_POST["cmlname2"];
            $cmfname2 = $_POST["cmfname2"];
            $cmdept = $_POST["cmdept"];
            $cmpost = $_POST["cmpost"];
            $cmloginid = $_POST["cmloginid"];
            $cmpass = $_POST["cmpassword"];

            $sql = "INSERT INTO Company_User_Master (CM_Code, CompanyCode, CM_LastName, CM_FirstName, CM_LastNameK, CM_FirstNameK, CM_Dept, CM_Post, CM_LoginID, CM_Password, CM_UpdateTime) VALUES (NULL, :ccode, :cmlname1, :cmfname1, :cmlname2, :cmfname2, :cmdept, :cmpost, :cmlog, :cmpass, sysdate())";

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':ccode', $nccode, PDO::PARAM_INT);
            $stmt->bindValue(':cmlname1', $cmlname1, PDO::PARAM_STR);
            $stmt->bindValue(':cmfname1', $cmfname1, PDO::PARAM_STR);
            $stmt->bindValue(':cmlname2', $cmlname2, PDO::PARAM_STR);
            $stmt->bindValue(':cmfname2', $cmfname2, PDO::PARAM_STR);
            $stmt->bindValue(':cmdept', $cmdept, PDO::PARAM_STR);
            $stmt->bindValue(':cmpost', $cmpost, PDO::PARAM_STR);
            $stmt->bindValue(':cmlog', $cmloginid, PDO::PARAM_STR);
            $stmt->bindValue(':cmpass', $cmpass, PDO::PARAM_STR);

            $result2 = $stmt->execute();

            if($result1 == FALSE or $result2 == FALSE){
                print '<table id="input_table1">';
                    $pdo->rollBack();
                    print '<tr>';
                        print '<td>'."登録に失敗しました。<br>再度入力しなおして下さい。".'</td>';
                    print '</tr>';

                    print '<tr>';
                        print '<td>' .'<a href="newregistry.php?loginP=cc">元に戻る</a></td>';
                    print '</tr>';
                print '</table>';
            }
            else{
                $pdo->commit();

                session_start();

                $_SESSION["loginid"] = $cmloginid;
                $_SESSION["lname1"] = $cmlname1;
                $_SESSION["fname1"] = $cmfname1;
                $_SESSION["ccode"] = $nccode;
                $_SESSION["loginP"] = "c";

                header("Location: ../feed.php?loginP=c");
            }
        }

        // 企業コードは既に登録済みの場合
        elseif($loginP == "cm"){
            
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
                        print '<td>' .'<a href="newregistry.php?loginP=cm">元に戻る</a></td>';
                    print '</tr>';
                print '</table>';
            }

            elseif($result == TRUE){
                // 企業メンバー情報の登録
                $cmlname1 = $_POST["cmlname1"];
                $cmfname1 = $_POST["cmfname1"];
                $cmlname2 = $_POST["cmlname2"];
                $cmfname2 = $_POST["cmfname2"];
                $cmdept = $_POST["cmdept"];
                $cmpost = $_POST["cmpost"];
                $cmloginid = $_POST["cmloginid"];
                $cmpass = $_POST["cmpassword"];
                
                $pdo->beginTransaction();
                $sql = "INSERT INTO Company_User_Master (CM_Code, CompanyCode, CM_LastName, CM_FirstName, CM_LastNameK, CM_FirstNameK, CM_Dept, CM_Post, CM_LoginID, CM_Password, CM_UpdateTime) VALUES (NULL, :ccode, :cmlname1, :cmfname1, :cmlname2, :cmfname2, :cmdept, :cmpost, :cmlog, :cmpass, sysdate())";

                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':ccode', $ccode, PDO::PARAM_INT);
                $stmt->bindValue(':cmlname1', $cmlname1, PDO::PARAM_STR);
                $stmt->bindValue(':cmfname1', $cmfname1, PDO::PARAM_STR);
                $stmt->bindValue(':cmlname2', $cmlname2, PDO::PARAM_STR);
                $stmt->bindValue(':cmfname2', $cmfname2, PDO::PARAM_STR);
                $stmt->bindValue(':cmdept', $cmdept, PDO::PARAM_STR);
                $stmt->bindValue(':cmpost', $cmpost, PDO::PARAM_STR);
                $stmt->bindValue(':cmlog', $cmloginid, PDO::PARAM_STR);
                $stmt->bindValue(':cmpass', $cmpass, PDO::PARAM_STR);

                $result = $stmt->execute();

                if($result == FALSE){
                    print '<table id="input_table1">';
                        $pdo->rollBack();
                        print '<tr>';
                            print '<td>'."登録に失敗しました。<br>再度入力しなおして下さい。".'</td>';
                        print '</tr>';

                        print '<tr>';
                            print '<td>' .'<a href="newregistry.php?loginP=cm">元に戻る</a></td>';
                        print '</tr>';
                    print '</table>';
                }
                else{
                    $pdo->commit();

                    session_start();

                    $_SESSION["loginid"] = $cmloginid;
                    $_SESSION["lname1"] = $cmlname1;
                    $_SESSION["fname1"] = $cmfname1;
                    $_SESSION["ccode"] = $nccode;
                    $_SESSION["loginP"] = "c";

                    header("Location: ../feed.php?loginP=c");
                }
            }
        }
    }

    // キャンセルボタンを押した場合
    elseif(isset($_POST["cancel-b"])){
        if($loginP == "r"){
            header("Location: ./login.php?loginP=r");
        }
        elseif($loginP == "c" or $loginP == "cc" or $loginP == "cm"){
            header("Location: ./login.php?loginP=c");
        }
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/default.css">
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.1.min.js"></script>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
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