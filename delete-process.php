<?php
// Include common settings
require __DIR__ . "/config.php";
require __DIR__ . "/src/functions.php";

// Check if form posted and get incoming
if (isset($_POST['delete'])) {
    // Store posted form in parameter array
    $code   = $_POST['code'];

    $db = courseDatabase($dsn);

    // Prepare SQL statement to INSERT new rows into table
    $sql = "DELETE FROM course WHERE code = ?";
    $stmt = $db->prepare($sql);
    $params = [$code];
    $stmt->execute($params);

    header("Location: admin.php");
}
