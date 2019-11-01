<?php

// Check if script was accessed using specific position
// as in update?position=2
$position = isset($_GET['position'])
    ? $_GET['position']
    : null;


$db = connectToDatabase($dsn1);

$sql = "SELECT * FROM jetty WHERE position = ?";
$stmt = $db->prepare($sql);
$params = [$position];
$stmt->execute($params);

// Get the results as an array with column names as array keys
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<table>
<tr>
    <th>position</th>
    <th>boatType</th>
    <th>boatEngine</th>
    <th>boatLength</th>
    <th>boatWidth</th>
    <th>ownerName</th>
</tr>

<?php foreach ($res as $row) : ?>
    <tr>
        <td><?= $row['position'] ?></td>
        <td><?= $row['boatType'] ?></td>
        <td><?= $row['boatEngine'] ?></td>
        <td><?= $row['boatLength'] ?></td>
        <td><?= $row['boatWidth'] ?></td>
        <td><?= $row['ownerName'] ?></td>
    </tr>
<?php endforeach; ?>
</table>

<pre>
