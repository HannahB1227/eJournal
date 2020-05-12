<?php

    $email = $pswd = "";
    $emailErr = $pswdErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["loginEmail"])) {
            $emailErr = "Email is required";
        } //if
        else {
            $email = test_input($_POST["loginEmail"]);
        } //else

        if (empty($_POST["loginPassword"])) {
            $pswdErr = "Password is required";
        } //if
        else {
            $pswd = test_input($_POST["loginPassword"]);
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

    $sql = "SELECT uid FROM Users WHERE email = '" . $email . "' and '" . $pswd . "'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "Query Successful: uid = " . $result[0];
    } //if
    else {
        echo "No user with inputed email and password.";
    } //else

    mysqli_close($conn);

?>