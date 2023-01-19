<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='random' LIMIT 4");

$stmt->execute();

$random = $stmt->get_result();
