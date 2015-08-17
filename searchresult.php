<?php include 'dbfunctions.php'; ?>

<?php $searchword = $_GET["word"]; ?>
<?php $startword = $_GET["start"]; ?>
<?php $orderBy = $_GET["orderBy"]; ?>

<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bolguru - Search Result</title>

	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/common.css" rel="stylesheet">
	<link href="css/cards.css" rel="stylesheet">
</head>
<body>
<?php include 'header_navbar.php'; ?>

<div class="search-results no-decoration column-background">

<?php
if($searchword != "") {
	echo '<div class="result-title">Search results for <b>'; echo $searchword; echo '</b></div>';
	echo '<hr style="width:90%">';
	searchWords("%$searchword%", True, $orderBy, array(), $PRINT_LIST);
} else if ($startword != "") {
	echo '<div class="result-title">Words starting with <b>'; echo $startword; echo '</b></div>';
	echo '<hr style="width:90%">';
	searchWords("$startword%", True, $orderBy, array(), $PRINT_LIST);
} else {
	echo '<div class="result-title">All Words!</div>';
	echo '<hr style="width:90%">';
	searchWords("%", True, $orderBy, array(), $PRINT_LIST);
}
?>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="common.js"></script>

</body>
</html>