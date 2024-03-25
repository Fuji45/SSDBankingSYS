<?php

include './../transactionOptionMenu.html';


if (isset($_POST['submitdetails'])) {

try {

$caccountId = $_POST['accountId'];

$camount = $_POST['amount'];



if ($caccountId == '' or $camount == '')

{

echo('You did not complete the insert form correctly <br> ');

}


else{

$pdo = new PDO('mysql:host=localhost;dbname=bankingSYS; charset=utf8', 'root', '');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "INSERT INTO transactions (Amount,DateOn,AccountId) VALUES(:amount, CURDATE(), :AccountId)";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':amount', $camount);

$stmt->bindValue(':AccountId', $caccountId);

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

include 'transactionCreationForm.html';

?>