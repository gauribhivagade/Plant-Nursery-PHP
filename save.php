<?php

include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $category = trim($_POST["category"]);
    $price = (float) $_POST["price"];
    $quantity = (int) $_POST["quantity"];

    if ($name == "" || $category == "" || $price < 0 || $quantity < 0) {
        die("Invalid input.");
    }

    $sql = "INSERT INTO plants (name, category, price, quantity)
            VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "ssdi",
        $name,
        $category,
        $price,
        $quantity
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "<h2>Plant Added Successfully!</h2>";
        echo "<a href='index.php'>Add Another Plant</a><br>";
        echo "<a href='view.php'>View Plants</a>";
    } else {
        echo "Unable to add plant.";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);

?>