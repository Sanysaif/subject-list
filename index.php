<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php include("head.php");?>
<?php include("content.php");?>

<?php
	$pdo = new PDO('mysql:host=localhost;dbname=iac','root','');
    $result = $pdo->query("Select * from iac_qwd");
       // $row = $result->fetch(PDO::FETCH_NUM);
        //print_r($row);
        
       // print_r($_GET);
    echo '<table id="myTable" border="5px">';
        	echo "<tr>";
        	echo "<th>";
        	echo "Code";
        	echo "</th>";
        	echo "<th>";
        	echo "Name";
        	echo "</th>";
        	echo "<th>";
        	echo "Credit";
        	echo "</th>";
        	echo "<th>";
        	echo "Read";
        	echo "</th>";
        	echo "<th>";
        	echo "Update";
        	echo "</th>";
        	echo "<th>";
        	echo "Delete";
        	echo "</th>";
        	echo "</tr>";
        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
            echo "<tr>";
            echo "<td>";
            echo $row['code'];
            echo "</td>";
            echo "<td>";
            echo $row['name'];
            echo "</td>";
            echo "<td>";
            echo $row['credit'];
            echo "</td>";
            echo "<td>";
            echo '<a href="read.php?code='.$row['code'].'">Read</a>';
            echo "</td>";
            echo "<td>";
            echo '<a href="update.php?code='.$row['code'].'">Update</a>';
            echo "</td>";
            echo "<td>";
            echo '<a href="delete.php?code='.$row['code'].'&reply=">Delete</a>';
            echo "</td>";
            echo "</tr>";   
        }
        echo "</table>";
        echo "<br>";
        echo "<br>";
    ?>

<?php include("footer.php");?>
</body>
</html>