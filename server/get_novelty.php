<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='novelty' LIMIT 4");

$stmt->execute();

$novelty = $stmt->get_result();
