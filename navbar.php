<ul class="nav nav-pills my-navbar-list center-block" style="max-width:90%">
	<li role="presentation" class="dropdown">
	  <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
	    Streams<span class="caret"></span>
	  </a>
	  <ul class="dropdown-menu">
	    <li style="display:inline"><a href="stream.php?orderBy=alphabetic">Alphabetic</a></li> - 
	    <li style="display:inline"><a href="stream.php?orderBy=recentlyAdded">Recently Added</a></li> - 
	    <li style="display:inline"><a href="stream.php?orderBy=popular">Popular</a></li> - 
	    <li style="display:inline"><a href="stream.php?orderBy=mostLiked">Most Liked</a></li>
	  </ul>
	</li>
	<li role="presentation" class="dropdown">
	  	<?php
			foreach (range('A', 'Z') as $c) {
	  			echo '<li class="my-thin-nav-pills" role="presentation"><a class="no-decoration" href="searchresult.php?start='; echo $c; echo '">';
	  			echo $c; echo '</a></li>';
			} ?>
		<li role="presentation"><a class="no-decoration" href="searchresult.php">All</a></li>
	</li>
</ul>

