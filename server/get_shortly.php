<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='shortly' LIMIT 4");

$stmt->execute();


$shortly = $stmt->get_result();
