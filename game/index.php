<!-- Start a php session (this must be before <!DOCTYPE html>!!!) -->
<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Leren Tellen | Game</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>

        <?php
            // If not logged in redirect to login page
            if(!isset($_SESSION["loggedIn"])){
                header("Location: ../login");
            }
        ?>

        <!-- Navbar -->
        <div id="navbar">
            <a class="active" href="../">Leren Tellen</a>
            <div class="nav2">

                <?php
                    if(isset($_SESSION['loggedIn'])){
                        $username = $_SESSION['username'];
                        echo "
                            <p>Username: $username</p>
                            <a href='../logout.php'>Logout</a>
                        ";
                    }
                    else{
                        echo "
                            <a href='../signup/'>Signup</a>
                            <a href='../login/'>Login</a>
                        ";
                    }
                ?>

                <a href="../highscores/">Highscores</a>
            </div>
        </div>

        <?php
            $_SESSION['previousPage'] = $_SERVER['REQUEST_URI'];

            $host     = "localhost";
            $username = "beroeps2LerenTellenUser";
            $password = "ymLvtJSZt$\$tEX639WMYNA!ybo&V7st6\$x64S*AT$9QEzg6*gjQ*@@cox^@d29XuBqUfp6W!B3m@LMFWSR5d3*WXVY92ksogx@gsCx*A4d7ABX#9SP*g8RCF27qcd*rK";
            $database = "beroeps2LerenTellen";

            $dbConn   = mysqli_connect($host, $username, $password, $database);

            // Check connection
            if(!$dbConn){
                die("ERROR: Could not connect. ". mysqli_connect_error());
            }

            $id     = $_SESSION["id"];
            $query  = "SELECT * FROM userprogress WHERE userId = '$id'";
            $result = mysqli_query($dbConn, $query);

            if(mysqli_num_rows($result) > 0){
                $row   = mysqli_fetch_array($result, MYSQLI_BOTH);
                $level = $row['level'];
                $question = $row['question'];
                $answeredCorrectly = $row['answeredCorrectly'];
                $answeredWrongly = $row['answeredWrongly'];

                $_SESSION['currentQuestion'] = $question;
                $_SESSION['answeredCorrectly'] = $answeredCorrectly;
                $_SESSION['answeredWrongly'] = $answeredWrongly;
            }

            if(!isset($_SESSION['currentQuestion'])){
                $_SESSION['currentQuestion'] = 1;
            }
            if(!isset($_SESSION['answeredCorrectly'])){
                $_SESSION['answeredCorrectly'] = 0;
            }
            if(!isset($_SESSION['answeredWrongly'])){
                $_SESSION['answeredWrongly'] = 0;
            }
        ?>

        <!-- Game -->
        <div id="contentDiv">
            <div class="itemDiv">

                <?php
                    echo "
                        <div>
                            <p>Vraag: ". $_SESSION['currentQuestion']. " / 10</p>
                            <p>Score: ". $_SESSION['answeredCorrectly']. " / 10</p>
                        </div>
                    ";

                    if($_SESSION['currentQuestion'] == 1){
                        echo "
                            <div>
                                <p>Hoeveel is 5&nbsp;+&nbsp;5?</p>
                            </div>
                            <div>
                                <form method='post'>
                                    <input type='hidden' name='question1' value='1'>
                                    <input type='submit' value='1'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='question1' value='2'>
                                    <input type='submit' value='9'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='question1' value='3'>
                                    <input type='submit' value='8'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='question1' value='4'>
                                    <input type='submit' value='10'>
                                </form>
                            </div>
                        ";
                    }
                    if($_SESSION['currentQuestion'] == 2){
                        echo "
                            <div>
                                <p>Hoeveel is 10&nbsp;-&nbsp;5?</p>
                            </div>
                            <div>
                                <form method='post'>
                                    <input type='hidden' name='question2' value='1'>
                                    <input type='submit' value='3'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='question2' value='2'>
                                    <input type='submit' value='5'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='question2' value='3'>
                                    <input type='submit' value='4'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='question2' value='4'>
                                    <input type='submit' value='11'>
                                </form>
                            </div>
                        ";
                    }
                    if($_SESSION['currentQuestion'] == 3){
                        echo "
                            <div>
                                <p>Wat is meer? 11&nbsp;+&nbsp;9 of 21?</p>
                            </div>
                            <div>
                                <form method='post'>
                                    <input type='hidden' name='question3' value='1'>
                                    <input type='submit' value='11 + 9'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='question3' value='2'>
                                    <input type='submit' value='21'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='question3' value='3'>
                                    <input type='submit' value='Geen van beide'>
                                </form>
                            </div>
                        ";
                    }
                    if($_SESSION['currentQuestion'] == 4){
                        echo "
                            <div>
                                <p>Larissa loopt voor 20&nbsp;seconden. Henk loopt 10&nbsp;seconden langer. Hoeveel seconden loopt Henk?</p>
                            </div>
                            <div>
                                <form method='post'>
                                    <input type='hidden' name='question4' value='1'>
                                    <input type='submit' value='10 seconden'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='question4' value='2'>
                                    <input type='submit' value='40 seconden'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='question4' value='3'>
                                    <input type='submit' value='30 seconden'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='question4' value='4'>
                                    <input type='submit' value='20 seconden'>
                                </form>
                            </div>
                        ";
                    }
                ?>

            </div>
        </div>

        <!-- Footer -->
        <footer class="footerFixed">
            <div>
                <p>Powered by GLR</p>
            </div>
        </footer>

        <?php
            if(!empty($_POST)){
                if(
                    ($_SESSION['currentQuestion'] == 1 && isset($_POST["question1"]) && $_POST["question1"] == "4") ||
                    ($_SESSION['currentQuestion'] == 2 && isset($_POST["question2"]) && $_POST["question2"] == "2") ||
                    ($_SESSION['currentQuestion'] == 3 && isset($_POST["question3"]) && $_POST["question3"] == "2") ||
                    ($_SESSION['currentQuestion'] == 4 && isset($_POST["question4"]) && $_POST["question4"] == "3")
                ){
                    $_SESSION['answeredCorrectly']++;
                    $_SESSION['currentQuestion']++;
                    insertIntoDB();
                    header("Refresh:2");
                }
                else if(
                    ($_SESSION['currentQuestion'] == 1 && isset($_POST["question1"]) && $_POST["question1"] != "4") ||
                    ($_SESSION['currentQuestion'] == 2 && isset($_POST["question2"]) && $_POST["question2"] != "2") ||
                    ($_SESSION['currentQuestion'] == 3 && isset($_POST["question3"]) && $_POST["question3"] != "2") ||
                    ($_SESSION['currentQuestion'] == 4 && isset($_POST["question4"]) && $_POST["question4"] != "3")
                ){
                    $_SESSION['answeredWrongly']++;
                    $_SESSION['currentQuestion']++;
                    insertIntoDB();
                    header("Refresh:2");
                }
            }

            function insertIntoDB(){
                $host     = "localhost";
                $username = "beroeps2LerenTellenUser";
                $password = "ymLvtJSZt$\$tEX639WMYNA!ybo&V7st6\$x64S*AT$9QEzg6*gjQ*@@cox^@d29XuBqUfp6W!B3m@LMFWSR5d3*WXVY92ksogx@gsCx*A4d7ABX#9SP*g8RCF27qcd*rK";
                $database = "beroeps2LerenTellen";

                $dbConn   = mysqli_connect($host, $username, $password, $database);

                // Check connection
                if(!$dbConn){
                    die("ERROR: Could not connect. ". mysqli_connect_error());
                }

                $id     = $_SESSION["id"];
                $query  = "SELECT * FROM userprogress WHERE userId = '$id'";
                $result = mysqli_query($dbConn, $query);

                if(mysqli_num_rows($result) > 0){
                    $row   = mysqli_fetch_array($result, MYSQLI_BOTH);
                    $level = $row['level'];
                }
                else{
                    $level = 1;
                }

                $question          = $_SESSION['currentQuestion'];
                $answeredCorrectly = $_SESSION['answeredCorrectly'];
                $answeredWrongly   = $_SESSION['answeredWrongly'];

                // If a DB entry already exists for a user, update data in userprogress table in beroeps2Verzamelaar database
                if(mysqli_num_rows($result) > 0){
                    $query2 = "UPDATE userprogress SET question = $question, answeredCorrectly = $answeredCorrectly, answeredWrongly = $answeredWrongly WHERE userId = $id";

                    mysqli_query($dbConn, $query2);
                }
                // If a DB entry doesn't exist yet for a user, Insert data in userprogress table in beroeps2Verzamelaar database
                else{
                    $query2 = "INSERT INTO userprogress (userId, level, question, answeredCorrectly, answeredWrongly) VALUES ('$id', $level, $question, $answeredCorrectly, $answeredWrongly)";

                    mysqli_query($dbConn, $query2);
                }
            }
        ?>

    </body>
</html>