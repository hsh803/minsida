<?php

$db = connectToDatabase($dsn1);

// Check whats in the database
$sql = "SELECT * FROM jetty";
$stmt = $db->prepare($sql);
$stmt->execute();


// Get the results as an array with column names as array keys
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<p>The result contains " . count($res) . " rows.</p>";



printJettyResultsetToHTMLTable($res);
