<?php
$title = "Admin | htmlphp";
include("incl/header.php"); ?>

<nav class="navbar">
    <a href="me.php">Hem</a>
    <a href="report.php">Redovisning</a>
    <a href="about.php">Om</a>
    <a href="multipage.php">Multisidan</a>
    <a href="session.php">Session</a>
    <a href="jetty.php">Jetty</a>
    <a href="search.php">Sök</a>
    <a class="selected" href="admin.php">Admin</a>
</nav>

<?php
require __DIR__ . "/config.php";
require __DIR__ . "/src/functions.php";
require __DIR__ . "/view/header_admin.php";

$db = courseDatabase($dsn);

$sql = "SELECT * FROM course";
$stmt = $db->prepare($sql);
$stmt->execute();

$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

$res = $res ?? [];
$rows = null;
foreach ($res as $row) {
    $rows .= "<tr>";
    $rows .= "<td>{$row['code']}</td>";
    $rows .= "<td>{$row['name']}</td>";
    $rows .= "<td>{$row['point']}</td>";
    $rows .= "</tr>\n";
}

// Print out the result as a HTML table using PHP heredoc
echo <<<EOD
<table>
<tr>
    <th>code</th>
    <th>name</th>
    <th>point</th>
</tr>
$rows
</table>
EOD;
?>
