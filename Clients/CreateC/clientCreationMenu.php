<?php

include './../clientOptionMenu.html';


if (isset($_POST['submitdetails'])) {

try {

$cForname = $_POST['ClientFor'];

$cSurname = $_POST['ClientSur'];

$cPhoneNumber = $_POST['ClientPhoneNo'];

$cEmail = $_POST['ClientEmail'];

if ($cForname == '' or $cSurname == '' or $cPhoneNumber == '' or $cEmail == '')

{

echo('You did not complete the insert form correctly <br> ');

}


else{

$pdo = new PDO('mysql:host=localhost;dbname=bankingSYS; charset=utf8', 'root', '');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "INSERT INTO customers (Forname,Surname,PhoneNumber, Email) VALUES(:ClientFor, :ClientSur, :ClientPhoneNo, :ClientEmail)";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':ClientFor', $cForname);

$stmt->bindValue(':ClientSur', $cSurname);

$stmt->bindValue(':ClientPhoneNo', $cPhoneNumber);

$stmt->bindValue(':ClientEmail', $cEmail);

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

include 'clientCreationForm.html'

?>