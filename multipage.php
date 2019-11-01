
<?php
$title = "Multisidan | htmlphp";
include("incl/header.php");
?>

<nav class="navbar">
    <a href="me.php">Hem</a>
    <a href="report.php">Redovisning</a>
    <a href="about.php">Om</a>
    <a class="selected" href="multipage.php">Multisidan</a>
    <a href="session.php">Session</a>
    <a href="jetty.php">Jetty</a>
    <a href="search.php">Sök</a>
    <a href="admin.php">Admin</a>
</nav>

<?php
/**
 * This is a page controller for a multipage. You should name this file
 * as the name of the pagecontroller for this multipage. You should then
 * add a directory with the same name, excluding the file suffix of ".php".
 * You then then have several multipages within the same directory, like this.
 *
 * multipage.php
 * multipage/
 *
 * some-test-page.php
 * some-test-page/
 */
 // Include the configuration file
require __DIR__ . "/config.php";

 // Include essential functions
require __DIR__ . "/src/functions.php";

// Get what subpage to show, defaults to index
$pageReference = $_GET["page"] ?? "index";

// Get the filename of this multipage, exkluding the file suffix of .php
$base = basename(__FILE__, ".php");

// Create the collection of valid sub pages.
$pages = [
    "index" => [
        "title" => "Intro to this multipage.",
        "file" => __DIR__ . "/$base/index.php",
    ],
    "print-get" => [
        "title" => "Print the content of \$_GET variable.",
        "file" => __DIR__ . "/$base/print-get.php",
    ],
    "get-samples" => [
        "title" => "Try various links using GET queryparams.",
        "file" => __DIR__ . "/$base/get-samples.php",
    ],
    "print-server" => [
        "title" => "Print the content of \$_SERVER variable.",
        "file" => __DIR__ . "/$base/print-server.php",
    ],
    "print-server1" => [
        "title" => "Print the number of items of \$_SERVER",
        "file" => __DIR__ . "/$base/print-server1.php",
    ],
    "print-server2" => [
        "title" => "Print the details about the content of \$_SERVER",
        "file" => __DIR__ . "/$base/print-server2.php",
    ],
];

// Get the current page from the $pages collection, if it matches
$page = $pages[$pageReference] ?? null;

// Base title for all pages and add title from selected multipage
$title = $page["title"] ?? "404";
$title .= " | Test multipage";

// Render the page
require __DIR__ . "/view/header_multi.php";
require __DIR__ . "/view/multipage.php";
require __DIR__ . "/view/footer_multi.php";
