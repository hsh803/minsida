<?php
$title = "Sök | htmlphp";
include("incl/header.php");
?>

<nav class="navbar">
    <a href="me.php">Hem</a>
    <a href="report.php">Redovisning</a>
    <a href="about.php">Om</a>
    <a href="multipage.php">Multisidan</a>
    <a href="session.php">Session</a>
    <a href="jetty.php">Jetty</a>
    <a class="selected" href="search.php">Sök</a>
    <a href="admin.php">Admin</a>
</nav>

<?php
require __DIR__ . "/config.php";
require __DIR__ . "/src/functions.php";

$search = isset($_GET['search'])
    ? $_GET['search']
    : null;
?>

<h1>Search course</h1>
<p>Skriv in en söksträng för att söka kurser. Använd % som ett wildcard-tecken.</p>
<p>Klicka <a href="?search=%">här</a> för att se alla kurser.</p>
<form>
    <input type="search" name="search" placeholder="Enter substring to search for, use % as wildcard." value="<?=$search?>">
    <input type="submit" value="Search">
</form>

<?php
$db = courseDatabase($dsn);
// Break script if empty $search
if (is_null($search)) {
    exit("<p>Du har inte valt något att söka på ännu.");
}

if ($search == "%") {
    $sql = "SELECT * FROM course";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// Prepare the SQL statement
$sql = "SELECT * FROM course WHERE name LIKE ? OR code LIKE ?";
$stmt = $db->prepare($sql);

$params = [$search, $search];
$stmt->execute($params);

// Get the results as an array with column names as array keys
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<p>The result contains " . count($res) . " rows.</p>";


//See results in the table.
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
