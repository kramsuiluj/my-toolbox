<?php 

require_once 'db/conn.php';

$sysMessages = ['regMsg' => ''];
$notice = ['username' => '', 'email' => '', 'contact' => '', 'pass' => '', 'cpass' => ''];

$patterns = [
    'username' => "/^[\w_?]{5,20}$/",
    'contact' => "/^([\d]{11})|([+63\d]{13})$/",
    'password' => "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/"
];

if (isset($_POST['reg-btn'])) {

    if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['cnumber']) || empty($_POST['pass']) || empty($_POST['cpass'])) {

        $sysMessages['regMsg'] = 'All input fields are required to continue.';

    } else {

        // Username Validation
        if (preg_match($patterns['username'], htmlspecialchars($_POST['username']))) {

            $username = htmlspecialchars($_POST['username']);

        } else {

            $notice['username'] = 'The username you entered is invalid!';

        }
        // End of Username Validation

        // Email Validation
        if (filter_var(htmlspecialchars($_POST['email']), FILTER_VALIDATE_EMAIL)) {

            $email = htmlspecialchars($_POST['email']);

        } else {

            $notice['email'] = 'The email you entered is invalid!';

        }
        // End of Email Validation

        // Contact Number Validation
        if (preg_match($patterns['contact'], htmlspecialchars($_POST['cnumber']))) {

            $cnumber = htmlspecialchars($_POST['cnumber']);

        } else {

            $notice['contact'] = 'The contact number you entered is invalid!';

        }
        // End of Contact Number Validation

        // Password Validation
        if (preg_match($patterns['password'], htmlspecialchars($_POST['pass']))) {

            $pass = htmlspecialchars($_POST['pass']);

        } else {

            $notice['pass'] = 'The password you entered is invalid!';

        }
        // End of Password Validation

        // Confirm Password Validation
        if ($pass === htmlspecialchars($_POST['cpass'])) {

            $cpass = htmlspecialchars($_POST['cpass']);

        } else {

            $notice['cpass'] = 'The password you entered did not match!';

        }
        // End of Confirm Password Validation

        // Validate All
        if (empty($notice['username']) && empty($notice['email']) && empty($notice['contact']) && empty($notice['pass']) && empty($notice['cpass'])) {

            $register = $user->saveUserData($username, $email, $cnumber, $pass, $cpass);

            if ($register) {

                $sysMessages['regMsg'] = 'Your registration was successful!';

            } else {

                $sysMessages['regMsg'] = 'There was an error while registering your data.';

            }

        }
        // End of Validation

        

    }

}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        <?php require_once 'styles.css'; ?>
    </style>
</head>
<body>
    
    <main>
    
        <section class="reg-form-section">

            <form action="register.php" method="POST" id="reg-form">
            
                <section>
                    <label for="username">Username</label><br>
                    <input type="text" name="username" id="username">
                    <?php if (!empty($notice['username'])) { ?>
                        <span style="color: red; font-size:small; font-family: Arial;">
                            <?php echo $notice['username']; ?>
                        </span>
                    <?php } ?>
                </section>

                <section>
                    <label for="email">Email</label><br>
                    <input type="text" name="email" id="email">
                    <?php if (!empty($notice['email'])) { ?>
                        <span style="color: red; font-size:small; font-family: Arial;">
                            <?php echo $notice['email']; ?>
                        </span>
                    <?php } ?>
                </section> 

                <section>
                    <label for="cnumber">Contact Number</label><br>
                    <input type="text" name="cnumber" id="cnumber">
                    <?php if (!empty($notice['contact'])) { ?>
                        <span style="color: red; font-size:small; font-family: Arial;">
                            <?php echo $notice['contact']; ?>
                        </span>
                    <?php } ?>
                </section>

                <section>
                    <label for="pass">Password</label><br>
                    <input type="password" name="pass" id="pass">
                    <?php if (!empty($notice['pass'])) { ?>
                        <span style="color: red; font-size:small; font-family: Arial;">
                            <?php echo $notice['pass']; ?>
                        </span>
                    <?php } ?>
                </section>

                <section>
                    <label for="cpass">Confirm Password</label><br>
                    <input type="password" name="cpass" id="cpass">
                    <?php if (!empty($notice['cpass'])) { ?>
                        <span style="color: red; font-size:small; font-family: Arial;">
                            <?php echo $notice['cpass']; ?>
                        </span>
                    <?php } ?>
                </section>

                <section>
                    <br>
                    <button form="reg-form" name="reg-btn">Create an Account</button>
                </section>
            
            </form>

            <?php if ($sysMessages['regMsg'] != '') { ?>
                <p class="regMsg"><?php echo $sysMessages['regMsg']; ?></p>
            <?php } ?>

        </section>

    </main>

</body>
</html>