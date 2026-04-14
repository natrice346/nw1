<?php
session_start();
require 'db_config.php';

header('Content-Type: application/json');

function json_response($success, $message, $extra = []) {
    echo json_encode(array_merge([
        'success' => $success,
        'message' => $message
    ], $extra));
    exit();
}

if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    json_response(false, 'Please log in first.');
}

$user_id = (int)$_SESSION['user_id'];
$action = isset($_POST['action']) ? $_POST['action'] : '';

if ($action !== 'add') {
    json_response(false, 'Invalid action.');
}

$product_id = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
$quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;

if ($product_id <= 0 || $quantity <= 0) {
    json_response(false, 'Invalid product or quantity.');
}

$product_stmt = $conn->prepare('SELECT id, stock_level FROM products WHERE id = ? LIMIT 1');
$product_stmt->bind_param('i', $product_id);
$product_stmt->execute();
$product_result = $product_stmt->get_result();

if (!$product_result || $product_result->num_rows === 0) {
    json_response(false, 'Product not found.');
}

$product = $product_result->fetch_assoc();
$available_stock = (int)$product['stock_level'];

$current_stmt = $conn->prepare('SELECT COALESCE(SUM(quantity), 0) AS current_qty FROM cart WHERE user_id = ? AND product_id = ?');
$current_stmt->bind_param('ii', $user_id, $product_id);
$current_stmt->execute();
$current_row = $current_stmt->get_result()->fetch_assoc();
$current_qty = (int)$current_row['current_qty'];
$new_total_qty = $current_qty + $quantity;

if ($new_total_qty > $available_stock) {
    json_response(false, 'Not enough stock available.');
}

$conn->begin_transaction();

try {
    $delete_stmt = $conn->prepare('DELETE FROM cart WHERE user_id = ? AND product_id = ?');
    $delete_stmt->bind_param('ii', $user_id, $product_id);
    $delete_stmt->execute();

    $insert_stmt = $conn->prepare('INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)');
    $insert_stmt->bind_param('iii', $user_id, $product_id, $new_total_qty);

    if (!$insert_stmt->execute()) {
        throw new Exception('Could not add item to cart.');
    }

    $count_stmt = $conn->prepare('SELECT COALESCE(SUM(quantity), 0) AS total FROM cart WHERE user_id = ?');
    $count_stmt->bind_param('i', $user_id);
    $count_stmt->execute();
    $count_row = $count_stmt->get_result()->fetch_assoc();

    $conn->commit();

    json_response(true, 'Product added to cart.', [
        'cart_count' => (int)$count_row['total']
    ]);
} catch (Exception $e) {
    $conn->rollback();
    json_response(false, $e->getMessage());
}
?>