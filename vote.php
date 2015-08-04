<?php include 'dbfunctions.php'; ?>
<?php

$id = $_REQUEST["id"];
$vote = $_REQUEST["vote"];

vote($id, $vote);

?>