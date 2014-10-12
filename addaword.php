<?php include 'dbconnect.php'; ?>
<?php include 'common.php' ?>

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

<html>
<body>

<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>

<h2>Add a word</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<b>Word:</b><input type="text" name="word" value="<?php echo $word; ?>">
	<span class="error">* <?php echo $wordErr;?></span><br><br>
	<b>Definition:</b><br><textarea rows="5" cols="50" name="definition"><?php echo $definition; ?></textarea>
	<span class="error">* <?php echo $definitionErr;?></span><br><br>
	<b>Examples:</b><br><textarea name="examples"><?php echo $examples; ?></textarea><br>
	<input type="submit" value="Submit">
</form>

</body>
</html>