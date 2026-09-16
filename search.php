<?php

include "config.php";

$results = null;
$searched = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $searched = true;
    $name = trim($_POST["name"]);

    $sql = "SELECT * FROM plants WHERE name LIKE ?";

    $stmt = mysqli_prepare($conn, $sql);

    $searchTerm = "%" . $name . "%";

    mysqli_stmt_bind_param($stmt, "s", $searchTerm);
    mysqli_stmt_execute($stmt);

    $results = mysqli_stmt_get_result($stmt);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Plant</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>🔍 Search Plant</h1>

    <a href="index.php">Add Plant</a>
    <a href="view.php">View Plants</a>

    <hr>

    <form method="POST">

        <label>Enter Plant Name:</label>

        <input type="text"
               name="name"
               required>

        <button type="submit">Search</button>

    </form>

    <?php if ($searched) { ?>

        <h2>Search Result</h2>

        <?php if ($results && mysqli_num_rows($results) > 0) { ?>

            <table border="1">

                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>

                <?php while ($row = mysqli_fetch_assoc($results)) { ?>

                    <tr>
                        <td><?php echo htmlspecialchars($row["id"]); ?></td>
                        <td><?php echo htmlspecialchars($row["name"]); ?></td>
                        <td><?php echo htmlspecialchars($row["category"]); ?></td>
                        <td><?php echo htmlspecialchars($row["price"]); ?></td>
                        <td><?php echo htmlspecialchars($row["quantity"]); ?></td>
                    </tr>

                <?php } ?>

            </table>

        <?php } else { ?>

            <p>Plant Not Found!</p>

        <?php } ?>

    <?php } ?>

</div>

</body>
</html>

<?php
mysqli_close($conn);
?>