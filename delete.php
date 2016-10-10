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
    if(isset($_GET['code'])&& $_GET['reply']=='')
    {
    	$code1 = $_GET['code'];
    	echo '<div id="container"><div>Do you really want to delete the record for code : '.$_GET['code'].'?</div><br>
              <div><a href="delete.php?code='.$code1.'&reply=Yes"><input id="stupid" type="button" name="reply" value="Yes"/></a></div>
              <div><br><a href="delete.php?code='.$code1.'&reply=No" name="reply"><input id="stupid" type="button" name="reply" value="No" maxlen="5"/></a></div></div>';
    }
    if(isset($_GET['code']) && $_GET['reply']=='Yes')
    {

    	$pdo1 = new PDO('mysql:host=localhost;dbname=iac', 'root', '');
		$deleteQuery = $pdo1->prepare("delete from iac_qwd where code = :d");// 
		$deleteQuery->bindParam(':d', $_GET['code']);
		$deleteQuery->execute();
        header('Location: index.php');
    }
    if (isset($_GET['code']) &&  $_GET['reply']=='No') {
    	header('Location: index.php');
    }
    ?>
</div>
<?php include("footer.php");?>

</body>
</html>


