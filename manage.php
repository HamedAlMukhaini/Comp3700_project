<?php
include 'db_config.php';

if (isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $cat = $_POST['category'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("INSERT INTO products (product_name, category, price) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $name, $cat, $price);
    $stmt->execute();
}

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

$all_products = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Manage Products</title></head>
<body>
    <h2>Add New Product</h2>
    <form method="post" action="manage.php">
        Name: <input type="text" name="name" required /><br/>
        Category: <input type="text" name="category" required /><br/>
        Price: <input type="number" step="0.01" name="price" required /><br/>
        <input type="submit" name="add_product" value="Insert Record" />
    </form>

    <hr/>

    <h2>Current Inventory</h2>
    <table border="1">
        <tr><th>ID</th><th>Name</th><th>Action</th></tr>
        <?php while($row = $all_products->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['product_name']; ?></td>
            <td><a href="manage.php?delete_id=<?php echo $row['id']; ?>">Delete</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
