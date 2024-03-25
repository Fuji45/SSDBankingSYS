<?php

include './../accountOptionMenu.html';


if (isset($_POST['submitdetails'])) {

try {

$cclientId = $_POST['clientId'];

$cbalance = $_POST['balance'];

$caccountType = $_POST['accountType'];



if ($cclientId == '' or $cbalance == '' or $caccountType == '')

{

echo('You did not complete the insert form correctly <br> ');

}


else{

$pdo = new PDO('mysql:host=localhost;dbname=bankingSYS; charset=utf8', 'root', '');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "INSERT INTO accounts (Balance,AccountType,DateOpened,CustomerId) VALUES(:Balance, :AccountType, CURDATE(), :CustomerId)";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':Balance', $cbalance);

$stmt->bindValue(':AccountType', $caccountType);

$stmt->bindValue(':CustomerId', $cclientId);

$stmt->execute();

echo 'Added try doing another';

}

}

catch (PDOException $e) {

$title = 'An error has occurred';

$output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
echo $output;

}

}

include 'accountCreationForm.html'

?>