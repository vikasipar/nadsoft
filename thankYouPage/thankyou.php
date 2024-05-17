<?php
session_start();
include '../dbconfig.php';

if (isset($_SESSION['member_id'])) {
    $member_id = $_SESSION['member_id'];

    $result = $conn->query("SELECT * FROM member_orders WHERE member_id = '$member_id'");
    if ($result->num_rows > 0) {
        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No Products found.']);
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        section{
            height: 95lvh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: rgb(143, 65, 10);
        }
        h1{
            font-size: 50px;
        }
        th{
            width: 100px;
            padding: 2px 15px;
        }
        table, th {
            border:1px solid black;
            font-size: 19px;
        }
        a{
            text-decoration: none;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <section>
        <h1>Thank You <?php echo $_SESSION['firstName'] ?>!</h1>
        <br>
        <h2>Your Orders:</h2>
        <table>
        <?php
            foreach ($products as $product) {
                echo "<tr>";
                echo "<th>" . $product['product_name'] . "</th>";
                echo "<th>₹ " . $product['product_price'] . "</th>";
                echo "</tr>";
            }
        ?>
        </table>

        <a href="../index.html">Homepage</a>
    </section>
</body>
</html>