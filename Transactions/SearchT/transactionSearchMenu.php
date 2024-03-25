<?php

include './../transactionOptionMenu.html';

try {

    $pdo = new PDO('mysql:host=localhost;dbname=bankingSYS; charset=utf8', 'root', '');
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = 'SELECT count(transactionId) FROM transactions where transactionId = :ctransactionId';
    
    $result = $pdo->prepare($sql);
    
    $result->bindValue(':ctransactionId', $_POST['transactionId']);
    
    $result->execute();
    
    if($result->fetchColumn() > 0)
    
    {
    
    $sql = 'SELECT * FROM transactions where transactionId = :ctransactionId';
    
    $result = $pdo->prepare($sql);
    
    $result->bindValue(':ctransactionId', $_POST['transactionId']);
    
    $result->execute();
    
    while ($row = $result->fetch()) {
    
        echo $row['TransactionId'].$row['Amount'].$row['DateOn'].$row['AccountId']. '<br>';
    
    }
    
    }
    
    else {
    
    print "No rows matched the query.";
    
    }}
    
    catch (PDOException $e) {
    
    $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
    
    }

    include 'transactionSearchForm.html'

?>