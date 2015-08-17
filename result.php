<?php include 'dbfunctions.php'; ?>

<?php $searchword = $_GET["word"]; ?>
<?php $searchwordId = $_GET["id"]; ?>

<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bolguru - Result</title>

	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/common.css" rel="stylesheet">
	<link href="css/cards.css" rel="stylesheet">
</head>
<body>
<?php include 'header_navbar.php'; ?>

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
	$searchword = str_replace('_', ' ', $searchword);
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

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="common.js"></script>

</body>
</html>