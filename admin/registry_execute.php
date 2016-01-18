<?php
    $loginP = $_POST["loginP"];
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
        <!--
        <nav class="navbar navbar-inverse navbar-fixed-top" style="height: 50px;">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".target">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            
                <a class="navbar-brand" href="">connexy</a>
            </div>
        </nav>
        -->

        <div class="container">
            <?php

                if(isset($_POST["next-b"])){
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
                        //print $lname1;
                        //print $fname1;
                        //print $lname2;
                        //print $fname2;
                        //print $sex;
                        //print $university;
                        //print $faculty;
                        //print $department;
                        //print $age;
                        //print $grade;
                        //print $pcode;
                        //print $address;
                        //print $mailaddress;
                        //print $password;
                        
                        $pdo = new PDO("mysql:host=localhost; dbname=Connexy_DB; charset=utf8", "root", "");
                        $pdo->beginTransaction();
                        
                        $sql1 = "INSERT INTO User_Master (UserID, UserLastName, UserFirstName, UserLastNameK, UserFirstNameK, UserLoginID, UserPassword, UserSex, UserProp) VALUES (NULL, :lname1, :fname1, :lname2, :fname2, :loginid, :loginpw, :sex, :uprop)";

                        $sql2 = "INSERT INTO User_Properties_C (UserID, UserLoginID, Pcode, Address, UniversityInfo, UniversityFaculty, UniversityDeftInfo, UserAge, UserGrade, Updatehistory) VALUES (NULL, :loginid, :pcode, :address, :university, :faculty, :department, :age, :grade, sysdate())";
                        //var_dump($sql2);
                        
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
                        //var_dump($result1);
                        //var_dump($result2);
                                                
                        if($result1 == FALSE or $result2 == FALSE){
                            echo '<table id="input_table">';
                                $pdo->rollBack();
                                print '<tr>';
                                    print '<td>'."登録に失敗しました。<br>再度入力しなおして下さい。".'</td>';
                                print '</tr>';

                                print '<tr>';
                                    print '<td>' .'<a href="newregistry.php?loginP=r">元に戻る</a></td>';
                                print '</tr>';
                            echo '</table>';
                        }
                        else{
                            $pdo->commit();
                            
                            session_start();
                                
                            $_SESSION["loginid"] = $mailaddress;
                            //$_SESSION["loginpw"] = $password;
                            $_SESSION["lname1"] = $lname1;
                            $_SESSION["fname1"] = $fname1;
                            $_SESSION["loginP"] = $loginP;
                            
                            header("Location: ../feed.php?loginP=r");
                        }
                        
                    }
                    elseif($loginP == "c"){
                        
                    }

                }
                elseif(isset($_POST["cancel-b"])){
                    if($loginP == "r"){
                        header("Location: ./login.php?loginP=r");
                    }
                    elseif($loginP == "c"){
                        header("Location: ./login.php?loginP=c");
                    }
                }
            ?>
        </div>
    </body>
</html>