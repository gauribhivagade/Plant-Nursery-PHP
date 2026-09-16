<?php

include "config.php";

$sql = "SELECT * FROM plants";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>View Plants</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>🌿 Plant List</h1>

    <a href="index.php">Add Plant</a>
    <a href="search.php">Search Plant</a>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>

        <tr>
            <td><?php echo htmlspecialchars($row["id"]); ?></td>
            <td><?php echo htmlspecialchars($row["name"]); ?></td>
            <td><?php echo htmlspecialchars($row["category"]); ?></td>
            <td><?php echo htmlspecialchars($row["price"]); ?></td>
            <td><?php echo htmlspecialchars($row["quantity"]); ?></td>
        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>

<?php
mysqli_close($conn);
?>