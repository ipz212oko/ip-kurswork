<?php
include('../server/connection.php');
include('../server/connection.php');

if (isset($_POST['create_product'])) {

    $product_name = $_POST['name'];
    $product_description = $_POST['description'];
    $product_category = $_POST['category'];
    $video = $_POST['video'];

    $image1 = $_FILES['image1']['tmp_name'];

    $image_name1 = $product_name . "1.jpg";

    move_uploaded_file($image1, "../assets/imgs/" . $image_name1);

    $stmt = $conn->prepare("INSERT INTO products (product_name,product_description, product_image,product_category,video) VALUES (?,?,?,?,?)");
    $stmt->bind_param(
        'sssss',
        $product_name,
        $product_description,
        $image_name1,
        $product_category,
        $video
    );
    if ($stmt->execute()) {
        header('location: products.php?product_created=Product has been created successfully');
    } else {
        header('location: products.php?product_failed=Error occured, try again');
    }
}
