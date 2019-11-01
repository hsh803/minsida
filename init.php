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

?>

<form method="post" action="init-process.php">
    <fieldset>
        <legend>Initiate database</legend>
        <p><input type="submit" name="initiate" value="Initiate"></p>
    </fieldset>
</form>
