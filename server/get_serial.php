<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='serial' LIMIT 20");

$stmt->execute();

$serial = $stmt->get_result();
