<?php
# All the common helper functions used

    $row;

	function echoWordLink($word) {
		echo '<a href=result.php?word=';
		echo $word; echo '>';
		echo $word; echo '</a>';
	}

    function echoWordIdLink($word, $wordid) {
        echo '<a href=result.php?id=';
        echo $wordid; echo '>';
        echo $word; echo '</a>';
    }

    function outputWordLink($defRow) {
        $word = $defRow['word'];
        echoWordLink($word);
    }

    function outputWordIdLink($defRow) {
        $word = $defRow['word'];
        $wordid = $defRow['id'];
        echo '<div>outputWordIdLink wordid='; echo $defRow['id']; echo ' word='; echo $word; echo '</div>';
        echoWordIdLink($word, $wordid);
    }

    date_default_timezone_set('Asia/Calcutta');
    
    function outputDate($sqlDate) {
        $timestamp = strtotime($sqlDate);
        $phpTime = date("j M Y", $timestamp);
        return $phpTime;
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
        $i = 0;
        switch($num % 5) {
            case $i++: return "orange";
            case $i++: return "blue";
            case $i++: return "yellow";
            case $i++: return "green";
            case $i++: return "red";
            //case 5: return "purple";
            default: return "orange";
        }
    }

    function outputDefinition($defRow, $num) {
        $cardId = "card_" . $defRow['id']. "_" . $defRow['word'];
           echo '<div class="card_'; echo cardColor($num); echo ' id="'; echo $cardId; echo '">
                    <div class="card_main">
                        <div class="card_header no-decoration">
                            <h2><a href="result.php?id='; echo $defRow['id']; echo '">'; echo $defRow['word']; echo '</a></h2>
                        </div>

                        <div class="card_definition">
                            <div class="card_quote"><h4>'; echo $defRow['definition']; echo '</h4></div>
                        </div>

                        <div class="card_examples">
                            <div class="card_examples_title"><b>Example</b></div>
                            <div class="card_quote">'; echo $defRow['examples']; echo '</div>
                        </div>

                        <div class="card_information">
                            <div class="card_quote">Added on '; echo outputDate($defRow['dateAdded']); echo '</div>
                        </div>

                        <div class="card_footer" align="right">
                            <div style="display: inline">
                                <span class="card_button card_action_button no-decoration"><a href="#" onClick="shareLink('; echo $defRow['id']; echo '); return false;"><span title="Share" class="glyphicon glyphicon-share-alt"></span></a></span>
                                <span class="card_button card_action_button no-decoration"><a href="addaword.php?word='; echo $defRow['word']; echo '"><span title="Add new definition" class="glyphicon glyphicon-plus"></span></a></span>
                                <span class="card_button card_action_button no-decoration"><a href="addaword.php?word='; echo $defRow['word']; echo '"><span title="Report" class="glyphicon glyphicon-exclamation-sign"></span></a></span>
                                <button class="card_button card_like" id="'; echo $cardId; echo '_like'; echo '" onClick="vote(\''; echo $cardId; echo '\', '; echo $defRow['id'];
                                                            echo ', 1, '; echo $defRow['upVotes']; echo')"><span title="Like" class="glyphicon glyphicon-thumbs-up"></span> '; echo $defRow['upVotes']; echo '</span>
                                <button class="card_button card_unlike" id="'; echo $cardId; echo '_unlike'; echo '"onClick="vote(\''; echo $cardId; echo '\', '; echo $defRow['id'];
                                                            echo ',-1, '; echo $defRow['downVotes']; echo')"><span title="Unlike" class="glyphicon glyphicon-thumbs-down"></span> '; echo $defRow['downVotes']; echo '</span>
                            </div>
                        </div>
                    </div>
                </div>';
  }

?>