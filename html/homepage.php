<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../css/homepage.css?v=<?php echo time(); ?>">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>CartNinja - Homepage</title>
</head>
<body>
  <!-- Header Section -->
  <header class="bg-light border-bottom py-3">
    <div class="container d-flex justify-content-between align-items-center">
      <h4><a href="homepage.php" class="text-dark text-decoration-none">CartNinja</a></h4>
      <nav>
        <ul class="navbar-nav flex-row">
          <li class="nav-item mx-2"><a href="homepage.php" class="nav-link text-dark">Home</a></li>
          <li class="nav-item mx-2"><a href="cart.php" class="nav-link text-dark">Cart</a></li>
          <li class="nav-item mx-2"><a href="about.php" class="nav-link text-dark">About</a></li>
          <li class="nav-item mx-2"><a href="signup.php" class="nav-link text-dark">signup</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Main Section -->
  <main>
    <div id="maindiv" class="container py-5">
      <div class="row g-4">
        <!-- Product 1 -->
        <div class="col-md-6 col-lg-4">
          <div class="card h-100">
            <img src="../img/nike.jpeg" class="card-img-top" alt="Shoes">
            <div class="card-body d-flex flex-column text-center">
              <h5 class="card-title">Shoes</h5>
              <p class="card-text">Imported hand-made shoes</p>
              <p class="text-success fw-bold">Rs 1500</p>
              <div class="mt-auto">
                <button id="p1" class="btn btn-primary">Add to Cart</button>
                <a href="./review.php" class="btn btn-warning ms-2">&#9733;</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Product 2 -->
        <div class="col-md-6 col-lg-4">
          <div class="card h-100">
            <img src="../img/girl.jpg" class="card-img-top" alt="Girls T-shirt">
            <div class="card-body d-flex flex-column text-center">
              <h5 class="card-title">Girls T-shirt</h5>
              <p class="card-text">Made in Pakistan</p>
              <p class="text-success fw-bold">Rs 1500.00</p>
              <div class="mt-auto">
                <button id="p2" class="btn btn-primary">Add to Cart</button>
                <a href="./review.php" class="btn btn-warning ms-2">&#9733;</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Product 3 -->
        <div class="col-md-6 col-lg-4">
          <div class="card h-100">
            <img src="../img/iphone.jpg" class="card-img-top" alt="Iphone 14 Pro Max">
            <div class="card-body d-flex flex-column text-center">
              <h5 class="card-title">Iphone 14 Pro Max</h5>
              <p class="card-text">4 GB RAM</p>
              <p class="text-success fw-bold">Rs 200k</p>
              <div class="mt-auto">
                <button id="p3" class="btn btn-primary">Add to Cart</button>
                <a href="./review.php" class="btn btn-warning ms-2">&#9733;</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Product 4 -->
        <div class="col-md-6 col-lg-4">
          <div class="card h-100">
            <img src="../img/glasses.jpg" class="card-img-top" alt="Rayban Glasses">
            <div class="card-body d-flex flex-column text-center">
              <h5 class="card-title">Rayban Glasses</h5>
              <p class="card-text">Made with metal</p>
              <p class="text-success fw-bold">Rs 1950</p>
              <div class="mt-auto">
                <button id="p4" class="btn btn-primary">Add to Cart</button>
                <a href="./review.php" class="btn btn-warning ms-2">&#9733;</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Chat Support Button -->
    <div class="text-center py-4">
      <a class="btn btn-info" href="./client.php">Chat Support</a>
    </div>
  </main>

  <!-- Footer Section -->
  <footer class="bg-dark text-light py-5">
    <div class="container">
      <div class="row">
        <!-- About Us -->
        <div class="col-md-4">
          <h5>About Us</h5>
          <p>Your Shopping Website is your one-stop destination for the best deals on a wide range of products. We are committed to providing quality and value to our customers.</p>
        </div>
        <!-- Contact Us -->
        <div class="col-md-4">
          <h5>Contact Us</h5>
          <ul class="list-unstyled">
            <li>Email: eabiarabi2217@gmail.com</li>
            <li>Phone: 03443055336</li>
          </ul>
        </div>
        <!-- Quick Links -->
        <div class="col-md-4">
          <h5>Quick Links</h5>
          <ul class="list-unstyled">
            <li><a href="homepage.php" class="text-light text-decoration-none">Home</a></li>
            <li><a href="cart.php" class="text-light text-decoration-none">Cart</a></li>
            <li><a href="about.php" class="text-light text-decoration-none">About</a></li>
          </ul>
        </div>
      </div>
      <div class="text-center mt-3">
        &copy; 2023 CartNinja
      </div>
    </div>
  </footer>

  <script>
  // Function to add products to the cart
  function addProductToCart(id, name, price, img) {
    const product = { id, name, price, img };

    // Get the cart from sessionStorage or initialize an empty array
    let cart = JSON.parse(sessionStorage.getItem('cart')) || [];

    // Check if the product already exists in the cart
    if (cart.some(item => item.id === id)) {
      alert("Product is already in the cart");
    } else {
      cart.push(product);
      sessionStorage.setItem('cart', JSON.stringify(cart)); // Store updated cart in sessionStorage
      alert("Added to Cart!");
    }
  }

  // Event listeners for adding products to cart
  document.getElementById('p1').addEventListener('click', () => addProductToCart(1, 'Imported hand-made shoes', 1500, "../img/nike.jpeg"));
  document.getElementById('p2').addEventListener('click', () => addProductToCart(2, 'Girls T-shirt', 1500, "../img/girl.jpg"));
  document.getElementById('p3').addEventListener('click', () => addProductToCart(3, 'Iphone 14 Pro Max', 200000, "../img/iphone.jpg"));
  document.getElementById('p4').addEventListener('click', () => addProductToCart(4, 'Rayban Glasses', 1950, "../img/glasses.jpg"));
</script>

</body>
</html>
