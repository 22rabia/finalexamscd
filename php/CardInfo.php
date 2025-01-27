<?php
// Interface for Payment Method
interface PaymentMethod {
    public function storeData($cardNumber): void;
}

// Concrete class for Credit Card Payment
class CreditCardPayment implements PaymentMethod {
    public function storeData($cardNumber): void {
        // Code to store credit card data in MySQL database
        echo "Storing credit card number $cardNumber in the database...\n";
    }
}

// Concrete class for Debit Card Payment
class DebitCardPayment implements PaymentMethod {
    public function storeData($cardNumber): void {
        // Code to store debit card data in MySQL database
        echo "Storing debit card number $cardNumber in the database...\n";
    }
}

// Payment Factory
class PaymentFactory {
    public static function createPaymentMethod($type): PaymentMethod {
        if ($type === 'creditCard') {
            return new CreditCardPayment();
        } elseif ($type === 'debitCard') {
            return new DebitCardPayment();
        } else {
            throw new InvalidArgumentException("Invalid payment method");
        }
    }
}

// Singleton class for Cart
class Cart {
    private static ?Cart $instance = null;
    private array $items = []; // Items in the cart, with quantity

    // Private constructor to prevent direct instantiation
    private function __construct() {}

    // Get the single instance of the Cart
    public static function getInstance(): Cart {
        if (self::$instance === null) {
            self::$instance = new Cart();
        }
        return self::$instance;
    }

    // Add an item to the cart or increase its quantity
    public function addItem($itemId, $quantity = 1): void {
        if (isset($this->items[$itemId])) {
            $this->items[$itemId] += $quantity; // Increase quantity if the item already exists
        } else {
            $this->items[$itemId] = $quantity; // Add the item if it doesn't exist
        }
    }

    // Get the cart items
    public function getItems(): array {
        return $this->items;
    }
}

// Usage
try {
    // Payment method handling
    $paymentMethodType = $_POST["paymentMethod"]; 
    $cardNumber = $_POST["cardNumber"]; 

    $payment = PaymentFactory::createPaymentMethod($paymentMethodType);
    $payment->storeData($cardNumber);

    // Cart handling
    $cart = Cart::getInstance();
    $itemId = $_POST["itemId"]; // Item ID from form data
    $quantity = $_POST["quantity"]; // Quantity from form data

    $cart->addItem($itemId, $quantity);

    // Display cart items
    echo "Cart items:\n";
    foreach ($cart->getItems() as $id => $qty) {
        echo "Item ID: $id, Quantity: $qty\n";
    }
} catch (InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage();
}

?>
