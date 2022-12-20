<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="Author" content="Stef88129">
    <title>High-Scores</title>
</head>
<body>
<div id="navbar">
            <a class="active" href="javascript:void(0)">Leren Tellen</a>
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
<div class="scores">
    <label><P class="ttlHG">High-Scores:</P></label>
    <p>In de highscores tabel komen de top 5 spelers te staan! <br/> Heb jij dus een hooge scoren behaald, is er een groote kans dat je jezelf hier terug vindt.</p>
    <table>
        <tr>
            <th>User:</th>
            <th>Score:</th>
        </tr>
        <tr>
            <td>user1</td>
            <td>95</td>
        </tr>
        <tr>
            <td>user2</td>
            <td>69</td>
        </tr>
        <tr>
            <td>user3</td>
            <td>51</td>
        </tr>
        <tr>
            <td>user4</td>
            <td>33</td>
        </tr>
        <tr>
            <td>user5</td>
            <td>20</td>
        </tr>
    </table>
</div>
<footer>
    <div>
        <p>Powered by GLR</p>
    </div>
</footer>
</body>
</html>