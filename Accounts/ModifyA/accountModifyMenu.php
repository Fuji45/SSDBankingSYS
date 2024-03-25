<?php
include './../accountOptionMenu.html';
   try { 
$pdo = new PDO('mysql:host=localhost;dbname=bankingSYS; charset=utf8', 'root', ''); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT * FROM accounts';
$result = $pdo->query($sql); 
?>

<br><b>A Quick View</b><br><br>
<table border=1>
<tr><th>AccountId</th>
<th>Amount</th><th>AccountType</th><th>ClientId</th><th>Delete</th><th>Update</th></tr>

<?php 
while ($row = $result->fetch())  {

	?>
<tr><td> <?php echo $row['AccountId'] ?> </td><td>  <?php echo $row['Balance'] ?> </td>
<td> <?php echo $row['AccountType'] ?> </td><td> <?php echo $row['DateOpened'] ?> </td>
<td> <?php echo $row['CustomerId'] ?> </td>
<td><a href="delete.php?AccountId= <?php echo $row['AccountId'] ?>">Remove</a></td>
     <td><a href="updateform.php?AccountId= <?php echo $row['AccountId'] ?>">Update</a></td>
     </tr>
<?php } ?>
</table>
<?php
   }

catch (PDOException $e) { 
$output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}




?>