<?php

$tittle = '02-PHP info';
$description = 'Show all information of php';

include 'template/header.php';

echo "section style='width: 100%;'";
phpinfo();

include 'template/footer.php';