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

            <form action="login.php" method="POST" id="reg-form">
            
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
                    <input type="tel" name="cnumber" id="cnumber">
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

        </section>

    </main>

</body>
</html>