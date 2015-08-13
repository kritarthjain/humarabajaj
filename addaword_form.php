<div class="column-background addaword-form">
<div class="addaword-title"><b>Add a word</b></div>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<div class="form-group">
		<b>Word:*</b><input type="text" class="form-control" name="word" value="<?php echo $word; ?>">
		<span class="error"><?php echo $wordErr;?></span><br><br>
		<b>Definition:*</b><br><textarea class="form-control" rows="5" name="definition"><?php echo $definition; ?></textarea>
		<span class="error"><?php echo $definitionErr;?></span><br><br>
		<b>Examples:</b><br><textarea class="form-control" name="examples"><?php echo $examples; ?></textarea><br>
		<b>Tags (comma separated):</b><br><textarea class="form-control" rows="1" name="tags"><?php echo $tags; ?></textarea><br>
		<input type="submit" class="btn btn-success addaword-btn-submit pull-right" value="Submit" align=right>
	</div>
</form>

</div>