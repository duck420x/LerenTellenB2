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
        <title>HomePage</title>
        <meta name="Author" content="Stef88129">
        <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/indexStyle.css">
    </head>
    <body>
        <!-- Header image -->
        <header>
            <div>
                <img src="./images/background101.png" id="fotoHeader">
            </div>
        </header>

        <!-- Navbar -->
        <div id="navbar">
            <a class="active" href="">Leren Tellen</a>
            <div class="nav2">
                <?php
                    if(isset($_SESSION['loggedIn'])){
                        $username = $_SESSION['username'];
                        echo "
                            <p>Username: $username</p>
                            <a href='logout.php'>Logout</a>
                        ";
                    }
                    else{
                        echo "
                            <a href='signup/'>Signup</a>
                            <a href='login/'>Login</a>
                        ";
                    }
                ?>
                <a href="highscores/">Highscores</a>
            </div>
        </div>

        <!-- Info -->
        <main>
            <div class="InfoHome">
                <p class="info"> <div id="titleHome">
                    <p class="ttl1" style="text-align: center;">Leren Tellen!</p>
                </div>Dit spel is gemaakt voor basis school leerlingen die willen leren tellen. De bedoeling is dat de leerlingen leren tellen tot 50.<br/> Dit gaan we doen door een aantal levels te maken van 10 vragen die steeds moeilijker worden, van deze 10 vragen <br/> heb je er minimaal 6 goed nodig om door te gaan naar het volgende level. </p>
            </div>
            <a href="game"><p class="knop">Play</p></a>
        </main>

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