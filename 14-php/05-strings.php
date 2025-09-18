<?php

$tittle = '04-variables';
$description = 'How to assign values';

include 'template/header.php';

echo "<section>";

$string1 = "Lorem impsum dolor";
$string2 = "sit amet consecutare";

echo "<p>$string1 $string2 </p>";
echo "characters length is: " . strlen($string1.$string2);



include 'template/footer.php';