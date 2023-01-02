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

        <!-- Game -->
        <div id="contentDiv">
            <div class="itemDiv">
                <h1>Question 1</h1>
                <p>Hoeveel is 5 + 5?</p>
                <form method="post">
                    <input type="hidden" name="question1" value="answer1">
                    <input type="submit" value="1">
                </form>
                <form method="post">
                    <input type="hidden" name="question1" value="answer2">
                    <input type="submit" value="9">
                </form>
                <form method="post">
                    <input type="hidden" name="question1" value="answer3">
                    <input type="submit" value="8">
                </form>
                <form method="post">
                    <input type="hidden" name="question1" value="answer4">
                    <input type="submit" value="10">
                </form>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footerFixed">
            <div>
                <p>Powered by GLR</p>
            </div>
        </footer>

        <?php
            $_SESSION['previousPage'] = $_SERVER['REQUEST_URI'];

            if(!empty($_POST)){
                print_r($_POST);
                echo "<br><br>werkt!!!";
            }
        ?>

    </body>
</html>