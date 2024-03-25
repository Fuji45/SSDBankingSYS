<?php
include 'header.html';
try { 
$pdo = new PDO('mysql:host=localhost;dbname=BankingSYS; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql="SELECT count(*) FROM accounts WHERE AccountId=:cid";

$result = $pdo->prepare($sql);
$result->bindValue(':cid', $_GET['AccountId']); 
$result->execute();
if($result->fetchColumn() > 0) 
{
    $sql = 'SELECT * FROM accounts where AccountId = :cid';
    $result = $pdo->prepare($sql);
    $result->bindValue(':cid', $_GET['AccountId']); 
    $result->execute();

    $row = $result->fetch() ;
     $AccountId = $row['AccountId'];
	   $Balance= $row['Balance'];
	   $AccountType=$row['AccountType'];
     
	  
  
	  
   
}

else {
      print "No rows matched the query. try again click<a href='selectupdate.php'> here</a> to go back";
    }} 
catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}


include 'updatedetails.html';
?>


