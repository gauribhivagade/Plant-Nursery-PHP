<?php

include "config.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = (int) $_POST["id"];
    $price = (float) $_POST["price"];
    $quantity = (int) $_POST["quantity"];

    if ($id <= 0 || $price < 0 || $quantity < 0) {
        $message = "Invalid input.";
    } else {

        $sql = "UPDATE plants
                SET price = ?, quantity = ?
                WHERE id = ?";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param(
            $stmt,
            "dii",
            $price,
            $quantity,
            $id
        );

        if (mysqli_stmt_execute($stmt)) {

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                $message = "Plant Updated Successfully!";
            } else {
                $message = "Plant ID not found or no changes made.";
            }

        } else {
            $message = "Unable to update plant.";
        }

        mysqli_stmt_close($stmt);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Plant</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>✏️ Update Plant</h1>

    <a href="index.php">Add Plant</a>
    <a href="view.php">View Plants</a>

    <hr>

    <?php if ($message != "") { ?>
        <h3><?php echo htmlspecialchars($message); ?></h3>
    <?php } ?>

    <form method="POST">

        <label>Plant ID:</label>
        <input type="number" name="id" min="1" required>

        <label>New Price:</label>
        <input type="number"
               name="price"
               min="0"
               step="0.01"
               required>

        <label>New Quantity:</label>
        <input type="number"
               name="quantity"
               min="0"
               required>

        <button type="submit">Update Plant</button>

    </form>

</div>

</body>
</html>

<?php
mysqli_close($conn);
?>