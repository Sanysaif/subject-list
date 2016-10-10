<!DOCTYPE html>
<html>
<head>
</head>
<body>


<?php include("head.php");?>
<?php include("content.php");?>
<?php
	if(isset($_GET['code']) && $_GET['code']!=''){
		$getCode = $_GET['code'];
	$pdo = new PDO('mysql:host=localhost;dbname=iac','root','');
    $result = $pdo -> query("Select * from iac_qwd where code='$getCode'");
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
    }
    else
    {
    	echo '<div id="content"><p id="Para">Click here to return  <a href="index.php">Home</a>, and select a course to Read!</p></div>';
    }
    ?>

<?php include("footer.php");?>

</body>
</html>