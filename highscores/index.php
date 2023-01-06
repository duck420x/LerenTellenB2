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
        <title>Leren Tellen | Highscores</title>
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

            </div>
        </div>

        <!-- Table with highscores -->
        <table>
            <tr>
                <th>Username</th>
                <th>Level</th>
            </tr>

            <?php
                $host     = "localhost";
                $username = "beroeps2LerenTellenUser";
                $password = "ymLvtJSZt$\$tEX639WMYNA!ybo&V7st6\$x64S*AT$9QEzg6*gjQ*@@cox^@d29XuBqUfp6W!B3m@LMFWSR5d3*WXVY92ksogx@gsCx*A4d7ABX#9SP*g8RCF27qcd*rK";
                $database = "beroeps2LerenTellen";

                $dbConn   = mysqli_connect($host, $username, $password, $database);

                // Check connection
                if(!$dbConn){
                    die("ERROR: Could not connect. ". mysqli_connect_error());
                }

                $query  = "SELECT * FROM userprogress";
                $result = mysqli_query($dbConn, $query);

                if(mysqli_num_rows($result) > 0){
                    while($item = mysqli_fetch_assoc($result)){
                        $id        = $item['userId'];
                        $query2    = $dbConn->prepare("SELECT username FROM users WHERE id = ?");
                        $query2->bind_param('i', $id);
                        $query2->execute();
                        $result    = $query2->get_result();

                        $row       = mysqli_fetch_array($result, MYSQLI_BOTH);
                        $username2 = $row['username'];

                        echo "
                            <tr>
                                <td>". $username2. "</td>
                                <td>". $item['level']. "</td>
                            </tr>
                        ";
                    }
                }
            ?>

        </table>

        <!-- Footer -->
        <footer class="footerFixed">
            <div>
                <p>Powered by GLR</p>
            </div>
        </footer>
    </body>
</html>

<?php
    $_SESSION['previousPage'] = $_SERVER['REQUEST_URI'];