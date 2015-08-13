<?php include 'dbconnect.php'; ?>
<?php include 'common.php'; ?>
<?php

    # Constant strings for order by selection
    $ORDERBY_ALPHABETIC    = "alphabetic";
    $ORDERBY_POPULAR       = "popular";
    $ORDERBY_RECENTLYADDED = "recentlyAdded";
    $ORDERBY_RECENTLYLIKED = "recentlyLiked";
    $ORDERBY_MOSTLIKED     = "mostLiked";
    $ORDERBY_WORDMATCH     = "wordMatch";
    $ORDERBY_IDMATCH       = "idMatch";

    # Constants to determine if we print out the search results or return the result
    $PRINT_CARDS = "print_cards";
    $PRINT_LIST = "print_list";
    $PRINT_NONE = "print_none";

    # Factory method to get different query types
    function getQuery($selection, $word, $orderBy) {
        global $ORDERBY_ALPHABETIC, $ORDERBY_POPULAR, $ORDERBY_RECENTLYADDED, $ORDERBY_RECENTLYLIKED, $ORDERBY_MOSTLIKED, $ORDERBY_WORDMATCH, $ORDERBY_IDMATCH;
        switch($orderBy) {
            case $ORDERBY_POPULAR:
                return "SELECT $selection FROM `simpletable` WHERE word LIKE '$word' ORDER BY CAST(upVotes AS SIGNED) - CAST(downVotes AS SIGNED) DESC, word;";
            case $ORDERBY_RECENTLYADDED:
                return "SELECT $selection FROM `simpletable` WHERE word LIKE '$word' ORDER BY dateAdded DESC, word;";
            case $ORDERBY_MOSTLIKED:
                return "SELECT $selection FROM `simpletable` WHERE word LIKE '$word' ORDER BY upVotes DESC, downVotes, word;";
            case $ORDERBY_WORDMATCH:
                return "SELECT $selection FROM `simpletable` WHERE word = '$word' ORDER BY word;";
            case $ORDERBY_IDMATCH:
                return "SELECT $selection FROM `simpletable` WHERE id ='$word' ORDER BY word;";
            case $ORDERBY_ALPHABETIC:
            case $ORDERBY_RECENTLYLIKED: // TO ADD
            default:
                return "SELECT $selection FROM `simpletable` WHERE word LIKE '$word' ORDER BY word;";
        }
    }

    function printResultCards($result, $ignoreList) {
        $rowNum = rand(0,6);
        while($row = mysqli_fetch_assoc($result)) {
            if ((in_array($row['word'], $ignoreList) || in_array($row['id'], $ignoreList)) == False) {
                outputDefinition($row, $rowNum);
                $rowNum++;
            }
        }
    }

    function printResultList($result, $ignoreList) {
        echo '<div class="search-result-list-div no-decoration"><ul>';
        while($row = mysqli_fetch_assoc($result)) {
            if ((in_array($row['word'], $ignoreList) || in_array($row['id'], $ignoreList)) == False) {
                echo '<li>';
                outputWordLink($row);
                echo '</li>';
            }
        }
        echo '</ul></div>';
    }

    function outputSearchResult($result, $ignoreList, $printType) {
        global $PRINT_CARDS, $PRINT_LIST, $PRINT_NONE;
        if ($result->num_rows == 0) {
            echo "<div class='no-result-div'>No results found!</div><br>";
        } else {
            switch($printType) {
                case $PRINT_CARDS: printResultCards($result, $ignoreList); break;
                case $PRINT_LIST:  printResultList($result, $ignoreList);  break;
                case $PRINT_NONE:
                default:
            }
        }
    }

    function searchWords($exp, $distinct, $orderBy, $ignoreList, $printType) {
        global $db;
        global $PRINT_CARDS, $PRINT_LIST, $PRINT_NONE;
        $selection = $distinct ? "DISTINCT(word)" : "*";
        $query = getQuery($selection, $exp, $orderBy);
        $queryResult = mysqli_query($db, $query);
        if ($printType != $PRINT_NONE) {
            outputSearchResult($queryResult, $ignoreList, $printType);
        }
        return $queryResult;
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
            return -1;
        }
        return mysqli_insert_id($db);
    }

    #******* MYSQL QUERIES WITH CACHING ******#

    # Return: search query result
    function sqlSelect($query) {
        global $db;
        $result = mysqli_query($db, $query);
        return $result;
    }

    # Return: ID of newly inserted query
    function sqlInsert($query) {
        global $db;
        if (!mysqli_query($db, $query)) {
            die('Error: ' . mysqli_error($db));
            return -1;
        }
        return mysqli_insert_id($db);
    }

    # Return: True for success
    function sqlUpdate($query) {
        global $db;
        $result = mysqli_query($db, $query);
        return $result;
    }
?>