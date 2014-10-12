<?php include 'dbconnect.php'; ?>
<?php

	# Search for a word and its definition
    function searchWord($word) {
    	global $db;
    	$query = "SELECT * FROM `simpletable` WHERE word='$word' ORDER BY upVotes - downVotes;";
    	$result = mysqli_query($db, $query);
    	if ($result->num_rows == 0) {
    		echo "No results found :( <br/>";
            echo "<h2><a href='addaword.php'>Add this word</a></h2>";
    	} else {
	    	while($row = mysqli_fetch_assoc($result)) {
	        	outputDefinition($row);
	        	echo '<hr>';
	    	}
    	}
    }

    function addWordToDb($word, $definition, $examples) {
    // escape variables for security
    global $db;
    $word = mysqli_real_escape_string($db, $word);
    $definition = mysqli_real_escape_string($db, $definition);
    $examples = mysqli_real_escape_string($db, $examples);

    $sql="INSERT INTO `simpletable` (word, definition, dateAdded, examples)
                VALUES ('$word', '$definition', now(), '$examples');";

    if (!mysqli_query($db,$sql)) {
        die('Error: ' . mysqli_error($db));
        return false;
    }
    return true;
}
?>