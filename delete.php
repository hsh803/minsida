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

$code = $_GET["code"] ?? null;

$db = courseDatabase($dsn);

$sql = "SELECT * FROM course WHERE code = ?";
$stmt = $db->prepare($sql);
$stmt->execute([$code]);

$res = $stmt->fetch();
?>

<form method="post" action="delete-process.php">
    <fieldset>
        <legend>Delete course</legend>
        <p><label>code<br><input type="text" name="code" value="<?= $code ?>"></label></p>
        <p><input type="submit" name="delete" value="delete"></p>
    </fieldset>
</form>
