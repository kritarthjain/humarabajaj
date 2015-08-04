<?php include 'dbfunctions.php'; ?>

<?php $searchword = $_GET["word"]; ?>

<html>
<head>
	<link href="css/common.css" rel="stylesheet">
	<link href="css/cards.css" rel="stylesheet">
	<script src="common.js"></script>
</head>
<body>
<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>
<hr>
<h2>Results</h2>
<?php
if($searchword != "") {
	echo 'Search results for <b>'; echo $searchword; echo '</b>';
}
?>
<p> <?php searchWord($searchword); ?>

</body>
</html>