<?php
$numFiles   = count(get_included_files());
$memoryUsed = memory_get_peak_usage(true);
$loadTime   = microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'];
?>

<footer class="site-footer">
   <hr>
   <p>Validatorer:
   <a href="http://validator.w3.org/check/referer">HTML5</a>
   <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
   <a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
 </p>
   <p>Specifikationer:
     <a href="https://html.spec.whatwg.org/multipage/">HTML</a>
     <a href="https://www.w3.org/TR/CSS/">CSS</a>
     <a href="https://www.w3.org/2009/cheatsheet/">Cheatsheet</a>
   </p>
   <p>Time to load page: <?= $loadTime ?>. Files included: <?= $numFiles ?>. Memory used: <?= $memoryUsed ?>.</p>
</footer>

</body>
</html>
