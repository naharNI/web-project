<?php
require_once("forall.php");

//User login validation 
if (!isset($_SESSION['userId'])) {

    header('Location: registration.php');
    exit;

}

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "firstApp";

$conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed : " . $conn->connect_error);
}

$userId = $_SESSION['userId'];
//Query
$query = "SELECT *FROM test WHERE id = '$userId'";
//Execute the query and store result in the result variable
$result = $conn->query("$query");

$userInfo = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="container">
        <h1>Dashboard</h1>



        <br>



        <hr>

        <form action="upload.php"><button type="submit">Upload image</button></form>
        <form action="../controllers/gallery.php"><button type="submit">Gallery</button></form>
        <form action="../controllers/logout.php"><button type="submit">Logout</button></form>
        <form action="deleteAccount.php"><button type="submit">Delete account</button></form>
    </div>

</body>

</html>