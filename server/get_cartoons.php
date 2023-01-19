<?php
include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='cartoons' LIMIT 20");

$stmt->execute();

$cartoons = $stmt->get_result();
