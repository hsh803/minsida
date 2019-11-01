<?php
/**
 * A processing page that does a redirect.
 */
if ($_POST["create"] ?? false) {
    // Do some processing of the form data
    // for example write to the database.../
}

// Redirect to a result page.

header("Location: session.php?page=post-result");

// Get incoming values from posted form
$message = $_POST["message"] ?? null;

// Set the status message
if ($_POST["submit"] ?? null) {
    $_SESSION["flashmessage"] = "You are " . $message . ":-)";
}

// Redirect to the resulting page
header("Location: session.php?page=post-result");
