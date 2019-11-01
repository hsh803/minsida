<?php
/**
 * A post form submitting to a processing page that does a redirect.
 */
?><!doctype html>
<meta charset="utf-8">
<title>Message</title>
<form method="post" action="?page=post-process-redirect">
    <fieldset>
        <label>Message Form</label>
        <p>Please write a great word you can find right now.</p>
        <p>
            <label for="message">Message</label>
            <input id="message" type="text" name="message" value="<?= htmlentities($_POST["message"] ?? null) ?>">
        </p>
        <p>
            <input type="submit" name="submit" value="Submit">
            <input type="reset" value="Reset">
        </p>
    </fieldset>
</form>
