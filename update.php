<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php include("head.php");?>
<?php include("content.php");?>
<div id="content">
<?php
if(isset($_GET['name']) && $_GET['name']!='' && isset($_GET['credit']) && $_GET['credit']!=''){
	$getCode = $_GET['code'];
	$pdo1 = new PDO('mysql:host=localhost;dbname=iac', 'root', '');
	$updateQuery = $pdo1->prepare("update iac_qwd set name=:b, credit=:c where code=:a");
	$updateQuery -> bindParam(':a', $_GET['code']);
	$updateQuery -> bindParam(':b', $_GET['name']);
	$updateQuery -> bindParam(':c', $_GET['credit']);
	$updateQuery -> execute();
	header('Location: index.php');
}

if(isset($_GET['code'])){		
	$getCode = $_GET['code'];
	$pdo2 = new PDO('mysql:host=localhost;dbname=iac', 'root', '');
	$result = $pdo2 -> query("Select * from iac_qwd where code='$getCode'");
	$row = $result -> fetch(PDO::FETCH_ASSOC);
	$code = $row['code'];
	$name = $row['name'];
	$credit = $row['credit'];
	echo '<div id="container"><form>';
	echo '<label for="code">Code : </label>&nbsp;&nbsp;'.$code.'<input name="code" type="hidden" value="'.$code.'"><br><br><br>';
	echo '<label for="name">Name : </label>&nbsp;&nbsp;<input name="name" value="'.$name.'" /><br><br><br>';
	echo '<label for="credit">Credit : </label>&nbsp;&nbsp;<input name="credit" value="'.$credit.'" /><br><br><br>';
	echo '<input id="stupid" type="submit" value="Update" />';
	echo '</form></div>';
} else {
	echo '<p id="Para">Click here to return  <a href="index.php">Home</a>, and select a course to update!</p>';
}
?>
</div>
<?php include("footer.php");?>
</body>
</html>