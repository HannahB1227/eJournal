<?php

    $fname = $lname = $email = $pswd = "";
    $fnameErr = $lnameErr = $emailErr = $pswdErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["registerFname"])) {
            $fnameErr = "First Name is required";
        } //if
        else {
            $fname = test_input($_POST["registerFname"]);
        } //else
        
        if (empty($_POST["registerLname"])) {
            $lnameErr = "Last Name is required";
        } //if
        else {
            $lname = test_input($_POST["registerLname"]);
        } //else
        
        if (empty($_POST["registerEmail"])) {
            $emailErr = "Email is required";
        } //if
        else {
            $email = test_input($_POST["registerEmail"]);
        } //else

        if (empty($_POST["registerPassword"])) {
            $pswdErr = "Password is required";
        } //if
        else {
            $pswd = test_input($_POST["registerPassword"]);
        } //else
    } //if

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    } //test_input

    $serverName = "localhost";
    $username = "root";
    $dbPswd = "WinterWolf#13";
    $dbName = "eJournal";

    $conn = mysqli_connect($serverName, $username, $dbPswd, $dbName);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } //if
    echo "Connected successfully";

    $sql = "INSERT INTO Users (Fname, Lname, email, password) VALUES ('" . $fname . "', '" . $lname . "', '" . $email . "', '" . $pswd . "')";

    mysqli_close($conn);

?>