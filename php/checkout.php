<?php
if (isset($_GET['cart_data']) && isset($_GET['total_price'])) {
    $cart_items = json_decode($_GET['cart_data'], true);
    $total_price = $_GET['total_price'];

    // Proceed with the checkout logic (e.g., save to the database, process payment)
    // For now, just display the cart items and total price
    echo '<h3>Your Cart</h3>';
    foreach ($cart_items as $item) {
        echo '<p>' . $item['name'] . ' - ' . $item['price'] . '</p>';
    }
    echo '<p>Total: $' . $total_price . '</p>';
}
?>
