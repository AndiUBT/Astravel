<?php

if (isset($_POST['purchase'])) {
    $query = "SELECT count FROM products";
    $stmt = $this->connect()->query($query);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $currentCount = $row['count'];

    $newCount = $currentCount - 1;

    $updateQuery = "UPDATE products SET count = :newCount";
    $stmt = $this->connect()->prepare($updateQuery);
    $stmt->bindParam(':newCount', $newCount, PDO::PARAM_INT);
    $stmt->execute();

    echo '<script>alert("Ticket purchased successfully!");</script>';
}
?>