<?php
/**
 * Definitions of commonly used functions.
 */

/**
 * Destroy a session, the session must be started.
 *
 * @return void
 */
function sessionDestroy()
{
    // Unset all of the session variables.
    $_SESSION = [];

    // If it's desired to kill the session, also delete the session cookie.
    // Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    // Finally, destroy the session.
    session_destroy();
}

function connectToDatabase(string $dsn1):object
{
    try {
        $db = new PDO($dsn1);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Ok, du är nu uppkopplad till databasen!";
    } catch (PDOException $e) {
        echo "Failed to connect to the database using DSN:<br>$dsn1<br>";
        throw $e;
    }
    return $db;
}


function printJettyResultsetToHTMLTable($res)
{
    $rows = null;
    foreach ($res as $row) {
        $position = htmlentities($row['position']);
        $rows .= "<tr>";
        $rows .= "<td><a href='?page=undersidanb&position=$position'>$position</a></td>";
        $rows .= "<td>" . htmlentities($row['boatType']) . "</td>";
        $rows .= "<td>" . htmlentities($row['boatEngine']) . "</td>";
        $rows .= "<td>" . htmlentities($row['boatLength']) . "</td>";
        $rows .= "<td>" . htmlentities($row['boatWidth']) . "</td>";
        $rows .= "<td>" . htmlentities($row['ownerName']) . "</td>";
        $rows .= "</tr>\n";
    }

// Print out the result as a HTML table using PHP heredoc
    echo <<<EOD
<table>
<tr>
    <th>position</th>
    <th>boatType</th>
    <th>boatEngine</th>
    <th>boatLength</th>
    <th>boatWidth</th>
    <th>ownerName</th>
</tr>
$rows
</table>
EOD;
}

function courseDatabase(string $dsn):object
{
    try {
        $db = new PDO($dsn);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Failed to connect to the database using DSN:<br>$dsn<br>";
        throw $e;
    }
    return $db;
}
