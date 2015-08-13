<?php include 'dbfunctions.php'; ?>

<?php $orderBy = $_GET["orderBy"]; ?>

<html>
<head>
	<link href="css/common.css" rel="stylesheet">
	<link href="css/cards.css" rel="stylesheet">
	<script src="common.js"></script>
</head>
<body>
<?php include 'header.php'; ?>

<!--<div class="result-title">Stream</div>-->

<div class="stream-div column-background">

<div class="stream-orderby no-decoration">
<ul class="navbar-list" align="center">
	<li style="display:inline"><a href="stream.php?orderBy=alphabetic">Alphabetic</a></li> - 
	<li style="display:inline"><a href="stream.php?orderBy=recentlyAdded">Recently Added</a></li> - 
	<li style="display:inline"><a href="stream.php?orderBy=popular">Popular</a></li> - 
	<li style="display:inline"><a href="stream.php?orderBy=mostLiked">Most Liked</a></li>
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

</body>
</html>