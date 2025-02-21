<?php
session_start(); // Access session for cart
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $total = array_sum(array_map(function($item) {
        return $item['price'] * $item['quantity'];
    }, $_SESSION['cart'] ?? []));
    // Save the order (implementation skipped for simplicity)
    $_SESSION['cart'] = []; // Clear cart after order
    echo "<script>alert('Order placed! Total: $$total'); location.href='index.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 90%;
            margin: auto;
            overflow: hidden;
        }
        
        .button {
            display: inline-block;
            padding: 10px 15px;
            margin-top: 10px;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Cart</h1>
        <table>
            <thead>
                <tr><th>Food</th><th>Price</th><th>Quantity</th><th>Total</th></tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php foreach ($_SESSION['cart'] ?? [] as $item): ?>
                    <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td>$<?php echo number_format($item['price'], 2); ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td>$<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                        <?php $total += $item['price'] * $item['quantity']; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h3>Total: $<?php echo number_format($total, 2); ?></h3>
        <form method="POST">
            <button type="submit" class="button">Checkout</button>
            <a href="index.php" class="button" style="background: gray;">Continue Shopping</a>
        </form>
    </div>
</body>
</html>
