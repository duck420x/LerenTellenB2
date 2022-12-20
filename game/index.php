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
            <a class="active" href="javascript:void(0)">Leren Tellen</a>
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
            <div>
                <h1>Question 1</h1>
                <p>[question]</p>
                <form action="" method="post">
                    <input type="hidden" value="answer1">
                    <input type="submit" value="[answer1]">
                </form>
                <form action="" method="post">
                    <input type="hidden" value="answer2">
                    <input type="submit" value="[answer2]">
                </form>
                <form action="" method="post">
                    <input type="hidden" value="answer3">
                    <input type="submit" value="[answer3]">
                </form>
                <form action="" method="post">
                    <input type="hidden" value="answer4">
                    <input type="submit" value="[answer4]">
                </form>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <div>
                <p>Powered by GLR</p>
            </div>
        </footer>
    </body>
</html>

<?php
    $_SESSION['previousPage'] = $_SERVER['REQUEST_URI'];