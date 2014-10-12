<?php

# All the common helper functions used

	function echoWordLink($word) {
		echo '<a href=result.php?word=';
		echo $word; echo '>';
		echo $word; echo '</a>';
	}

	function outputDefinition($defRow) {
        echo '<h3>'; echo $defRow['word']; echo '</h3>';
        echo '<b>Definition:</b><br>';
        echo '<p>'; echo $defRow['definition']; echo '</p>';
        echo '<b>Examples:</b><br>';
        echo '<p>'; echo $defRow['examples']; echo '</p>';
        echo '<p><b>Upvotes = </b>'; echo $defRow['upVotes'];
        echo ' <b>Downvotes = </b>'; echo $defRow['downVotes'];
    }

?>