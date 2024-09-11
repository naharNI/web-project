<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <table>
        <tr>
            <td>
                <fieldset>
                    <h1>Login</h1>
                    <?php
                    if (isset($_GET['login']) && $_GET['login'] === 'failed') {
                        echo '<p style="color:red">Your username or password is incorrect!</p>';
                    }
                    if (isset($_GET['registration']) && $_GET['registration'] === 'seccessful') {
                        echo '<p style="color:green">Registration successfull</p>';
                    }
                    if (isset($_GET['delete']) && $_GET['delete'] === 'successful') {
                        echo '<p style="color:green">Account deleted</p>';
                    }
                    ?>
                    <form action="../controllers/loginAction.php" method="post" novalidate>
                        <div class="form-row">
                            <label for="username">Username :</label>
                            <input type="text" name="Username" id="username"
                                value="<?php echo isset($_GET['username']) ? $_GET['username'] : "" ?>">
                        </div>
                        <div class="form-row">
                            <label for="password">Password :</label>
                            <input type="password" name="Password" id="password">
                        </div>
                        <button type="submit">Login</button>
                    </form>
                    <form action="registration.php"><button type="submit">Registration</button></form>
                </fieldset>
            </td>
        </tr>
    </table>
</body>

</html>