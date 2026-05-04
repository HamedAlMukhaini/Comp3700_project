<?php

include 'db_config.php'; 
$search_term = "";
$results = [];

if (isset($_POST['search'])) {
    $search_term = $_POST['term'];
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_name LIKE ?");
    $like_term = "%" . $search_term . "%";
    $stmt->bind_param("s", $like_term);
    $stmt->execute();
    $results = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Search Products</title></head>
<body>
    <h2>Search Product Database</h2>
    <form method="post" action="search.php">
        <input type="text" name="term" value="<?php echo htmlspecialchars($search_term); ?>" />
        <input type="submit" name="search" value="Search" />
    </form>

    <?php if (!empty($results)): ?>
        <table border="1">
            <tr><th>ID</th><th>Name</th><th>Category</th><th>Price</th></tr>
            <?php while($row = $results->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['product_name']; ?></td>
                <td><?php echo $row['category']; ?></td>
                <td>$<?php echo $row['price']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    <?php endif; ?>
</body>
</html>
