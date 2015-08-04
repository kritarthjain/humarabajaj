<ul>
	<li style="display:inline"><?php include 'search.php'; ?></li>
	<li style="display:inline"><a href="result.php?word=">Stream</a></li>
	<li style="display:inline"><a href="addaword.php">Add a Word</a></li>
	<?php
	foreach (range('A', 'Z') as $c) {
		echo '<li style="display:inline">&nbsp;&nbsp;<a href="allwords.php?start='; echo $c; echo '">';
		echo $c; echo '</a>&nbsp;&nbsp;*</li>';
	} ?>
	<li style="display:inline"><a href="allwords.php">All</a></li>
</ul>