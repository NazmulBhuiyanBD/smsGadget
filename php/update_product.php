<?php
require "conn.php";
$id = $_GET['id'];
$resultProduct = $conn->query("SELECT * FROM products WHERE id = $id");
$product = $resultProduct->fetch_assoc();
echo json_encode($product);

?>