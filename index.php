<!DOCTYPE html>
<html>
<head>
    <title>Plant Nursery Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>🌱 Plant Nursery Management System</h1>

    <p>Welcome to Plant Nursery</p>

    <a href="index.php">Add Plant</a>
    <a href="view.php">View Plants</a>
    <a href="search.php">Search Plant</a>
    <a href="update.php">Update Plant</a>
    <a href="delete.php">Delete Plant</a>

    <hr>

    <h2>Add New Plant</h2>

    <form action="save.php" method="POST">

        <label>Plant Name:</label>
        <input type="text" name="name" required>

        <label>Category:</label>
        <input type="text" name="category" required>

        <label>Price:</label>
        <input type="number" name="price" min="0" step="0.01" required>

        <label>Quantity:</label>
        <input type="number" name="quantity" min="0" required>

        <button type="submit">Add Plant</button>

    </form>

</div>

</body>
</html>