<?php
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link rel="stylesheet" href="registrationStyles.css">
</head>

<body>

    <div class="container">
        <h1>Registration</h1>

        <?php
        if (isset($_GET['registration']) && $_GET['registration'] === 'failed') {
            echo '<p style="color:Blue ">Registration failed. Please try again!!</p>';
        }
        ?>

        <form action="../controllers/registrationAction.php" method="post" novalidate>
            <div class="form-row">
                <label for="username">Username :</label>
                <input type="text" name="Username" id="username" placeholder="Enter your username">
            </div>

            <div class="form-row">
                <label for="name">name :</label>
                <input type="text" name="name" id="name" placeholder="Enter your name">
            </div>
            <div class="form-row">
                <label for="password">Password :</label>
                <input type="password" name="Password" id="password" placeholder="Enter your password">
            </div>
            <div class="form-row">
                <label for="confirm_password">Confirm Password :</label>
                <input type="password" name="ConfirmPassword" id="confirm_password" placeholder="Confirm your password">
            </div>
            <button type="submit">Register</button>
        </form>
    </div>

</body>

</html>