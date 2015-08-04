<?php
# All the common helper functions used

    $row;

	function echoWordLink($word) {
		echo '<a href=result.php?word=';
		echo $word; echo '>';
		echo $word; echo '</a>';
	}

    function outputWordLink($defRow) {
        $word = $defRow['word'];
        echoWordLink($word);
    }

	/*function outputDefinition($defRow) {
        echo '<h3>'; echo $defRow['word']; echo '</h3>';
        echo '<b>Definition:</b><br>';
        echo '<p>'; echo $defRow['definition']; echo '</p>';
        echo '<b>Examples:</b><br>';
        echo '<p>'; echo $defRow['examples']; echo '</p>';
        echo '<p><b>Upvotes = </b>'; echo $defRow['upVotes'];
        echo ' <b>Downvotes = </b>'; echo $defRow['downVotes'];
        global $row;
        $row = $defRow;
        include 'card.php';
    }*/

    function cardColor($num) {
        switch($num % 6) {
            case 0: return "orange";
            case 1: return "yellow";
            case 2: return "blue";
            case 3: return "green";
            case 4: return "red";
            case 5: return "purple";
            default: return "orange";
        }
    }

    function outputDefinition($defRow, $num) {
        $cardId = "card_" . $defRow['id']. "_" . $defRow['word'];
           echo '<div class="card_'; echo cardColor($num); echo ' id="'; echo $cardId; echo '">
                    <div class="card_main">
                        <div class="card_header">
                            <h2>'; echo $defRow['word']; echo '</h2>
                        </div>

                        <div class="card_definition">
                            <p>'; echo $defRow['definition']; echo '</p>
                        </div>

                        <div class="card_examples">
                            <p>'; echo $defRow['examples']; echo '</p>
                        </div>

                        <div class="card_information">
                            <p>This is the card information.</p>
                        </div>

                        <div class="card_footer" align="right">
                            <div style="display: inline">
                                <button class="card_like" id="'; echo $cardId; echo '_like'; echo '" onClick="vote(\''; echo $cardId; echo '\', '; echo $defRow['id'];
                                                            echo ', 1, '; echo $defRow['upVotes']; echo')">Like:'; echo $defRow['upVotes']; echo '</span>
                                <button class="card_unlike" id="'; echo $cardId; echo '_unlike'; echo '"onClick="vote(\''; echo $cardId; echo '\', '; echo $defRow['id'];
                                                            echo ',-1, '; echo $defRow['downVotes']; echo')">Unlike:'; echo $defRow['downVotes']; echo '</span>
                            </div>
                        </div>
                    </div>
                </div>';
  }

?>