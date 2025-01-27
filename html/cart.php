<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>
  <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS (for modal functionality) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

  <header class="bg-light border-bottom py-3">
    <div class="container d-flex justify-content-between align-items-center">
      <h4><a href="homepage.php" class="text-dark text-decoration-none">CartNinja</a></h4>
      <nav>
        <ul class="navbar-nav flex-row">
          <li class="nav-item mx-2"><a href="homepage.php" class="nav-link text-dark">Home</a></li>
          <li class="nav-item mx-2"><a href="cart.php" class="nav-link text-dark">Cart</a></li>
          <li class="nav-item mx-2"><a href="about.php" class="nav-link text-dark">About</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <div class="container">
      <div class="row my-5">
        <div class="col-md-8 gx-5" id="cart-items">
          <!-- Cart items will be dynamically added here -->
        </div>

        <div class="col-md-4 gx-5">
          <div class="row">
            <div class="col-md-12 my-3" style="text-align:start">
              <h5>Order Summary</h5>
            </div>
            <div class="col-md-12 card shadow-sm">
              <div class="row btm-line">
                <div class="col-md-6">
                  <p style="font-weight: bold">Item subtotal</p>
                </div>
                <div class="col-md-6">
                  <p style="text-align: end" id="subtotal">Rs 0</p>
                </div>
              </div>
              <div class="row btm-line my-3">
                <div class="col-md-6">
                  <p style="font-weight: bold">Tax (10%)</p>
                </div>
                <div class="col-md-6">
                  <p style="text-align: end" id="tax">Rs 0</p>
                </div>
              </div>
              <div class="row btm-line my-3">
                <div class="col-md-6">
                  <p style="font-weight: bold">Total</p>
                </div>
                <div class="col-md-6">
                  <p style="text-align: end" id="total">Rs 0</p>
                </div>
              </div>
              <div class="col-md-12">
               <!-- Continue Button -->
        <button type="button" class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#creditCardModal">
                    Continue
        </button>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal for Credit Card Details -->
  <div class="modal" tabindex="-1" id="creditCardModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Enter Credit Card Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="creditCardForm">
            <div class="mb-3">
              <label for="cardNumber" class="form-label">Card Number</label>
              <input type="text" class="form-control" id="cardNumber" placeholder="Enter card number" required>
            </div>
            <div class="mb-3">
              <label for="expiryDate" class="form-label">Expiry Date</label>
              <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY" required>
            </div>
            <div class="mb-3">
              <label for="cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cvv" placeholder="Enter CVV" required>
            </div>
            <button type="submit" class="btn btn-primary">Proceed</button>
          </form>
        </div>
      </div>
    </div>
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
    let cart = JSON.parse(sessionStorage.getItem('cart')) || [];

    function renderCartItems() {
      const cartItemsContainer = document.getElementById('cart-items');
      cartItemsContainer.innerHTML = '';  // Clear existing items

      if (cart.length > 0) {
        cart.forEach(item => {
          const cartItemHTML = `
            <div class="col-md-12">
              <div class="row product-item shadow-sm" data-product-id="${item.id}">
                <div class="col-md-3">
                  <div class="img my-3">
                    <img src="${item.img}" alt="${item.name}" height="200px" width="150px" />
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="row my-3">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-6">
                          <h2 style="color: silver; font-weight: bold">${item.name}</h2>
                        </div>
                        <div class="col-md-6">
                          <p style="text-align: end; font-weight: bold">Rs ${item.price}</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row my-2">
                        <div class="col-md-3">
                          <p style="font-weight: bold">Color:</p>
                        </div>
                        <div class="col-md-9" style="text-align: start; margin: 0; padding: 0">
                          <p>Blue</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-7" style="text-align: end; margin: 0; padding: 0">
                          <p style="font-weight: bold">Quantity</p>
                        </div>
                        <div class="col-md-5">
                          <input type="number" class="quantity" min="1" max="100" value="${item.quantity}" data-product-id="${item.id}" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <p style="color: silver">Delivery within 3-5 working days</p>
                    </div>
                    <div class="full-width-line col-md-12 my-3">
                      <div class="row my-3">
                        <div class="col-md-6">
                          <button class="btn btn-primary add-to-wishlist" data-product-id="${item.id}">Move to Wish List</button>
                        </div>
                        <div class="col-md-6">
                          <button class="btn btn-danger remove-item" data-product-id="${item.id}">Remove</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          `;
          cartItemsContainer.insertAdjacentHTML('beforeend', cartItemHTML);
        });

        // Add event listeners to remove and wishlist buttons
        const removeButtons = document.querySelectorAll('.remove-item');
        removeButtons.forEach(button => {
          button.addEventListener('click', removeItemFromCart);
        });

        const wishlistButtons = document.querySelectorAll('.add-to-wishlist');
        wishlistButtons.forEach(button => {
          button.addEventListener('click', addToWishlist);
        });

        const quantityInputs = document.querySelectorAll('.quantity');
        quantityInputs.forEach(input => {
          input.addEventListener('change', updateCartItemQuantity);
        });
      } else {
        cartItemsContainer.innerHTML = `<p>Your cart is empty.</p>`;
      }
    }

    function removeItemFromCart(event) {
      const productId = event.target.getAttribute('data-product-id');
      cart = cart.filter(item => item.id != productId); // Remove item from cart array
      sessionStorage.setItem('cart', JSON.stringify(cart)); // Update sessionStorage
      renderCartItems(); // Re-render the cart
      updateOrderSummary(); // Update order summary
    }

    function addToWishlist(event) {
      const productId = event.target.getAttribute('data-product-id');
      const item = cart.find(item => item.id == productId);
      
      // Update the order summary with the selected quantity and price
      updateOrderSummary();
      alert(`${item.name} has been added to the order summary!`);
    }

    function updateCartItemQuantity(event) {
      const productId = event.target.getAttribute('data-product-id');
      const newQuantity = parseInt(event.target.value, 10);

      if (newQuantity >= 1) {
        // Update the cart with new quantity
        const item = cart.find(item => item.id == productId);
        item.quantity = newQuantity;
        sessionStorage.setItem('cart', JSON.stringify(cart)); // Update sessionStorage
        updateOrderSummary(); // Update order summary
      }
    }

    function updateOrderSummary() {
      let subtotal = 0;
      cart.forEach((item) => {
        let itemSubtotal = item.price * item.quantity;
        subtotal += itemSubtotal; // Add item subtotal to the total
      });

      // Apply 10% tax
      const tax = subtotal * 0.1;
      const total = subtotal + tax;

      // Update the order summary
      document.getElementById('subtotal').innerText = `Rs ${subtotal.toFixed(2)}`;
      document.getElementById('tax').innerText = `Rs ${tax.toFixed(2)}`;
      document.getElementById('total').innerText = `Rs ${total.toFixed(2)}`;
    }

    renderCartItems();
    updateOrderSummary();



    document.addEventListener('DOMContentLoaded', function() {
  // Get modal elements
  const creditCardModal = new bootstrap.Modal(document.getElementById('creditCardModal'));
  const creditCardForm = document.getElementById('creditCardForm');

  // Handle form submission
  creditCardForm.addEventListener('submit', function(e) {
    e.preventDefault();

    // Get form values
    const cardNumber = document.getElementById('cardNumber').value;
    const expiryDate = document.getElementById('expiryDate').value;
    const cvv = document.getElementById('cvv').value;

    // Validate Credit Card
    if (!validateCardNumber(cardNumber)) {
      alert('Invalid card number');
      return;
    }

    if (!validateExpiryDate(expiryDate)) {
      alert('Invalid expiry date');
      return;
    }

    if (!validateCVV(cvv)) {
      alert('Invalid CVV');
      return;
    }

    // Simulate loading screen for a moment
    creditCardModal.hide();
    document.body.innerHTML += `<div class="loading-screen">Processing...</div>`;

    // Simulate order success after a delay
    setTimeout(function() {
      document.querySelector('.loading-screen').remove(); // Remove loading screen
      alert('Order Successful!');
      // Optionally, redirect to a success page or clear the cart
    }, 2000); // Simulate 2 seconds delay
  });

  // Card number validation (basic)
  function validateCardNumber(cardNumber) {
    const regex = /^[0-9]{16}$/; // Simple validation for 16-digit card number
    return regex.test(cardNumber);
  }

  // Expiry date validation (MM/YY format)
  function validateExpiryDate(expiryDate) {
    const regex = /^(0[1-9]|1[0-2])\/([0-9]{2})$/; // MM/YY format
    return regex.test(expiryDate);
  }

  // CVV validation
  function validateCVV(cvv) {
    const regex = /^[0-9]{3}$/; // CVV should be 3 digits
    return regex.test(cvv);
  }
});

  </script>

    <!-- Modal for Credit Card Details -->
<div class="modal" tabindex="-1" id="creditCardModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Enter Credit Card Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="creditCardForm">
          <div class="mb-3">
            <label for="cardNumber" class="form-label">Card Number</label>
            <input type="text" class="form-control" id="cardNumber" placeholder="Enter card number" required>
          </div>
          <div class="mb-3">
            <label for="expiryDate" class="form-label">Expiry Date</label>
            <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY" required>
          </div>
          <div class="mb-3">
            <label for="cvv" class="form-label">CVV</label>
            <input type="text" class="form-control" id="cvv" placeholder="Enter CVV" required>
          </div>
          <button type="submit" class="btn btn-primary">Proceed</button>
        </form>
      </div>
    </div>
  </div>
</div>


</body>
</html>
