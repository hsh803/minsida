<?php
$title = "Om denna sida | htmlphp";
include("incl/header.php"); ?>
<nav class="navbar">
    <a href="me.php">Hem</a>
    <a href="report.php">Redovisning</a>
    <a class="selected" href="about.php">Om</a>
    <a href="multipage.php">Multisidan</a>
    <a href="session.php">Session</a>
    <a href="jetty.php">Jetty</a>
    <a href="search.php">Sök</a>
    <a href="admin.php">Admin</a>

</nav>
<main>
  <article class="">
    <header>
        <h1>Om denna webbplats</h1>
    </header>
  <p>Man hittar en liten presentation om Hanna och hennes redovisningarna till varje kursmoment i Web Technology.</p>

  </article>

</main>

<?php include("incl/byline.php"); ?>
<?php include("incl/footer.php"); ?>
