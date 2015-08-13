<?php include 'dbfunctions.php'; ?>

<?php $searchword = $_GET["word"]; ?>
<?php $searchwordId = $_GET["id"]; ?>

<html>
<head>
	<link href="css/common.css" rel="stylesheet">
	<link href="css/cards.css" rel="stylesheet">
	<script src="common.js"></script>
</head>
<body>
<?php include 'header.php'; ?>

<div class="column-background">

<?php

if($searchwordId != "") {
	echo '<div class="result-title">Word Definition</div>';
	$result = searchWords($searchwordId, False, $ORDERBY_IDMATCH, array(), $PRINT_CARDS);
	mysqli_data_seek($result, 0);
	$row = mysqli_fetch_assoc($result);
	$searchword = $row['word'];
	$exclude = array($searchwordId);
} else if($searchword != "") {
	echo '<div class="result-title">Search results for <b>'; echo $searchword; echo '</b></div>';
	echo '<hr style="width:90%"><p>';
	$result = searchWords($searchword, False, $ORDERBY_WORDMATCH, array(), $PRINT_CARDS);
	$exclude = array($searchword);
}

echo '<div class="no-decoration no-result-div"><a href="addaword.php?word=';
echo $searchword; echo '">Add new definition</a></div>';

echo '<hr style="width:90%"><p>';
echo '<div class="result-title">Similar Words</div>';
$result = searchWords("%$searchword%", False, $ORDERBY_POPULAR, $exclude, $PRINT_CARDS);
if ($result->num_rows <= 1) {
	echo '<div class="no-decoration no-result-div">None found. <a href="addaword.php?word=';
	echo $searchword; echo '">Add your own!</a></div>';
}

?>

</div>

</body>
</html>