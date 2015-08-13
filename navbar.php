<div class="index-navbar no-decoration">
	<ul class="navbar-list" align="center">
		<li style="display:inline"><a href="stream.php">Streams</a></li> &nbsp;--
		<?php
		foreach (range('A', 'Z') as $c) {
			echo '<li style="display:inline">&nbsp;&nbsp;<a href="searchresult.php?start='; echo $c; echo '">';
			echo $c; echo '</a>&nbsp;&nbsp;-</li>';
		} ?>
		<li style="display:inline"><a class="no-decoration" href="searchresult.php">All</a></li>
	</ul>
</div>