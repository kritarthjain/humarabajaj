<?php include 'dbfunctions.php'; ?>

<?php $orderBy = $_GET["orderBy"]; ?>

<html>
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bolguru - Stream</title>

	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/common.css" rel="stylesheet">
	<link href="css/cards.css" rel="stylesheet">
</head>
<body>
<?php include 'header_navbar.php'; ?>

<!--<div class="result-title">Stream</div>-->

<div class="stream-div column-background">

<div class="stream-orderby no-decoration" style="margin-left:20px; margin-right:20px">
<ul class="nav nav-pills nav-justified">
	<?php
		function echoAndSetActiveIfSelected($orderBy, $selection, $selectionTitle) {
			echo '<li role="presentation"';
			if ($orderBy == $selection) {
				echo ' class="active"';
			}
			echo '><a href="stream.php?orderBy=';
			echo $selection; echo '">'; echo $selectionTitle;
			echo '</a></li>';
		}
		echoAndSetActiveIfSelected($orderBy, "alphabetic", "Alphabetic");
		echoAndSetActiveIfSelected($orderBy, "recentlyAdded", "Recently Added");
		echoAndSetActiveIfSelected($orderBy, "popular", "Popular");
		echoAndSetActiveIfSelected($orderBy, "mostLiked", "Most Liked");
	?>
</ul>
</div>
<hr style="width:90%">

<?php
	echo '<div class="result-title">';
	switch($orderBy) {
		case "alphabetic":    echo 'Alphabetic';     break;
		case "recentlyAdded": echo 'Recently Added'; break;
		case "popular":       echo 'Popular';        break;
		case "mostLiked":     echo 'Most Liked';     break;
		default:
	}
	echo '</div>';
	searchWords("%", False, $orderBy, array(), $PRINT_CARDS);
?>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="common.js"></script>

</body>
</html>