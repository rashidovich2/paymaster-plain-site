<?php
include('class/mysql_crud.php');
$db = new Database();
$db->connect();
$db->select('crudclass'); // Table name
$res = $db->getResult();
print_r($res);
?>