<?php include 'dbfunctions.php'; ?>

<?php $searchword = $_GET["word"]; ?>
<?php $startword = $_GET["start"]; ?>
<?php $orderBy = $_GET["orderBy"]; ?>

<html>
<head>
	<link href="css/common.css" rel="stylesheet">
	<link href="css/cards.css" rel="stylesheet">
	<script src="common.js"></script>
</head>
<body>
<?php include 'header.php'; ?>

<div class="search-results no-decoration column-background">

<?php
if($searchword != "") {
	echo '<div class="result-title">Search results for <b>'; echo $searchword; echo '</b></div>';
	echo '<hr style="width:90%">';
	//searchWordsMatching($searchword, $orderBy);
	searchWords("%$searchword%", True, $orderBy, array(), $PRINT_LIST);
} else if ($startword != "") {
	echo '<div class="result-title">Words starting with <b>'; echo $startword; echo '</b></div>';
	echo '<hr style="width:90%">';
	//allWords($startword, $orderBy);
	searchWords("$startword%", True, $orderBy, array(), $PRINT_LIST);
} else {
	echo '<div class="result-title">All Words!</div>';
	echo '<hr style="width:90%">';
	//allWords("", $orderBy);
	searchWords("%", True, $orderBy, array(), $PRINT_LIST);
}
?>

</div>

</body>
</html>