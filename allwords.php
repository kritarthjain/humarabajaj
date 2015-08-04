<?php include 'dbfunctions.php' ?>

<html>
<body>

<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>
<hr>

<h2>All words</h2>
<?php
	$start = $_GET["start"];
	allWords($start); 
?>

</body>
</html>