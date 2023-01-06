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
    require "../dbConn.php";

    // Taking all values from the form data(input)
    $formUsername         = $_REQUEST['username'];
    $formPassword         = $_REQUEST['password'];
    $formPasswordRepeated = $_REQUEST['passwordRepeated'];


    if($formPassword == $formPasswordRepeated){
        // Check if username already exists
        $query  = $dbConn->prepare("SELECT * FROM users WHERE username = ?");
        $query->bind_param('s', $formUsername);
        $query->execute();
        $result = $query->get_result();

        $previousPage = $_SESSION['previousPage'];

        // If username doesn't exist already proceed with account creation
        if(mysqli_num_rows($result) == 0){
            $formPasswordHashed = password_hash($formPassword, PASSWORD_DEFAULT);

            // Insert data in users table in beroeps2Verzamelaar database
            $query2 = $dbConn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $query2->bind_param('ss', $formUsername, $formPasswordHashed);
            $query2->execute();

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