<?php include 'dbconnect.php' ?>
<?php include 'common.php' ?>

<?php
	function outputWordLink($defRow) {
		$word = $defRow['word'];
		echoWordLink($word);
	}

    function allWords() {
    	global $db;
    	$query = "SELECT DISTINCT(word) FROM `simpletable` ORDER BY word;";
    	$result = mysqli_query($db, $query);
    	echo '<ul>';
    	while($row = mysqli_fetch_assoc($result)) {
    		echo '<li>';
	        outputWordLink($row);
	        echo '</li>';
	    }
	    echo '</ul>';
    }
?>

<html>
<body>

<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>

<h2>All words</h2>
<?php allWords(); ?>

</body>
</html>