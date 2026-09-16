<?php

include "config.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = (int) $_POST["id"];

    if ($id <= 0) {

        $message = "Invalid Plant ID.";

    } else {

        $sql = "DELETE FROM plants WHERE id = ?";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "i", $id);

        if (mysqli_stmt_execute($stmt)) {

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                $message = "Plant Deleted Successfully!";
            } else {
                $message = "Plant ID not found.";
            }

        } else {

            $message = "Unable to delete plant.";

        }

        mysqli_stmt_close($stmt);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Plant</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>🗑️ Delete Plant</h1>

    <a href="index.php">Add Plant</a>
    <a href="view.php">View Plants</a>

    <hr>

    <?php if ($message != "") { ?>
        <h3><?php echo htmlspecialchars($message); ?></h3>
    <?php } ?>

    <form method="POST">

        <label>Enter Plant ID:</label>

        <input type="number"
               name="id"
               min="1"
               required>

        <button type="submit">Delete Plant</button>

    </form>

</div>

</body>
</html>

<?php
mysqli_close($conn);
?>