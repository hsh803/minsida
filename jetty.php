<?php
$title = "Jetty | htmlphp";
include("incl/header.php");
?>

<nav class="navbar">
    <a href="me.php">Hem</a>
    <a href="report.php">Redovisning</a>
    <a href="about.php">Om</a>
    <a href="multipage.php">Multisidan</a>
    <a href="session.php">Session</a>
    <a class="selected" href="jetty.php">Jetty</a>
    <a href="search.php">Sök</a>
    <a href="admin.php">Admin</a>
</nav>

<?php
require __DIR__ . "/config.php";

require __DIR__ . "/src/functions.php";


$pageReference = $_GET["page"] ?? "index";

// Get the filename of this multipage, exkluding the file suffix of .php
$base = basename(__FILE__, ".php");

// Create the collection of valid sub pages.
$pages = [
    "index" => [
      "title" => "Database connect",
      "file" => __DIR__ . "/$base/index.php",
    ],
    "undersidana" => [
        "title" => "Undersida A",
        "file" => __DIR__ . "/$base/undersidana.php",
    ],
    "undersidanb" => [
        "title" => null,
        "file" => __DIR__ . "/$base/undersidanb.php",
    ],
];

// Get the current page from the $pages collection, if it matches
$page = $pages[$pageReference] ?? null;

$title = $page["title"] ?? "404";
$title .= " | Test multipage";

require __DIR__ . "/view/header_session.php";
require __DIR__ . "/view/jetty.php";
