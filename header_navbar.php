<div class ="my-navbar-header">
<div>
<nav class="navbar navbar-default my-navbar-header">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#directory-collapse" aria-expanded="false" style="margin-top:20px">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#search-collapse" aria-expanded="false" style="margin-top:20px">
        <span class="sr-only">Toggle navigation</span>
        <span class="glyphicon glyphicon-search"></span>
      </button>
      <a href="index.php"><img class="page-title" src="images/titles/site_title_YG.png"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="search-collapse">
      <ul class="nav navbar-nav navbar-right center-block" style="padding-top:20px">
        <li><?php include "search.php"; ?></li>
      </ul>
    </div><!-- /.navbar-collapse -->


    <div class="collapse navbar-collapse" id="directory-collapse">
      <?php include 'navbar.php'; ?>
    </div>

  </div><!-- /.container-fluid -->
</nav>
</div>

</div> <!-- /.my-navbar-header -->