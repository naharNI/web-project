<?php
require_once('../views/forall.php');
$isValid = false;
$_SESSION['userId'] = "";
$_SESSION['loggedInTime'] = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = sanitize($_POST['Username']);
    $password = sanitize($_POST['Password']);

    $isValid = matchCredential($username, $password);

}

if (!$isValid) {

    header("Location: ../views/index.php?login=failed&username=$username");
} else {

    header("Location: ../views/home.php");
}







