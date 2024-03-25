<?php
try { 
$pdo = new PDO('mysql:host=localhost;dbname=bankingSYS; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = 'update accounts set Balance = :cbalance, AccountType = :caccType WHERE AccountId = :cid';
$result = $pdo->prepare($sql);
$result = $pdo->prepare($sql);
$result->bindValue(':cid', $_POST['ud_id']); 
$result->bindValue(':cbalance', $_POST['ud_balance']);
$result->bindValue(':caccType', $_POST['ud_accountType']); 
$result->execute();
     
//For most databases, PDOStatement::rowCount() does not return the number of rows affected by a SELECT statement.
     
$count = $result->rowCount();
if ($count > 0)
{
echo "You just updated customer no: " . $_POST['ud_id'] ."  click<a href='accountModifyMenu.php'> here</a> to go back ";
}
else
{
echo "nothing updated";
}
}
 
catch (PDOException $e) { 

$output = 'Unable to process query sorry : ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 

}
?>