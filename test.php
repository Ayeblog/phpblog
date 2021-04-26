<?php

$dbh = new PDO("mysql:host=localhost;dbname=test",'root','112233.',array(PDO::ATTR_PERSISTENT=>true));

$stmt = $dbh->prepare("select username,password from users");
$stmt->execute();
echo("PDO::FETCH_ASSOC:");
echo("Return next row as an array indexed by column name\n");
echo "\n";
$result = $stmt->fetch(PDO::FETCH_ASSOC);
print_r($result);
echo("\n");

echo("PDO::FETCH_BOTH:\n");
echo("Return next row as an array indexed by column name and number\n");
echo "\n";
$result = $stmt->fetch(PDO::FETCH_BOTH);
print_r($result);
echo("\n");

echo("PDO::FETCH_LAZY:\n");
echo("Return next row as anonymous object with column names as properties\n");
echo "\n";
$result = $stmt->fetch(PDO::FETCH_LAZY);
print_r($result);
echo("\n");

echo("PDO::FETCH_OBJ:\n");
echo("Return next row as anonymous object with column names as properties\n");
echo "\n";
$result = $stmt->fetch(PDO::FETCH_OBJ);
print_r($result);
echo("\n");
