<?php
require("../php/signup.php");

?>



<!DOCTYPE html>
<html>
<head>

    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="../css/signup.css?v=<?php echo time(); ?>">
    <?php
   
    if($sucess!=null){
       
        ?><style>.sucess{display:block} </style><?php
     
    } 
    else if($failure!=null){
      
        ?><style>.fail{display:block} </style><?php
       
    }  
    else if($invalid!=null){
        ?><style>.invalid{display:block} </style><?php
    } 
    
    ?>
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form action="" method="POST" id="signupform" onsubmit="return validateEmail()">

       
            
 <!-- Email Field -->
 <label for="email">Email:</label>
  <input type="email" id="email" name="email" required autocomplete="off" 
         pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" 
         title="Please enter a valid email address in lowercase only. Example: example@domain.com"><br>

  <!-- Password Field -->
  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required autocomplete="off" 
         pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}" 
         title="Password must be at least 8 characters long, include an uppercase letter, a lowercase letter, a number, and a special character."><br>

  <!-- Confirm Password Field -->
  <label for="confirmPassword">Confirm Password:</label>
  <input type="password" id="confirmPassword" name="confpwd" required
         oninput="validatePassword()" 
         title="Passwords must match."><br>
            <!-- messages -->
            <p class="sucess"><?php echo $sucess?> </p>
            <p class="fail"><?php echo $failure?></p>
            <p class="invalid"><?php echo $invalid?></p>
            <p id="confirm"></p>

            <button type="submit" name="submit">Sign Up</button>
        </form>

        <div class="login-link">
            Already have an account? <a href="../html/signin.php">Sign In</a>
        </div>
    </div>
    <script src="../js/signup.js">
        function validatePassword() {
  const password = document.getElementById('password').value;
  const confirmPassword = document.getElementById('confirmPassword').value;

  if (password !== confirmPassword) {
      document.getElementById('confirmPassword').setCustomValidity("Passwords do not match.");
  } else {
      document.getElementById('confirmPassword').setCustomValidity('');
  }
}

function validateEmail() {
  const email = document.getElementById('email').value;

  // Check if the email contains any uppercase letters
  const lowercaseEmailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
  if (!lowercaseEmailPattern.test(email)) {
      alert("Email must be in lowercase only and in the correct format.");
      return false; // Prevent form submission
  }

  return true; // Allow form submission if valid
}
    </script>
</body>
</html>
