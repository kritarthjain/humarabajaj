<?php include 'dbfunctions.php'; ?>

<?php
// define variables and set to empty values
$word = $definition = $examples = "";
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
		$success = addWordToDb($word, $definition, $examples);
		if($success) {
			echo "Success! Word ";
			echoWordLink($word);
			echo " added! <br>";
		}
	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<html>
<body>

<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>
<hr>

<div class="addaword-form">
<h2>Add a word</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<div class="form-group">
		<b>Word:*</b><input type="text" class="form-control" name="word" value="<?php echo $word; ?>">
		<span class="error"><?php echo $wordErr;?></span><br><br>
		<b>Definition:*</b><br><textarea class="form-control" rows="5" name="definition"><?php echo $definition; ?></textarea>
		<span class="error"><?php echo $definitionErr;?></span><br><br>
		<b>Examples:</b><br><textarea class="form-control" name="examples"><?php echo $examples; ?></textarea><br>
		<input type="submit" class="btn" value="Submit">
	</div>
</form>

</div>

</body>
</html>