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
        <link rel="stylesheet" href="../css/gameStyle.css">
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

            require "../dbConn.php";

            $id     = $_SESSION["id"];
            $query  = $dbConn->prepare("SELECT * FROM userprogress WHERE userId = ?");
            $query->bind_param('i', $id);
            $query->execute();
            $result = $query->get_result();

            if(mysqli_num_rows($result) > 0){
                $row   = mysqli_fetch_array($result, MYSQLI_BOTH);
                $level = $row['level'];
                $question = $row['question'];
                $answeredCorrectly = $row['answeredCorrectly'];
                $answeredWrongly = $row['answeredWrongly'];

                $_SESSION['currentLevel'] = $level;
                $_SESSION['currentQuestion'] = $question;
                $_SESSION['answeredCorrectly'] = $answeredCorrectly;
                $_SESSION['answeredWrongly'] = $answeredWrongly;
            }

            if(!isset($_SESSION['currentLevel'])){
                $_SESSION['currentLevel'] = 1;
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
                                    <input type='hidden' name='1' value='1'>
                                    <input type='submit' value='1'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='1' value='2'>
                                    <input type='submit' value='9'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='1' value='3'>
                                    <input type='submit' value='8'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='1' value='4'>
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
                                    <input type='hidden' name='2' value='1'>
                                    <input type='submit' value='3'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='2' value='2'>
                                    <input type='submit' value='5'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='2' value='3'>
                                    <input type='submit' value='4'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='2' value='4'>
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
                                    <input type='hidden' name='3' value='1'>
                                    <input type='submit' value='11 + 9'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='3' value='2'>
                                    <input type='submit' value='21'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='3' value='3'>
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
                                    <input type='hidden' name='4' value='1'>
                                    <input type='submit' value='10 seconden'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='4' value='2'>
                                    <input type='submit' value='40 seconden'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='4' value='3'>
                                    <input type='submit' value='30 seconden'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='4' value='4'>
                                    <input type='submit' value='20 seconden'>
                                </form>
                            </div>
                        ";
                    }
                    if($_SESSION['currentQuestion'] == 5){
                        echo "
                            <div>
                                <p>Hoeveel seconden zitten er in een halve&nbsp;minuut?</p>
                            </div>
                            <div>
                                <form method='post'>
                                    <input type='hidden' name='5' value='1'>
                                    <input type='submit' value='60 seconden'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='5' value='2'>
                                    <input type='submit' value='40 seconden'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='5' value='3'>
                                    <input type='submit' value='50 seconden'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='5' value='4'>
                                    <input type='submit' value='30 seconden'>
                                </form>
                            </div>
                        ";
                    }
                    if($_SESSION['currentQuestion'] == 6){
                        echo "
                            <div>
                                <p>5 x 5 = ?</p>
                            </div>
                            <div>
                                <form method='post'>
                                    <input type='hidden' name='6' value='1'>
                                    <input type='submit' value='25'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='6' value='2'>
                                    <input type='submit' value='15'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='6' value='3'>
                                    <input type='submit' value='5'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='6' value='4'>
                                    <input type='submit' value='50'>
                                </form>
                            </div>
                        ";
                    }
                    if($_SESSION['currentQuestion'] == 7){
                        echo "
                            <div>
                                <p>50 - 20 = ?</p>
                            </div>
                            <div>
                                <form method='post'>
                                    <input type='hidden' name='7' value='1'>
                                    <input type='submit' value='40'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='7' value='2'>
                                    <input type='submit' value='10'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='7' value='3'>
                                    <input type='submit' value='30'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='7' value='4'>
                                    <input type='submit' value='20'>
                                </form>
                            </div>
                        ";
                    }
                    if($_SESSION['currentQuestion'] == 8){
                        echo "
                            <div>
                                <p>5 + 5 = ?</p>
                            </div>
                            <div>
                                <form method='post'>
                                    <input type='hidden' name='8' value='1'>
                                    <input type='submit' value='10'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='8' value='2'>
                                    <input type='submit' value='7'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='8' value='3'>
                                    <input type='submit' value='5'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='8' value='4'>
                                    <input type='submit' value='3'>
                                </form>
                            </div>
                        ";
                    }
                    if($_SESSION['currentQuestion'] == 9){
                        echo "
                            <div>
                                <p>Which of these numbers is an odd number ?</p>
                            </div>
                            <div>
                                <form method='post'>
                                    <input type='hidden' name='9' value='1'>
                                    <input type='submit' value='Ten'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='9' value='2'>
                                    <input type='submit' value='Twelve'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='9' value='3'>
                                    <input type='submit' value='Eight'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='9' value='4'>
                                    <input type='submit' value='Eleven'>
                                </form>
                            </div>
                        ";
                    }
                    if($_SESSION['currentQuestion'] == 10){
                        echo "
                            <div>
                                <p>7 X 2 = ?</p>
                            </div>
                            <div>
                                <form method='post'>
                                    <input type='hidden' name='10' value='1'>
                                    <input type='submit' value='10'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='10' value='2'>
                                    <input type='submit' value='16'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='10' value='3'>
                                    <input type='submit' value='15'>
                                </form>
                                <form method='post'>
                                    <input type='hidden' name='10' value='4'>
                                    <input type='submit' value='14'>
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
                    ($_SESSION['currentQuestion'] == 1 && isset($_POST["1"]) && $_POST["1"] == "4") ||
                    ($_SESSION['currentQuestion'] == 2 && isset($_POST["2"]) && $_POST["2"] == "2") ||
                    ($_SESSION['currentQuestion'] == 3 && isset($_POST["3"]) && $_POST["3"] == "2") ||
                    ($_SESSION['currentQuestion'] == 4 && isset($_POST["4"]) && $_POST["4"] == "3") ||
                    ($_SESSION['currentQuestion'] == 5 && isset($_POST["5"]) && $_POST["5"] == "4") ||
                    ($_SESSION['currentQuestion'] == 6 && isset($_POST["6"]) && $_POST["6"] == "1") ||
                    ($_SESSION['currentQuestion'] == 7 && isset($_POST["7"]) && $_POST["7"] == "3") ||
                    ($_SESSION['currentQuestion'] == 8 && isset($_POST["8"]) && $_POST["8"] == "1") ||
                    ($_SESSION['currentQuestion'] == 9 && isset($_POST["9"]) && $_POST["9"] == "4")
                ){
                    $_SESSION['answeredCorrectly']++;
                    $_SESSION['currentQuestion']++;
                    insertIntoDB();
                    header("Refresh:2");
                }
                else if(
                    ($_SESSION['currentQuestion'] == 1 && isset($_POST["1"]) && $_POST["1"] != "4") ||
                    ($_SESSION['currentQuestion'] == 2 && isset($_POST["2"]) && $_POST["2"] != "2") ||
                    ($_SESSION['currentQuestion'] == 3 && isset($_POST["3"]) && $_POST["3"] != "2") ||
                    ($_SESSION['currentQuestion'] == 4 && isset($_POST["4"]) && $_POST["4"] != "3") ||
                    ($_SESSION['currentQuestion'] == 5 && isset($_POST["5"]) && $_POST["5"] != "4") ||
                    ($_SESSION['currentQuestion'] == 6 && isset($_POST["6"]) && $_POST["6"] != "1") ||
                    ($_SESSION['currentQuestion'] == 7 && isset($_POST["7"]) && $_POST["7"] != "3") ||
                    ($_SESSION['currentQuestion'] == 8 && isset($_POST["8"]) && $_POST["8"] != "1") ||
                    ($_SESSION['currentQuestion'] == 9 && isset($_POST["9"]) && $_POST["9"] != "4")
                ){
                    $_SESSION['answeredWrongly']++;
                    $_SESSION['currentQuestion']++;
                    insertIntoDB();
                    header("Refresh:2");
                }
                else if($_SESSION['currentQuestion'] == 10 && isset($_POST["10"]) && $_POST["10"] == "4"){
                    $_SESSION['answeredCorrectly']++;
                    insertIntoDB();
                    lastQuestionAnswered();
                    header("Refresh:2");
                }
                else if($_SESSION['currentQuestion'] == 10 && isset($_POST["10"]) && $_POST["10"] != "4"){
                    $_SESSION['answeredWrongly']++;
                    insertIntoDB();
                    lastQuestionAnswered();
                    header("Refresh:2");
                }
            }

            function insertIntoDB(){
                require "../dbConn.php";

                $id     = $_SESSION["id"];
                $query  = $dbConn->prepare("SELECT * FROM userprogress WHERE userId = ?");
                $query->bind_param('i', $id);
                $query->execute();
                $result = $query->get_result();

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
                    $query2 = $dbConn->prepare("UPDATE userprogress SET question = ?, answeredCorrectly = ?, answeredWrongly = ? WHERE userId = ?");
                    $query2->bind_param('iiii', $question, $answeredCorrectly, $answeredWrongly, $id);
                    $query2->execute();
                }
                // If a DB entry doesn't exist yet for a user, Insert data in userprogress table in beroeps2Verzamelaar database
                else{
                    $query2 = $dbConn->prepare("INSERT INTO userprogress (userId, level, question, answeredCorrectly, answeredWrongly) VALUES (?, ?, ?, ?, ?)");
                    $query2->bind_param('iiiii', $id, $level, $question, $answeredCorrectly, $answeredWrongly);
                    $query2->execute();
                }
            }

            function lastQuestionAnswered(){
                require "../dbConn.php";

                if($_SESSION['answeredCorrectly'] >= 6){
                    $_SESSION['currentLevel']++;
                    $_SESSION['currentQuestion']   = 1;
                    $_SESSION['answeredCorrectly'] = 0;
                    $_SESSION['answeredWrongly']   = 0;

                    $id                = $_SESSION["id"];
                    $level             = $_SESSION['currentLevel'];
                    $question          = $_SESSION['currentQuestion'];
                    $answeredCorrectly = $_SESSION['answeredCorrectly'];
                    $answeredWrongly   = $_SESSION['answeredWrongly'];

                    $query2 = $dbConn->prepare("UPDATE userprogress SET level = ?, question = ?, answeredCorrectly = ?, answeredWrongly = ? WHERE userId = ?");
                    $query2->bind_param('iiiii', $level, $question, $answeredCorrectly, $answeredWrongly, $id);
                    $query2->execute();
                }
                else{
                    $_SESSION['currentQuestion'] = 1;
                }
            }
        ?>

    </body>
</html>