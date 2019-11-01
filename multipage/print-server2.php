<h1>Print the details about the content of $_SERVER</h1>

<p>The content of the PHP variabel <code>$_SERVER</code> is:<p>

<pre>
<?= htmlentities(print_r($_SERVER, true)); ?>
</pre>

<p>The pair of every key and length of its value of \$_SERVER:</p>

<?php
foreach ($_SERVER as $key => $value) {
      $array_list[$key] = strlen($value);
}
asort($array_list);
print_r($array_list);
?>

<p>The server is running: <?= htmlentities($_SERVER['SERVER_SIGNATURE']); ?></p>

<p>Your IP adress is: <?= htmlentities($_SERVER['REMOTE_ADDR']); ?></p>
