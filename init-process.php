<?php
// Include common settings
require __DIR__ . "/config.php";
require __DIR__ . "/src/functions.php";


$db = courseDatabase($dsn);

// Prepare SQL statement to INSERT new rows into table
$sql1 = "DROP TABLE IF EXISTS course";

$sql2 = "CREATE TABLE course
        (
          'code' TEXT,
          'name' TEXT,
          'point' REAL,
          PRIMARY KEY ('code')
          )";

$sql3 = "INSERT INTO course (code, name, point) VALUES
         ('HT1901', 'javascript', 7.5),
         ('HT1902', 'python', 7.5),
         ('HT1903', 'sql', 7.5)";

$stmt = $db->prepare($sql1);
$stmt->execute();

$stmt = $db->prepare($sql2);
$stmt->execute();

$stmt = $db->prepare($sql3);
$stmt->execute();
/*
// Execute the SQL to INSERT within a try-catch to catch any errors.
try {
    $stmt->execute($params);
} catch (PDOException $e) {
    echo "<p>Failed to insert a new row, dumping details for debug.</p>";
    echo "<p>Incoming \$_POST:<pre>" . print_r($_POST, true) . "</pre>";
    echo "<p>The error code: " . $stmt->errorCode();
    echo "<p>The error message:<pre>" . print_r($stmt->errorInfo(), true) . "</pre>";
    throw $e;
}

// Print out the successful results
echo "<p>Inserted the row:<br></p><pre>" . print_r($params, true) . "</pre>";
echo "<p><a href='insert.php'>Insert another row</a>.</p>";
exit();
*/
header("Location: admin.php");
