<?php include 'dbfunctions.php'; ?>
<?php include 'common.php'; ?>
<?php $searchword = $_GET["word"]; ?>

<html>
<body>
<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>
<h2>Search Results</h2>
Search results for <b><?php echo "$searchword"; ?></b>
<p> <?php searchWord($searchword); ?>

</body>
</html>