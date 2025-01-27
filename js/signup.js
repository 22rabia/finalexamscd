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