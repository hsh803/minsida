<h1>Print the number of items of $_SERVER</h1>

<p>The content of the PHP variabel <code>$_SERVER</code> is:<p>

<pre>
<?= htmlentities(print_r($_SERVER, true)); ?>
</pre>

<?php
echo "There are " . count($_SERVER) . " entries in the array for \$_SERVER.\n";
echo "<br>";
$k = array_keys($_SERVER);
$v = array_values($_SERVER);
$z = count($_SERVER) -1;
echo "The first key/value: " . $k[0] . "\n=>\n" . $v[0];
echo "<br>";
echo "The last key/value: " . $k[$z] . "\n=>\n" . $v[$z];
?>

<p>The server is running: <?= htmlentities($_SERVER['SERVER_SIGNATURE']); ?></p>

<p>Your IP adress is: <?= htmlentities($_SERVER['REMOTE_ADDR']); ?></p>
