//database connection here
<?php
$server = 'cs.neiu.edu';
$username = 'cs319_1_spr2018_group1';
$password = 'cs319JS#@se';
$databaseName = 'cs319_1_spr2018_group1_db';

$dbc = new mysqli($server,$username, $password, $databaseName);

mysqli_set_charset($dbc, 'utf8');

