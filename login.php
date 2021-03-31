<?php 



?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    
    <div>
    
        <form action="login.php" method="POST" id="login-form">
            <section>
                <label for="email">Email</label><br>
                <input type="text" name="email" id="email">
            </section>
            <section>
                <label for="pass">Password</label><br>
                <input type="password" name="pass" id="pass">
            </section>
            <section>
                <br>
                <button form="login-form" name="login-btn">Login</button>
            </section>
        </form>
    
    </div>

</body>
</html>