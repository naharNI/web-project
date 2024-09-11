<?php
require_once("../views/forall.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitize(($_POST['Username']));
    $password = sanitize(($_POST['Password']));
    $name = sanitize(($_POST['name']));
    $confirmPass = sanitize(($_POST['ConfirmPassword']));

    if ($password === $confirmPass) {
        if (insertToDatabase($username, $password, $name)) {
            header("Location: ../views/index.php?registration=succesfull");
        }
    } else {
        header("Location: ../views/registration.php?registration=failed");
    }

}
?>