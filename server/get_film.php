<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='film' LIMIT 20");

$stmt->execute();

$film = $stmt->get_result();
