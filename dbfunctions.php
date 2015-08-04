<?php include 'dbconnect.php'; ?>
<?php include 'common.php'; ?>
<?php

	# Search for a word and its definition
    function searchWord($word) {
    	global $db;
        $query = "SELECT * FROM `simpletable` WHERE word LIKE '%$word%' ORDER BY upVotes - downVotes DESC, word;";
    	$result = mysqli_query($db, $query);
    	if ($result->num_rows == 0) {
    		echo "No results found :( <br/>";
            echo "<h2><a href='addaword.php'>Add this word</a></h2>";
    	} else {
            $rowNum = 0;
	    	while($row = mysqli_fetch_assoc($result)) {
	        	outputDefinition($row, $rowNum);
                $rowNum++;
	    	}
    	}
    }

    function allWords($start) {
        global $db;
        $query = "SELECT DISTINCT(word) FROM `simpletable` WHERE word LIKE '$start%' ORDER BY word;";
        $result = mysqli_query($db, $query);
        if ($result->num_rows == 0) {
            echo "No results found :( <br/>";
        } else {
            echo '<ul>';
            while($row = mysqli_fetch_assoc($result)) {
                echo '<li>';
                outputWordLink($row);
                echo '</li>';
            }
            echo '</ul>';
        }
    }

    # Vote for the word associated with the given id
    function vote($id, $vote) {
        global $db;
        $voteType = ($vote >= 0) ? "upVotes" : "downVotes";
        $query = "UPDATE `simpletable` SET $voteType = $voteType + 1 WHERE id = $id";
        mysqli_query($db, $query);
    }

    function unvote($id, $vote) {
        global $db;
        $voteType = ($vote >= 0) ? "upVotes" : "downVotes";
        $query = "UPDATE `simpletable` SET $voteType = $voteType - 1 WHERE id = $id";
        mysqli_query($db, $query);
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