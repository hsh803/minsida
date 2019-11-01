<?php
// Include common settings
require __DIR__ . "/config.php";
require __DIR__ . "/src/functions.php";

// Check if form posted and get incoming
if (isset($_POST['save'])) {
    // Store posted form in parameter array
    $code   = $_POST['code'];
    $name   = $_POST['name'];
    $point  = $_POST['point'];

    $db = courseDatabase($dsn);

    // Prepare SQL statement to INSERT new rows into table
    $sql = "UPDATE course SET code = ?, name = ?, point = ? WHERE code = ?";
    $stmt = $db->prepare($sql);
    $params = [$code, $name, $point, $code];
    $stmt->execute($params);

    header("Location: admin.php");
}
