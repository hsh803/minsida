<?php
$title = "Session | htmlphp";
include("incl/header.php");
?>

<nav class="navbar">
    <a href="me.php">Hem</a>
    <a href="report.php">Redovisning</a>
    <a href="about.php">Om</a>
    <a href="multipage.php">Multisidan</a>
    <a class="selected" href="session.php">Session</a>
    <a href="jetty.php">Jetty</a>
    <a href="search.php">Sök</a>
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
        "title" => "Introduction",
        "file" => __DIR__ . "/$base/index.php",
    ],
    "destroy" => [
        "title" => "Destroy the session",
        "file" => __DIR__ . "/$base/destroy.php",
    ],
    "increment" => [
        "title" => "Increment value",
        "file" => __DIR__ . "/$base/increment.php",
    ],
    "post" => [
        "title" => "Registration",
        "file" => __DIR__ . "/$base/post.php",
    ],
    "post-process-redirect" => [
        "title" => null,
        "file" => __DIR__ . "/$base/post-process-redirect.php",
    ],
    "post-result" => [
        "title" => "Post result",
        "file" => __DIR__ . "/$base/post-result.php",
    ],
    "flash" => [
        "title" => "Flashmessage",
        "file" => __DIR__ . "/$base/flash.php",
    ],
];

// Get the current page from the $pages collection, if it matches
$page = $pages[$pageReference] ?? null;

// Base title for all pages and add title from selected multipage
$title = $page["title"] ?? "404";
$title .= " | Test session";

// Render the page
require __DIR__ . "/view/header_session.php";
require __DIR__ . "/view/multipage.php";
require __DIR__ . "/view/footer_session.php";
