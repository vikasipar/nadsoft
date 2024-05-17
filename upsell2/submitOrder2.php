<?php
session_start();
include '../dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $member_id = $_SESSION['member_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    $sql = "INSERT INTO member_orders (member_id, product_name, product_price) VALUES ('$member_id', '$product_name', '$product_price')";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['status' => 'success', 'redirect' => '../thankYouPage/thankyou.php']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to add order.']);
    }

    $conn->close();
}
?>
