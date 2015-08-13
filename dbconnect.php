<?php

	# Connect to db
	function connectDb($dbhost, $username, $password, $dbname) {
		$db = mysqli_connect($dbhost, $username, $password, $dbname);
		if (mysqli_connect_errno()) {
	       echo "Failed to connect to MySQL: " . mysqli_connect_error() . '<br/>';
	       return NULL;
	    }
	    return $db;
	}

	# Connect to the local database
	function connectLocalDb() {
		$localdb = '127.0.0.1';
		$username = 'root';
		$password = 'password';
		$dbname = 'bolguru';
		return connectDb($localdb, $username, $password, $dbname);
	}

	# Connect to the AWS database
	function connectAWSDb() {
		$awsdb = 'hamarabajaj.cpyd36vutggc.us-west-2.rds.amazonaws.com:3306';
		$username = 'bolguru';
		$password = 'SaswatPanda';
		$dbname = 'bolguru';
		return connectDb($awsdb, $username, $password, $dbname);
	}

	# Change whether to connect to AWS or local mysql server
	$db = connectAWSDb();
	//$memc = new Memcached();
?>