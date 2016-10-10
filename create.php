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
    if(isset($_GET['code']) && $_GET['code']!='' && isset($_GET['name']) && $_GET['name']!='' && isset($_GET['credit']) && $_GET['credit']!='')
    {
        /*echo $_GET['code']."<br>";
        echo $_GET['name']."<br>";
        echo $_GET['credit']."<br>";*/
        $pdo1=  new PDO('mysql:host=localhost;dbname=iac','root','');
        $insertQuery=$pdo1->prepare("insert into iac_qwd values(:ajaira1, :ajaira2, :ajaira3)");
        $insertQuery->bindParam(':ajaira1', $_GET['code']);
        $insertQuery->bindParam(':ajaira2', $_GET['name']);
        $insertQuery->bindParam(':ajaira3', $_GET['credit']);
        $insertQuery->execute();
        echo "<p id='Para'>Row Inserted!!!</p>";
    }
    else{
	echo '<form id="container" method="get">
        <label for="code">Code : </label>&nbsp;&nbsp;<input name="code" /><br><br>
        <label for="name">Name : </label>&nbsp;&nbsp;<input name="name" /><br><br>
        <label for="credit">Credit : </label>&nbsp;&nbsp;<input name="credit" /><br><br>
        <input id="stupid" type="submit" name="submit"  value="Create" />
    </form>';}
 ?>
</div>
<?php include("footer.php");?>

</body>
</html>