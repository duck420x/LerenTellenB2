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