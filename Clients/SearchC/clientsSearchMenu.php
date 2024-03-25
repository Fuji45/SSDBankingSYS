<?php

include './../clientOptionMenu.html';

try {

    $pdo = new PDO('mysql:host=localhost;dbname=bankingSYS; charset=utf8', 'root', '');
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = 'SELECT count(CustomerId) FROM customers where CustomerId = :cclientId';
    
    $result = $pdo->prepare($sql);
    
    $result->bindValue(':cclientId', $_POST['clientId']);
    
    $result->execute();
    
    if($result->fetchColumn() > 0)
    
    {
    
    $sql = 'SELECT * FROM customers where CustomerId = :cclientId';
    
    $result = $pdo->prepare($sql);
    
    $result->bindValue(':cclientId', $_POST['clientId']);
    
    $result->execute();
    
    while ($row = $result->fetch()) {
    
    echo $row['CustomerId'].$row['Forname'].$row['Surname'].$row['PhoneNumber'].$row['Email']. '<br>';
    
    }
    
    }
    
    else {
    
    print "No rows matched the query.";
    
    }}
    
    catch (PDOException $e) {
    
    $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
    
    }

    include 'clientSearchForm.html';

?>