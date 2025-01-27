<?php
require("../php/signin.php")
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <link rel="stylesheet" type="text/css" href="../css/signin.css?v=<?php echo time(); ?>">
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
        <h2>Sign In</h2>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required autocomplete="on"><br>

            <label for="password">Password:</label>
            <input type="password" id="pass" name="password" required autocomplete="on"><br>
            <p class="fail"><?php echo $failure?></p>
            <p class="usernotfound"><?php echo $notFound?></p>

            <button type="submit" id="submit" name="submit">Sign In</button>
        </form>

        <div class="signup-link">
            Don't have an account? <a href="../html/signup.php">Sign Up</a>
        </div>
    </div>
    <script src="../js/signin.js"></script>
</body>
</html>
