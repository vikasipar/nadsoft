<?php
session_start();
include '../dbconfig.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    $result = $conn->query("SELECT id FROM member WHERE email = '$email' LIMIT 1");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $member_id = $row['id'];
        $_SESSION['member_id'] = $member_id;

        $sql = "INSERT INTO member_orders (member_id, product_name, product_price) VALUES ('$member_id', '$product_name', '$product_price')";
        if ($conn->query($sql) === TRUE) {
            echo json_encode(['status' => 'success', 'redirect' => '../upsell2/upsell.php']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to add order.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Member not found.']);
    }
    $conn->close();
}
?>
