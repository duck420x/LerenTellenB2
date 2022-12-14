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
        <title>Leren Tellen | Signing up...</title>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
    </body>
</html>

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

    // Taking all values from the form data(input)
    $formUsername         = $_REQUEST['username'];
    $formPassword         = $_REQUEST['password'];
    $formPasswordRepeated = $_REQUEST['passwordRepeated'];


    if($formPassword == $formPasswordRepeated){
        // Check if username already exists
        $query  = "SELECT * FROM users WHERE username = '$formUsername'";
        $result = mysqli_query($dbConn, $query);

        $previousPage = $_SESSION['previousPage'];

        // If username doesn't exist already proceed with account creation
        if(mysqli_num_rows($result) == 0){
            $formPasswordHashed = password_hash($formPassword, PASSWORD_DEFAULT);
            $query2             = "INSERT INTO users (username, password) VALUES ('$formUsername', '$formPasswordHashed')";

            // Insert data in users table in beroeps2Verzamelaar database
            mysqli_query($dbConn, $query2);

            echo
                "<div id='content'>",
                    "<h1>Account successfully created!</h1>",
                    "<a href='$previousPage'>Continue</a>",
                "</div>"
            ;
            // Redirect automatically to the previous page after 2 seconds
            header("Refresh: 2; url = $previousPage");
        }
        // If username already exists show error
        else{
            echo
                "<div id='content'>",
                    "<h1>That username has already been taken!</h1>",
                    "<a href='$previousPage'>Continue</a>",
                "</div>"
            ;
            // Redirect automatically to the previous page after 2 seconds
            header("Refresh: 2; url = $previousPage");
        }
    }
    // If passwords don't match show error
    else{
        echo
            "<div id='content'>",
                "<h1>passwords don't match!</h1>",
                "<a href='$previousPage'>Continue</a>",
            "</div>"
        ;
        // Redirect automatically to the previous page after 2 seconds
        header("Refresh: 2; url = $previousPage");
    }
    // DEBUG:  or die(mysqli_error($dbConn))
?>