<?php
require("../php/AdminLogin.php")
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <link rel="stylesheet" type="text/css" href="../css/signin.css">
    <?php
    if($notFound!=null){
        ?><style>.usernotfound{display:block} </style><?php
    } 
    else if($failure!=null){
        ?><style>.fail{display:block} </style><?php
    }   
    
    ?>
</head>
<body>
    <div class="container">
        <h2>Sign In as Admin</h2>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            <p class="fail"><?php echo $failure?></p>
            <p class="usernotfound"><?php echo $notFound?></p>

            <button type="submit" name="submit">Sign In</button>
        </form>

        <div class="signup-link">
            Don't have an account? <a href="../html/signup.php">Sign Up</a>
        </div>
    </div>
</body>
</html>
