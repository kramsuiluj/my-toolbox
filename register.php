<?php 

require_once 'db/conn.php';

$sysMessages = ['regMsg' => ''];

if (isset($_POST['reg-btn'])) {

    if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['cnumber']) || empty($_POST['pass']) || empty($_POST['cpass'])) {

        $sysMessages['regMsg'] = 'All input fields are required to continue.';

    } else {

        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $cnumber = htmlspecialchars($_POST['cnumber']);
        $pass = htmlspecialchars($_POST['pass']);
        $cpass = htmlspecialchars($_POST['cpass']);

        $register = $user->saveUserData($username, $email, $cnumber, $pass, $cpass);

        if ($register) {

            $sysMessages['regMsg'] = 'Your registration was successful!';

        } else {

            $sysMessages['regMsg'] = 'There was an error while registering your data.';

        }

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
                </section>

                <section>
                    <label for="email">Email</label><br>
                    <input type="text" name="email" id="email">
                </section>

                <section>
                    <label for="cnumber">Contact Number</label><br>
                    <input type="text" name="cnumber" id="cnumber">
                </section>

                <section>
                    <label for="pass">Password</label><br>
                    <input type="password" name="pass" id="pass">
                </section>

                <section>
                    <label for="cpass">Confirm Password</label><br>
                    <input type="password" name="cpass" id="cpass">
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