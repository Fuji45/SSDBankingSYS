<?php

include './../accountOptionMenu.html';


try {

    $pdo = new PDO('mysql:host=localhost;dbname=bankingSYS; charset=utf8', 'root', '');
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = 'SELECT count(accountId) FROM accounts where AccountId = :caccountId';
    
    $result = $pdo->prepare($sql);
    
    $result->bindValue(':caccountId', $_POST['accountId']);
    
    $result->execute();
    
    if($result->fetchColumn() > 0)
    
    {
    
    $sql = 'SELECT * FROM accounts where AccountId = :caccountId';
    
    $result = $pdo->prepare($sql);
    
    $result->bindValue(':caccountId', $_POST['accountId']);
    
    $result->execute();
    
    while ($row = $result->fetch()) {
    
    echo $row['AccountId'].$row['Balance'].$row['AccountType'].$row['DateOpened'].$row['CustomerId']. '<br>';
    
    }
    
    }
    
    else {
    
    print "No rows matched the query.";
    
    }}
    
    catch (PDOException $e) {
    
    $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
    
    }


    include 'accountSearchForm.html'

?>