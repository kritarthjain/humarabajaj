<?php include 'dbfunctions.php'; ?>

<?php $word = $_GET["word"]; ?>

<html>
<body>

<?php include 'header.php'; ?>

<?php
// define variables and set to empty values
$definition = $examples = "";
$wordErr = $definitionErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["word"])) {
    	$wordErr = "Word is required";
  	} else {
		$word = test_input($_POST["word"]);
	}
	if (empty($_POST["definition"])) {
    	$definitionErr = "Definition is required";
  	} else {
		$definition = test_input($_POST["definition"]);
	}
	$examples = test_input($_POST["examples"]);

	if(!empty($word) && !empty($definition)) {
		$successId = addWordToDb($word, $definition, $examples);
		if($successId != -1) {
			echo "<div class='addaword-status no-decoration'>Success! Word "; echoWordIdLink($word, $successId); echo " added!</div>";
		} else {
			echo "<div class='addaword-status'>Adding a word failed. Try again!</div>";
			include 'addaword_form.php';
		}
	}
} else {
	include 'addaword_form.php';
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

</body>
</html>