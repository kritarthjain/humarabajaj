<?php include 'dbconnect.php'; ?>
<?php

	# Search for a word and its definition
    function searchWord($word) {
    	global $db;
    	$query = "SELECT * FROM `simpletable` WHERE word='$word' ORDER BY upVotes - downVotes;";
    	$result = mysqli_query($db, $query);
    	if ($result->num_rows == 0) {
    		echo "No results found :( <br/>";
    	} else {
	    	while($row = mysqli_fetch_assoc($result)) {
	        	outputDefinition($row);
	        	echo '<hr>';
	    	}
    	}
    }
?>