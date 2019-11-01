<?php
/**
 * A post form submitting to a processing page that does a redirect.
 */
?><!doctype html>
<meta charset="utf-8">
<title>Registration</title>
<form method="post" action="?page=post-process-redirect">
    <fieldset>
        <label>Registration</label>
        <p>
            <label for="username">Username</label>
            <input id="username" type="text" name="username" value="<?= htmlentities($_POST["username"] ?? null) ?>">
        </p>
        <p>
            <label for="email">E-mail adress</label>
            <input id="email" type="text" name="email" value="<?= htmlentities($_POST["email"] ?? null) ?>">
        </p>
        <p>
            <input type="submit" name="create" value="Create">
            <input type="reset" value="Reset">
        </p>
    </fieldset>
</form>
