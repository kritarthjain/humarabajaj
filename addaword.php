<?php include 'dbfunctions.php'; ?>
<?php $word = $_GET["word"]; ?>

<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bolguru - Add a word!</title>

	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/common.css" rel="stylesheet">
	<link href="css/cards.css" rel="stylesheet">
</head>
<body>

<?php include 'header_navbar.php'; ?>

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

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="common.js"></script>

</body>
</html>