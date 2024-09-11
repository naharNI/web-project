<?php

function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function insertToDatabase($username, $password, $name)
{
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "practiceApp";

    // Create a connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO userInfo (username, password, name) VALUES (?, ?, ?)");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("sss", $username, $password, $name);

    // Execute the query and check the result
    $success = $stmt->execute();

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    return $success;
}
function matchCredential($username, $password)
{
    $isValid = false;
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "practiceApp";

    $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed : " . $conn->connect_error);
    } else {
        echo "Connected with the database";
    }

    //Query
    $query = "SELECT *FROM userInfo WHERE username = '$username' AND password = '$password'";
    //Execute the query and store result in the result variable
    $result = $conn->query("$query");

    $userInfo = $result->fetch_assoc();

    if ($result->num_rows === 1) {
        $_SESSION['userId'] = $userInfo['id'];
        $_SESSION['loggedInTime'] = time();
        $isValid = true;
    }
    return $isValid;
}
